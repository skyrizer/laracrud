<?php

namespace App\Http\Controllers;

use App\Models\NodeAccess;
use App\Models\User;
use App\Models\Node;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNodeAccessRequest;
use App\Http\Requests\UpdateNodeAccessRequest;
use Illuminate\Http\Request;


class NodeAccessController extends Controller
{
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
        $user = new User();
        #$node = new Node();

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

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNodeAccessRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(NodeAccess $nodeAccess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NodeAccess $nodeAccess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNodeAccessRequest $request, NodeAccess $nodeAccess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NodeAccess $nodeAccess)
    {
        //
    }
}
