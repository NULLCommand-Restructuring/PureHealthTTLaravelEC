<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class AIController extends Controller
{
    public function callBard(Request $request)
    {
        $message = $request->json()->get('message');
        $response = Http::post('http://fxtchatapi.hackquest.com:1112/api/bard', [
            'message' => $message
        ]);

        $result = $response->body();
        return $result;
    }
    public function callGPT(Request $request)
    {
        $message = $request->json()->get('message');
        $response = Http::post('http://fxtchatapi.hackquest.com:1111/api/openai', [
            'message' => $message
        ]);

        $result = $response->body();
        return json_decode($result);
    }
    public function callBing(Request $request)
    {
        $message = $request->json()->get('message');
        $response = Http::timeout(300)->post('http://fxtchatapi.hackquest.com:1112/api/bingai', [
            'message' => $message
        ]);
        $result = $response->body();
        return $result;
    }
}
