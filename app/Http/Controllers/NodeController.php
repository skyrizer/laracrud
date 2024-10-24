<?php

namespace App\Http\Controllers;

use App\Models\Node;
use App\Models\NodeAccess;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorenodeRequest;
use App\Http\Requests\UpdatenodeRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;



class NodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve data from a model 
        $nodes = Node::all(); 
        
        // Return the data as JSON with the specified HTTP response code
        return response()->json(['nodes' => $nodes], Response::HTTP_OK);
    }

    public function getNodes()
    {
        $user = Auth::user(); // Get the currently authenticated user
        $nodes = $user->nodes; // Fetch nodes related to this user
        return response()->json(['nodes' => $nodes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Validate fields
        $attrs = $request->validate([
            'hostname' => 'required|string',
            'ip_address' => 'required|string',
            'role_id' => 'int',
            'user_id' => 'string'
        ]);
    
        // Create node
        $node = Node::create([
            'hostname' => $attrs['hostname'],
            'ip_address' => $attrs['ip_address']
        ]);
    
        // Initialize node ID
        $nodeId = $node->id;
    
        // If roleId and userId are provided, update NodeAccess
        if (isset($attrs['role_id']) && isset($attrs['user_id'])) {
            NodeAccess::updateOrCreate(
                ['role_id' => $attrs['role_id'], 'user_id' => $attrs['user_id']],
                ['node_id' => $nodeId, 'role_id' => $attrs['role_id'], 'user_id' => $attrs['user_id']]
            );
        }
    
        // Return response with node and node ID
        return response()->json([
            'node' => $node,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        // Validate fields
        $attrs = $request->validate([
            'hostname' => 'sometimes|required|string',
            'ip_address' => 'sometimes|required|string',
            'role_id' => 'sometimes|int',
            'user_id' => 'sometimes|string'
        ]);

        // Find node by ID
        $node = Node::find($id);

        if (!$node) {
            return response()->json(['message' => 'Node not found'], 404);
        }

        // Update node attributes
        $node->update($attrs);

        // If roleId and userId are provided, update NodeAccess
        if (isset($attrs['role_id']) && isset($attrs['user_id'])) {
            NodeAccess::updateOrCreate(
                ['role_id' => $attrs['role_id'], 'user_id' => $attrs['user_id']],
                ['node_id' => $node->id, 'role_id' => $attrs['role_id'], 'user_id' => $attrs['user_id']]
            );
        }

        // Return updated node
        return response()->json([
            'node' => $node,
        ], 200);
    }


   /**
     * Delete a node by ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $node = Node::find($id);

        if (!$node) {
            return response()->json(['message' => 'Node not found'], 404);
        }

        $node->delete();

        return response()->json(['message' => 'Node deleted successfully'], 200);
    }

     /**
     * Get the node ID based on the IP address.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getNodeIdByIpAddress(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'ip_address' => 'required|ip'
        ]);

        // Retrieve the IP address from the request
        $ipAddress = $request->input('ip_address');

        // Assuming you have a Node model with an ip_address column
        $node = Node::where('ip_address',  $request->ip())->first();

        if ($node) {
            return response()->json([
                'success' => true,
                'node_id' => $node->id
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Node not found'
            ], 404);
        }
    }
    
}
