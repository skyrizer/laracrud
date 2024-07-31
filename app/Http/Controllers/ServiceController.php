<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Retrieve data from a model 
         $services = Service::all(); 
    
         // Return the data as JSON with the specified HTTP response code
         return response()->json(['services' => $services], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        \Log::info('Request data: ', $request->all());
        \Log::info('TEST');


         //validate fields
         $attrs = $request->validate([
            'name' => 'required'

        ]);

        //create user
        $service = Service::create([
            'name' => $attrs['name']
        ]);

        //return user & token in response
        return response([
            'service' => $service,
        ], 200);
    }

    public function getService($name)
    {
        $service = Service::where('name', $name)->first();

        if ($service) {
            return response()->json($service);
        } else {
            return response()->json(['message' => 'Service not found'], 404);
        }
    }


}
