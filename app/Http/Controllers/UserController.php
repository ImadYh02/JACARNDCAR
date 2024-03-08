<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Cars;
use App\Models\Orders;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getData() {
        $cars = Cars::all();
        $locations = Location::all();
        return view('first', compact('cars', 'locations'));
    }

    public function getOrders($cin) {
        $getOrders = Orders::select('*', 'name_car')->join('cars', 'cars.id_car', '=', 'orders.id_car')->where('cin_user', $cin)->orderBy('car_order_id', 'ASC')->get();
        return view('user.orders', compact('getOrders'));
    }

    public function getInfoPerso() {
        return view('user.settings');
    }
}
