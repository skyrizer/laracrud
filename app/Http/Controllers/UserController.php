<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\User;


class UserController extends Controller
{
    //
      /**
     * Search for users by name.
     */
    public function searchUserByName(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string'
        ]);
    
        // Retrieve users based on the provided name, starting from the first letter
        $users = User::where('name', 'like', $request->name . '%')->get();
    
        // Return the users as JSON with HTTP response code 200 (OK)
        return response()->json(['users' => $users], Response::HTTP_OK);
    }

}
