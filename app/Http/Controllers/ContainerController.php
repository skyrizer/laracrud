<?php

namespace App\Http\Controllers;

use App\Models\Container;
use App\Models\Node;
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

    public function agentContainer(Request $request)
    {
        // Validate the request to ensure 'ip_address' is provided
        $request->validate([
            'ip_address' => 'required|ip',
        ]);

        // Retrieve the node based on the provided IP address
        $node = Node::where('ip_address', $request->ip_address)->first();

        // Check if the node exists
        if (!$node) {
            return response()->json(['error' => 'Node not found'], Response::HTTP_NOT_FOUND);
        }

        // Fetch containers based on the node ID
        $containers = Container::where('node_id', $node->id)->get();

        // Return the container data as JSON with the specified HTTP response code
        return response()->json(['containers' => $containers], Response::HTTP_OK);
    }

    public function updateLimits(Request $request, $id)
    {

        // Log the ID for debugging
        \Log::info('Container ID: ' . $id);

        $container = Container::findOrFail($id);

        \Log::info('Container Data: ' . $container);
        \Log::info('Request: ' . $request);
        // Validate request data
        $request->validate([
            'disk_limit' => 'nullable|integer',
            'mem_limit' => 'nullable|integer',
            'cpu_limit' => 'nullable|integer',
            'net_limit' => 'nullable|integer',
        ]);

        \Log::info('disk_limit: success');
        // Update container limits
        if ($request->has('disk_limit')) {

            $container->disk_limit = $request->disk_limit;
        }
        if ($request->has('mem_limit')) {
            $container->mem_limit = $request->mem_limit;
        }
        if ($request->has('cpu_limit')) {
            $container->cpu_limit = $request->cpu_limit;
        }
        if ($request->has('net_limit')) {
            $container->net_limit = $request->net_limit;
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
