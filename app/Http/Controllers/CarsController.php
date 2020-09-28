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
        return view('user.cars')->with('cars', Car::all());
    }

    public function showUserCarsListPage()
    {
        return view('user.cars-list')->with('cars', Car::where('status', 'free')->get());
    }

    public function showAdminCarsPage()
    {
        return view('admin.cars')->with('cars', Car::all());
    }

    public function showCreateNewCarsPage()
    {
        return view('admin.cars-new')->with('makes', Make::all())->with('users', User::all());
    }

    public function createNewCar(Request $request)
    {
        $input = $request->all();
        Car::create([
            'user_id' => $input['user-id'],
            'make_id' => $input['make-id'],
            'type' => $input['type'],
            'lat' => $input['lat'],
            'lng' => $input['lng'],
            'number' => $input['number'],
            'color' => $input['color']
        ]);
        return redirect('admin/cars');
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
