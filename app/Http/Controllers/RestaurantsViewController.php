<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantsViewController extends Controller
{
    public function restaurantsPage()
    {
        return view('restaurants.restaurants-page', ['user' => auth('api')->user(), 'address' => 'Carrer Congrés, 08031 Barcelona']);
    }

    public function restaurantPage(Restaurant $restaurant)
    {
        if (!$restaurant) {
            return redirect('/restaurants');
        }
        return view('restaurants.restaurant-page', ['restaurant' => $restaurant]);
    }
}

