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

    public function showAdminMakesPage()
    {
        return view('admin.makes')->with('makes', Make::all());
    }


    public function showCreateNewMakesPage()
    {
        return view('admin.makes-new');
    }

    public function createNewMake(Request $request)
    {
        $input = $request->all();
        Make::create([
            'name' => $input['name'],
        ]);
        return redirect('admin/makes');
    }
}

?>
