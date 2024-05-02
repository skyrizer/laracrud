<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\HttpResponse;


class LogHttpRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {

        dd('Middleware executed!');

        \Log::info('LogHttpRequests middleware executed.');

        // Log information about the incoming request
        $response = $next($request);

        \Log::info('Incoming request: ' . $request->getMethod() . ' ' . $request->getRequestUri());

        $response->setContent('Middleware applied! ' . $response->getContent());

        // Log information about the outgoing response (optional)
        $this->logResponse($request, $response);

        return $response;
    }

    protected function logResponse(Request $request, $response)
    {
        // Log response information to the http_responses table
        HttpResponse::create([
            'url' => $request->fullUrl(),
            // 'method' => $request->method(),
            // 'request_headers' => json_encode($request->header()),
            // 'request_body' => $request->getContent(),
            'status_code' => $response->status(),
            'node_id' => '1',
            // 'response_headers' => json_encode($response->headers->all()),
            // 'response_body' => $response->getContent(),
            // 'ip_address' => $request->ip(),
            //'created_at' => now(),
        ]);
    }
}
