<?php

namespace App\Http\Controllers;

use App\Models\BackgroundProcess;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBackgroundProcessRequest;
use App\Http\Requests\UpdateBackgroundProcessRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class BackgroundProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getByServiceId($serviceId)
    {
        // Retrieve node configurations for the specified node ID with their related data
        $backgroundProcesses = BackgroundProcess::where('service_id', $serviceId)->get();
        
        // Return the node configurations with related data as JSON with HTTP response code 200 (OK)
        return response()->json(['backgroundProcesses' => $backgroundProcesses], Response::HTTP_OK);
    }


      /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //validate fields
         $attrs = $request->validate([
            'name' => 'required|string',
            'service_id' => 'required|exists:services,id',

        ]);

        //create user
        $backgroundProcess = BackgroundProcess::create([
            'name' => $attrs['name'],
            'service_id' => $attrs['service_id']
        ]);

        //return user & token in response
        return response([
            'backgroundProcess' => $backgroundProcess,
        ], 200);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(BackgroundProcess $backgroundProcess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BackgroundProcess $backgroundProcess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBackgroundProcessRequest $request, BackgroundProcess $backgroundProcess)
    {
        //
    }

    public function delete($bpId)
    {
        // Find the background process by ID
        $backgroundProcess = BackgroundProcess::find($bpId);
    
        // Check if the background process exists
        if (!$backgroundProcess) {
            return response()->json(['message' => 'Background Process not found'], 404);
        }
    
        // Delete the background process
        $backgroundProcess->delete();
    
        // Return a success response
        return response()->json(['message' => 'Background Process deleted successfully'], 200);
    }

}
