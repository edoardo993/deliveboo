<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Restaurant;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser = Auth::user();

        $userRestaurants = Restaurant::where('user_id', $currentUser->id)->get();

        return view('home', compact('userRestaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.create-restaurant');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $currentUser = Auth::user();
        $newRestaurant = new Restaurant();
        $newRestaurant->fill($data);
        $newRestaurant->user_id = $currentUser->id;
        $newRestaurant->save();

        return redirect()->route('restaurants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return view('this-restaurant', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        return view('auth.edit-restaurant', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $data = $request->all();
        $restaurant->update($data);

        return redirect()->route('restaurants.show', compact('restaurant'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        return redirect()->route('restaurants.index');
    }
}
