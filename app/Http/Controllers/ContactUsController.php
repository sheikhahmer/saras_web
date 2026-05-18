<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessageRequest;
use App\Models\ContactMessage;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class ContactUsController extends Controller
{
    public function contactUs(): View
    {
        return view('contact-us');
    }

    public function store(StoreContactMessageRequest $request): JsonResponse
    {
        ContactMessage::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Thank you! Your message has been sent successfully. We will get back to you soon.',
        ]);
    }
}
