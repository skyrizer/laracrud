<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRoleRequest;
use App\Http\Requests\UpdateUserRoleRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;



class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve data from a model 
        $roles = UserRole::all(); 
    
        // Return the data as JSON with the specified HTTP response code
        return response()->json(['roles' => $roles], Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRoleRequest $request)
    {
        //validate fields
        $attrs = $request->validate([
            'role' => 'required'

        ]);

        //create user
        $role = UserRole::create([
            'role' => $attrs['role']
        ]);

        //return user & token in response
        return response([
            'role' => $role,
        ], 200);

    }

    public function update($id, Request $request)
    {
        // Find the config instance by ID
        $role = UserRole::find($id);

        // If config instance exists, update it
        if ($role) {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'role' => 'required|string',
              
            ]);

            // Update the config instance with validated data
            $role->name = $validatedData['role'];
            $role->save();

            return response()->json(['message' => 'Role updated successfully'], 200);
        } else {
            return response()->json(['message' => 'Role not found'], 404);
        }
    }

   
}
