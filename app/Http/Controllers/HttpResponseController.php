<?php

namespace App\Http\Controllers;

use App\Models\HttpResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHttpResponseRequest;
use App\Http\Requests\UpdateHttpResponseRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;



class HttpResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve data from a model in reverse order
        $httpResponse = HttpResponse::orderBy('id', 'desc')->get(); // Assuming 'id' is the primary key

        // Return the data as JSON with the specified HTTP response code
        return response()->json(['httpResponse' => $httpResponse], Response::HTTP_OK);
    }

    public function searchByCode(Request $request)
    {
        // Validate the incoming request to ensure status_code is provided and is a string
        $request->validate([
            'status_code' => 'required|int',
        ]);

        // Retrieve the status code from the request
        $statusCode = $request->input('status_code');

        // Build the query
        $query = HttpResponse::query();

        // Apply status code filter
        $query->where('status_code', 'like', $statusCode . '%');

        // Execute the query and get the results
        $httpResponse = $query->get();

        // Return the responses as a JSON response
        return response()->json(['httpResponse' => $httpResponse], Response::HTTP_OK);
        // return response()->json($responses);
    }

    public function searchByDate(Request $request)
    {
        // Validate the incoming request to ensure status_code, start_date, and end_date are provided
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Retrieve the inputs from the request
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Build the query
        $query = HttpResponse::query();

        // Apply date range filter
        $query->whereBetween('created_at', [$startDate, $endDate]);

        // Execute the query and get the results
        $httpResponse = $query->get();

        // Return the responses as a JSON response
        return response()->json(['httpResponse' => $httpResponse], Response::HTTP_OK);
    }

}
