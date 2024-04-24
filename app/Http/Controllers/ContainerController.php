<?php

namespace App\Http\Controllers;

use App\Models\Container;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContainerRequest;
use App\Http\Requests\UpdateContainerRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ContainerController extends Controller
{

    public function storeContainers(Request $request)
    {
        $data = $request->json()->all();

        if (isset($data['node_id']) && isset($data['containers']) && is_array($data['containers'])) {
            $node_id = $data['node_id'];

            foreach ($data['containers'] as $containerData) {
                // Extract container information
                $containerId = $containerData['CONTAINER ID'];
                $name = $containerData['NAME'];
                $image = $containerData['IMAGE'];
                $createdAt = $containerData['CREATED'];
                $ports = $containerData['PORT'];
                $status = $containerData['STATUS'];

                // Insert into database with associated node_id
                Container::create([
                    'container_id' => $containerId,
                    'name' => $name,
                    'image' => $image,
                    'created' => $createdAt,
                    'port' => $ports,
                    'status' => $status,
                    'disk_limit' => '10',
                    'net_limit' => '10',
                    'mem_limit' => '10',
                    'node_id' => $node_id  // Associate container with node_id
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
        // Retrieve data from a model 
        $containers = Container::all();

        // Return the data as JSON with the specified HTTP response code
        return response()->json(['containers' => $containers], Response::HTTP_OK);
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
