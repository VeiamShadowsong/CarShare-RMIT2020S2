<?php

namespace App\Http\Controllers;

use App\Models\Parking;
use App\Models\User;
use App\Models\License;
use App\Models\Car;
use App\Models\Order;
use App\Models\Payment;

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

    public function showrDashboardPage()
    {
        return view('user.dashboard');
    }

    public function showLicensePage($error = null)
    {
        $user = session('user')[0];
        $license = $user->license();
        if($error == null) {
            if(!$license) {
                $error = 'You do not have drive license now, please upload';
            } elseif(strtotime($license->expired_at) < time()) {
                $error = 'You license has expired, please upload new license';
            }
        }
        return view('user.license')->with('user',  $user)->with('error', $error);
    }

    public function updateLicense(Request $request)
    {
        $input = $request->all();

        $error = null;
        if (strtotime($input['expired-at']) < time()) {
            $error = 'This License has expired, please upload new license';
        } else {
            License::create([
                'user_id' => session('user')[0]->id,
                'number' => $input['number'],
                'expired_at' => $input['expired-at']
            ]);
        }
        return self::showLicensePage($error);
    }

    public function showOrderCarPage($carId)
    {
        $user = session('user')[0];
        if(!$user->checkLicenseValidate()) {
            return redirect('/license');
        }

        $car = Car::where('id', $carId)->first();

        return view('user.order-car')->with('car', $car);
    }

    public function orderCar($carId)
    {
        $car = Car::where('id', $carId)->first();
        $car->update(['status' => 'ordered']);

        Order::create([
            'user_id' => session('user')[0]->id,
            'car_id' => $carId
        ]);
        return redirect('/orders');
    }

    public function showUserOrdersPage()
    {
        return view('user.orders')->with('orders', Order::where('user_id', session('user')[0]->id)->get());
    }

    public function showReturnOrderPage($orderId)
    {
        return view('user.order-return')->with('order', Order::where('id',$orderId)->first())->with('parkings', Parking::all());
    }

    public function returnOrder(Request $request, $orderId)
    {
        $input = $request->all();
        $order = Order::where('id',$orderId)->first();
        Payment::create([
            'order_id' => $orderId,
            'price' => $order->price(),
            'gateway' => $input['payment-type']
        ]);
        $order->car->update(['status' => 'free']);
        $order->update(['status' => 'paid']);
        return redirect('/orders');
    }
}

?>
