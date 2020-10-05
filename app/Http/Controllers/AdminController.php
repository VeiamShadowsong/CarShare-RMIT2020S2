<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Order;
use App\Models\Car;
use App\Models\Payment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function adminLogin(Request $request)
    {
        $input = $request->all();

        $admin = Admin::where('username', $input['username'])->first();
        if ($admin) {
            if (Hash::check($input['password'], $admin->password)) {
                $request->session()->push('admin', $admin);

                return redirect('/admin/dashboard');
            }
        }

        return view('admin.login')->with('errors', ['Username or password is incorrect!']);
    }

    public function adminLogout()
    {
        session(['admin' => null]);
        return redirect('/admin/login');
    }

    public function showDashboardPage()
    {
        return view('admin.dashboard')
            ->with('orderCount', Order::all()->count())
            ->with('carCount', Car::all()->count())
            ->with('inCome', Payment::all()->sum('price'));
    }

    public function showAdminOrdersPage()
    {
        return view('admin.orders')->with('orders', Order::all());
    }

    public function showAdminPaymentsPage()
    {
        return view('admin.payments')->with('payments', Payment::all());
    }
}

?>
