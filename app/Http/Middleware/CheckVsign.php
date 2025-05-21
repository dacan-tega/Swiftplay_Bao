<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckVsign
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $assign = explode(',', preg_replace("/(t=)|(vsign=)/", '', $request->header('verify-signature')));
        $body = $request->input('requestBody');
        if($body['transactionType'] == 'PAYMENT'){

            if (count($assign) == 2) {
                $timestamp = $assign[0];
                $signatureHash = $assign[1];
                $payload = json_encode($request->all());

                $result = hash_hmac('sha256', $timestamp . '.' . $payload, 'r5Uaf6vbhAZkYmt1BCTw3Sc7Xx2qQlJGp84VzdiL') == $signatureHash;

                if ($result)  return $next($request);
                return response(null, 200);
            }else{

                if (count($assign) == 2) {
                    $timestamp = $assign[0];
                    $signatureHash = $assign[1];
                    $payload = json_encode($request->all());

                    $result = hash_hmac('sha256', $timestamp . '.' . $payload, 'GKDlfqwC61FycM5RmjIue8ZPUtS7AapzYJXdBQ2L') == $signatureHash;

                    if ($result)  return $next($request);
                    return response(null, 200);
                }
            }

        }

        return response(null, 200);
    }
}
