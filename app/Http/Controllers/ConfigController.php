<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConfigRequest;
use App\Http\Requests\UpdateConfigRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve data from a model 
        $configs = Config::all();

        // Return the data as JSON with the specified HTTP response code
        return response()->json(['configs' => $configs], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attrs = $request->validate([
            'name' => 'required|string',
            'unit' => 'required|string',
        ]);

        //create user
        $config = Config::create([
            'name' => $attrs['name'],
            'unit' => $attrs['unit']
        ]);

        //return user & token in response
        return response([
            'config' => $config,
        ], 200);
    }

    public function delete($id)
    {
        // Find the config instance by ID
        $config = Config::find($id);

        // If config instance exists, delete it
        if ($config) {
            $config->delete();
            return response()->json(['message' => 'Config deleted successfully'], 200);
        } else {
            return response()->json(['error' => 'Config not found'], 404);
        }
    }

    public function update($id, Request $request)
    {
        // Find the config instance by ID
        $config = Config::find($id);

        // If config instance exists, update it
        if ($config) {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'name' => 'required|string',
                'unit' => 'required|string',
            ]);

            // Update the config instance with validated data
            $config->name = $validatedData['name'];
            $config->unit = $validatedData['unit'];
            $config->save();

            return response()->json(['message' => 'Config updated successfully'], 200);
        } else {
            return response()->json(['message' => 'Config not found'], 404);
        }
    }

}
