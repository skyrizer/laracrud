<?php

namespace App\Http\Controllers;

use App\Models\Container;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContainerRequest;
use App\Http\Requests\UpdateContainerRequest;
use Illuminate\Http\Request;


class ContainerController extends Controller
{
    
    public function getContainers(Request $request)
    {
        $data = $request->json()->all();
        
        if (isset($data['containers']) && is_array($data['containers'])) {
            foreach ($data['containers'] as $containerData) {

                // Extract container information
                $containerId = $containerData['CONTAINER ID'];
                $name = $containerData['NAME'];
                $image = $containerData['IMAGE'];
                $createdAt = $containerData['CREATED'];
                $ports = $containerData['PORT'];
                $status = $containerData['STATUS'];
                
                // Insert into database
                Container::create([
                    'container_id' => $containerId,
                    'name' => $name,
                    'image' => $image,
                    'created' => $createdAt,
                    'port' => $ports,
                    'status' => $status,
                    'node_id' => 1
                ]);
            }
            
            // Log success and return response
            \Log::info('Received container data: ' . json_encode($data['containers']));
            return response()->json(['message' => 'Container data received and inserted successfully']);
        } else {
            return response()->json(['error' => 'Invalid request data'], 400);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreContainerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Container $container)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Container $container)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContainerRequest $request, Container $container)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Container $container)
    {
        //
    }
}
