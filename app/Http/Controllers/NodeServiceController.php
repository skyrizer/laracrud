<?php

namespace App\Http\Controllers;

use App\Models\NodeService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNodeServiceRequest;
use App\Http\Requests\UpdateNodeServiceRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;



class NodeServiceController extends Controller
{


    public function getByNodeId($nodeId)
    {
        // Retrieve node configurations for the specified node ID with their related data
        $nodeServices = NodeService::with('service', 'user')
                        ->where('node_id', $nodeId)
                        ->get();
        
        // Return the node configurations with related data as JSON with HTTP response code 200 (OK)
        return response()->json(['nodeServices' => $nodeServices], Response::HTTP_OK);
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
    public function create(Request $request)
    {

          //validate fields
          $attrs = $request->validate([
            'service_id' => 'required|exists:service,id',
            'node_id' => 'required|exists:node,id',
        ]);

        //create user
        $nodeService = NodeService::create([
            'user_id' => $attrs['user_id'],
            'role_id' => $attrs['role_id'],
            'node_id' => $attrs['node_id']
        ]);

        //return user & token in response
        return response([
            'nodeService' => $nodeService,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNodeServiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(NodeService $nodeService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NodeService $nodeService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNodeServiceRequest $request, NodeService $nodeService)
    {
        //
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
