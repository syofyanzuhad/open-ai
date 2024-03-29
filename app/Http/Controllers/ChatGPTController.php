<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatGPTController extends Controller
{
    public function index()
    {
        return view('chatgpt.index');
    }

    public function ask(Request $request)
    {
        $prompt = $request->input('prompt');
        $response = $this->askToChatGPT($prompt);

        return view('chatgpt.response', ['response' => $response]);
    }

    private function askToChatGPT($prompt) 
    {
        $response = Http::withoutVerifying()
            ->withHeaders([
                'Authorization' => 'Bearer ' . config('services.openai.api_key'),
                'Content-Type' => 'application/json',
            ])->post('https://api.openai.com/v1/engines/gpt-3.5-turbo-instruct/completions', [
                "prompt" => $prompt,
                "max_tokens" => 1000,
                "temperature" => 0.5
            ]);
            // dd($response->json());

        return $response->json()['choices'][0]['text'];
    }
}
