<?php

namespace App\Http\Controllers;

use App\Models\NodeConfig;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNodeConfigRequest;
use App\Http\Requests\UpdateNodeConfigRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;



class NodeConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all node configurations with their related data and group them by node_id
        $nodeConfigs = NodeConfig::with('config', 'node')
                        ->get()
                        ->groupBy('node_id');
    
        // Return the grouped node configurations with related data as JSON with HTTP response code 200 (OK)
        return response()->json(['nodeConfigs' => $nodeConfigs], Response::HTTP_OK);
    }

    public function getByNodeId($nodeId)
    {
        // Retrieve node configurations for the specified node ID with their related data
        $nodeConfigs = NodeConfig::with('config', 'node')
                        ->where('node_id', $nodeId)
                        ->get();
        
        // Return the node configurations with related data as JSON with HTTP response code 200 (OK)
        return response()->json(['nodeConfigs' => $nodeConfigs], Response::HTTP_OK);
    }
   
      public function create(Request $request)
    {
         //validate fields
         $attrs = $request->validate([
            'config_id' => 'required|int',
            'node_id' => 'required|int',
            'value' => 'required|int',

        ]);

        //create user
        $node = NodeConfig::create([
            'config_id' => $attrs['config_id'],
            'node_id' => $attrs['node_id'],
            'value' => $attrs['value'],

        ]);

        //return user & token in response
        return response([
            'node' => $node,
        ], 200);
    }

    public function delete($id)
    {
        $nodeConfig = NodeConfig::find($id);

        if (!$nodeConfig) {
            return response()->json(['message' => 'Node config not found'], 404);
        }

        $nodeConfig->delete();

        return response()->json(['message' => 'Node config deleted successfully'], 200);
    }

}
