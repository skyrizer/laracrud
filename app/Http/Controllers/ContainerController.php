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

        \Log::info('Received container data: ' . json_encode($data['containers']));

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
                    'id' => $containerId,
                    'name' => $name,
                    'image' => $image,
                    'created' => $createdAt,
                    'port' => $ports,
                    'status' => $status,
                    'disk_limit' => '10',
                    'net_limit' => '10',
                    'mem_limit' => '10',
                    'cpu_limit' => '10',
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

    public function updateLimits(Request $request, $id)
    {
        $container = Container::findOrFail($id);

        // Validate request data
        $request->validate([
            'disk_limit' => 'nullable|string',
            'mem_limit' => 'nullable|string',
            'cpu_limit' => 'nullable|string',
            'net_limit' => 'nullable|string',
        ]);

        // Update container limits
        if ($request->has('disk_limit')) {
            $container->diskLimit = $request->disk_limit;
        }
        if ($request->has('mem_limit')) {
            $container->memLimit = $request->mem_limit;
        }
        if ($request->has('cpu_limit')) {
            $container->cpuLimit = $request->cpu_limit;
        }
        if ($request->has('net_limit')) {
            $container->netLimit = $request->net_limit;
        }

        $container->save();

        return response()->json(['message' => 'Container limits updated successfully'], 200);
    }

    public function show($id)
    {
        // Find the container by ID
        $container = Container::find($id);

        // Check if the container exists
        if (!$container) {
            return response()->json(['error' => 'Container not found'], 404);
        }

        // Return the container data
        return response()->json(['container' => $container], Response::HTTP_OK);
    }

}
