<?php

namespace App\Http\Controllers;

use App\Models\NodeService;
use App\Models\Node;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;



class NodeServiceController extends Controller
{

    public function getByNodeId(Request $request)
    {
        // Validate the request to ensure 'ip_address' is provided
        $request->validate([
            'ip_address' => 'required|ip',
        ]);
    
        // Retrieve the node based on the provided IP address with related services and their background processes
        $node = Node::with(['services.backgroundProcesses'])->where('ip_address',  $request->ip())->first();
    
        // Log the node data
        \Log::info('Node Data:', ['node' => $node, 'ip_address' =>  $request->ip()]);
    
        // Check if the node exists
        if (!$node) {
            return response()->json(['error' => 'Node not found'], Response::HTTP_NOT_FOUND);
        }
    
        // Log the services data
        \Log::info('Node Services:', ['services' => $node->services]);
    
        // Check if the node has related services
        if ($node->services->isEmpty()) {
            return response()->json(['message' => 'No services found for this node'], Response::HTTP_OK);
        }
    
        // Return the node services data along with background processes as JSON with the specified HTTP response code
        return response()->json(['nodeServices' => $node->services], Response::HTTP_OK);
    }

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nodeServices = NodeService::with('service', 'node')
            ->get();


        return response()->json(['nodeServices' => $nodeServices], Response::HTTP_OK);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        //validate fields
        $attrs = $request->validate([
            'service_id' => 'required|exists:services,id',
            'node_id' => 'required|exists:nodes,id',
        ]);



        //create user
        $nodeService = NodeService::create([
            'service_id' => $attrs['service_id'],
            'node_id' => $attrs['node_id']
        ]);

        //return user & token in response
        return response([
            'nodeService' => $nodeService,
        ], 200);
    }


    public function delete($nodeId, $serviceId)
    {
        // Find the node config based on both node ID and config ID
        $nodeService = NodeService::where('node_id', $nodeId)->where('service_id', $serviceId)->first();

        if (!$nodeService) {
            return response()->json(['message' => 'Node service not found'], 404);
        }

        $nodeService->delete();

        return response()->json(['message' => 'Node service deleted successfully'], 200);
    }
}
