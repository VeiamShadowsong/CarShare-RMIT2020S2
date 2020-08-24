<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Make;
use App\Models\Car;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CarsController extends Controller
{
    public function showUserCarsPage()
    {
        return view('user.cars');
    }

    public function showAdminCarsPage()
    {
        return view('admin.cars')->with('cars', Car::all());
    }

    public function getMakes()
    {
        return Make::all();
    }
}

?>
