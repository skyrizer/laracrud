<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConfigRequest;
use App\Http\Requests\UpdateConfigRequest;
use Illuminate\Http\Response;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

    public function index()
    {
        // Retrieve data from a model (e.g., Eloquent ORM)
        $configs = Config::all(); // Example assuming you have an 'Item' model
    
        // Return the data as JSON with the specified HTTP response code
        return response()->json(['configs' => $configs], Response::HTTP_OK);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConfigRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Config $config)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Config $config)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConfigRequest $request, Config $config)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Config $config)
    {
        //
    }
}
