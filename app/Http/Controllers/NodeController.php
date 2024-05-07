<?php

namespace App\Http\Controllers;

use App\Models\Node;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorenodeRequest;
use App\Http\Requests\UpdatenodeRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


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

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
         //validate fields
         $attrs = $request->validate([
            'hostname' => 'required|string',
            'ip_address' => 'required|string',
        ]);

        //create user
        $node = Node::create([
            'hostname' => $attrs['hostname'],
            'ip_address' => $attrs['ip_address']
        ]);

        //return user & token in response
        return response([
            'node' => $node,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorenodeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(node $node)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(node $node)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatenodeRequest $request, node $node)
    {
        //
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
    
}
