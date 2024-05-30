<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use Illuminate\Http\Response;

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
    public function store(StoreServiceRequest $request)
    {
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


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
