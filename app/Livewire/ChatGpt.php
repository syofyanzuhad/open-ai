<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class ChatGpt extends Component
{
    public $prompt;
    public $response;
    public $error;

    public function ask()
    {
        try {
            $response = Http::withoutVerifying()
                ->withHeaders([
                    'Authorization' => 'Bearer ' . config('services.openai.api_key'),
                    'Content-Type' => 'application/json',
                ])->post('https://api.openai.com/v1/engines/gpt-3.5-turbo-instruct/completions', [
                    "prompt" => $this->prompt,
                    "max_tokens" => 1000,
                    "temperature" => 0.5
                ]);
            // dd($response->json());
            // $this->error = null;

            // if error, return error message
            if (isset($response->json()['error'])) {
                $this->error = $response->json()['error']['message'];
                return;
            }

        } catch (\Exception $e) {
            $this->error = $e->getMessage();
        }
        // if no error, return response
        $this->error = null;

        $this->response = $response->json()['choices'][0]['text'];
    }

    public function updatedPrompt()
    {
        $this->response = null;
    }

    public function updatedResponse()
    {
        $this->prompt = null;
    }

    public function render()
    {
        return view('livewire.chat-gpt');
    }
}
