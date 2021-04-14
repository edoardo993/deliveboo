<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Plate;

use App\Restaurant;

use App\Order;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getPlates(){
        $data = Plate::all();
        return response()->json($data);
    }

    public function getRestaurants(){
        $data = Restaurant::all();
        return response()->json($data);
    }

    public function getOrders(){
        $data = Order::all();
        return response()->json($data);
    }
}
