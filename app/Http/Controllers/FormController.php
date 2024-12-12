<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Http;

class FormController extends Controller
{
    public function index()
    {
        return Inertia::render('Form');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $payload = json_encode($data);
        $signature = hash_hmac('sha256', $payload, config('app.api_secret_key'));

        $response = Http::withHeaders([
            'X-Signature' => $signature,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->post(config('app.backend_url').'/api/contacts', $data);

        if ($response->status() === 422) {
            return back()->withErrors($response->json()['errors']);
        }

        return redirect()->route('form.confirm');
    }

    public function confirm()
    {
        return Inertia::render('Confirm');
    }
}
