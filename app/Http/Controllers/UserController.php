<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userLogin(Request $request)
    {
        $input = $request->all();

        $user = User::where('email', $input['email'])->first();
        if ($user) {
            if (Hash::check($input['password'], $user->password)) {
                $request->session()->push('user', $user);

                return redirect('/dashboard');
            }
        }

        return view('user.login')->with('errors', ['Username or password is incorrect!']);
    }

    public function userRegister(Request $request)
    {
        $input = $request->all();
        $errors = [];

        if (User::where('email', $input['email'])->first()) {
            array_push($errors, 'This email has been registered!');
        }

        if ($input['password'] !== $input['confirm-password']) {
            array_push($errors, 'Password and confirm password not the same!');
        }

        if (count($errors) == 0) {
            $user = User::create([
                'email' => $input['email'],
                'first_name' => $input['first-name'],
                'last_name' => $input['last-name'],
                'password' => Hash::make($input['password']),
            ]);
            $request->session()->push('user', $user);

            return redirect('/dashboard');
        }

        return view('user.register')->with('errors', $errors);
    }

    public function userLogout()
    {
        session(['user' => null]);

        return redirect('/login');
    }
}

?>
