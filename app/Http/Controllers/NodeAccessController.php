<?php

namespace App\Http\Controllers;

use App\Models\NodeAccess;
use App\Models\User;
use App\Models\Node;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNodeAccessRequest;
use App\Http\Requests\UpdateNodeAccessRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;



class NodeAccessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve data from a model 
        $nodeAccesses = NodeAccess::all();

        // Return the data as JSON with the specified HTTP response code
        return response()->json(['node accesses' => $nodeAccesses], Response::HTTP_OK);
    }

    public function getByNodeId($nodeId)
    {
        // Retrieve node configurations for the specified node ID with their related data
        $nodeAccesses = NodeAccess::with('role', 'node', 'user')
            ->where('node_id', $nodeId)
            ->get();

        $nodeAccessesWithId = $nodeAccesses->map(function ($nodeAccess) {
            return [
                'role' => $nodeAccess->role,
                'node' => $nodeAccess->node,
                'user' => $nodeAccess->user,
                // Include other attributes if necessary
            ];
        });

        // Return the node configurations with related data as JSON with HTTP response code 200 (OK)
        return response()->json(['nodeAccesses' => $nodeAccessesWithId], Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        //validate fields
        $attrs = $request->validate([
            'user_id' => 'required|exists:user,id',
            'role_id' => 'required|exists:role,id',
            'node_id' => 'required|exists:node,id',
        ]);

        //create user
        $nodeAccess = NodeAccess::create([
            'user_id' => $attrs['user_id'],
            'role_id' => $attrs['role_id'],
            'node_id' => $attrs['node_id']
        ]);

        //return user & token in response
        return response([
            'nodeAccess' => $nodeAccess,
        ], 200);
    }


    public function update($id, Request $request)
    {
        // Find the config instance by ID
        $nodeAccesses = NodeAccess::find($id);

        // If config instance exists, update it
        if ($nodeAccesses) {

            // Validate the incoming request data
            $validatedData = $request->validate([
                'user_id' => 'required|int',
                'node_id' => 'required|int',
                'role_id' => 'required|int',
            ]);

            // Update the config instance with validated data
            $nodeAccesses->user_id = $validatedData['user_id'];
            $nodeAccesses->node_id = $validatedData['node_id'];
            $nodeAccesses->role_id = $validatedData['role_id'];

            $nodeAccesses->save();

            return response()->json(['message' => 'Node access updated successfully'], 200);
        } else {
            return response()->json(['message' => 'Node access not found'], 404);
        }
    }


    public function delete($nodeId, $userId, $roleId)
    {
        // Find the node config based on both node ID and config ID
        $nodeAccess = NodeAccess::where('node_id', $nodeId)->where('role_id', $roleId)->where('user_id', $userId)->first();

        if (!$nodeAccess) {
            return response()->json(['message' => 'Node access not found'], 404);
        }

        $nodeAccess->delete();

        return response()->json(['message' => 'Node access deleted successfully'], 200);
    }


    public function getByUserId($userId)
    {
        // Retrieve node accesses for the specified user ID with their related nodes
        $nodeAccesses = NodeAccess::with('node')
            ->where('user_id', $userId)
            ->get();

        // Extract the nodes from the node accesses
        $nodes = $nodeAccesses->map(function ($nodeAccess) {
            return $nodeAccess->node;
        });

        // Return the nodes as JSON with HTTP response code 200 (OK)
        return response()->json(['nodes' => $nodes], Response::HTTP_OK);
    }


}
