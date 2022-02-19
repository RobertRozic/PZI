<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getCars(Request $request) {

        $cars = [
            'auto1', 'auto2'
        ];

        return $cars;
    }

    public function getCar(Request $request, $id)
    {
       dd($id);
    }
}
