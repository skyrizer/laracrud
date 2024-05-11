<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve data from a model 
        $permissions = Permission::all(); 
    
        // Return the data as JSON with the specified HTTP response code
        return response()->json(['permissions' => $permissions], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePermissionRequest $request)
    {
        //validate fields
        $attrs = $request->validate([
            'name' => 'required|string',
        ]);

        //create user
        $permission = Permission::create([
            'name' => $attrs['name'],
        ]);

        //return user & token in response
        return response([
            'permission' => $permission,
        ], 200);
    }

    public function update($id, Request $request)
    {
        // Find the config instance by ID
        $permission = Permission::find($id);

        // If config instance exists, update it
        if ($permission) {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'name' => 'required|string',
              
            ]);

            // Update the config instance with validated data
            $permission->name = $validatedData['name'];
            $permission->save();

            return response()->json(['message' => 'Role updated successfully'], 200);
        } else {
            return response()->json(['message' => 'Role not found'], 404);
        }
    }


}
