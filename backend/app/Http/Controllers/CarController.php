<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Dohvacanje svih modela tog tipa
    // npr. /cars
    public function index()
    {
        // ili Car::get()
        return Car::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
/*    public function create()
    {
        //
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Kreiranje modela, POST na /cars
    public function store(Request $request)
    {
        $car = Car::create([
            'manufacturer' => $request->manufacturer,
            'year' => $request->year,
            'car_model' => $request->car_model,
            'user_id' => $request->user_id
        ]);

        return $car;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    // Dohvacanje pojedinacnog auta po id-ju
    public function show(Car $car)
    {
        // Isto kao Car::find($id)

        return $car;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
/*    public function edit(Car $car)
    {
        //
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $car->update([
            'manufacturer' => $request->manufacturer,
            'year' => $request->year,
            'car_model' => $request->car_model,
            'user_id' => $request->user_id
        ]);

        return $car;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        return $car->delete();
    }
}
