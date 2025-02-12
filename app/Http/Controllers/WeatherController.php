<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index(Request $request)
    {
        // Get the city from the query string (default to 'Curitiba' if not provided)
        $city = $request->query('city', 'Curitiba');
        $apiKey = env('OPENWEATHER_API_KEY');

        // Request the current weather data from OpenWeather API
        $currentWeatherResponse = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            'q'     => $city,
            'appid' => $apiKey,
            'units' => 'metric',
            'lang'  => 'pt_br'
        ]);

        // Check if the API request failed, then return an error view
        if ($currentWeatherResponse->failed()) {
            return view('weather', [
                'error' => 'Error fetching weather data.',
                'city'  => $city
            ]);
        }

        // Decode the JSON response into an array
        $weatherData = $currentWeatherResponse->json();

        // Return the view with the current weather data and the city name
        return view('weather', [
            'weather' => $weatherData,
            'city'    => $city
        ]);
    }
}
