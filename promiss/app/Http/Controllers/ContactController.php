<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email:rfc,dns', 'max:255'],
            'phone' => ['nullable', 'string', 'max:64'],
            'event_type' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        $recipient = 'info@promissagency.com';
        $subject = 'Novy dopyt z webu - ' . $validated['event_type'];

        $html = view('emails.contact', [
            'data' => $validated,
        ])->render();

        try {
            Mail::html($html, function ($message) use ($recipient, $subject, $validated) {
                $message->to($recipient)
                    ->subject($subject)
                    ->replyTo($validated['email'], $validated['name']);
            });

            Mail::html(
                view('emails.confirmation', ['data' => $validated])->render(),
                function ($message) use ($validated) {
                    $message->to($validated['email'], $validated['name'])
                        ->subject('Ďakujeme za záujem');
                }
            );
        } catch (\Throwable $exception) {
            Log::error('Contact form email send failed.', [
                'error' => $exception->getMessage(),
            ]);

            return response()->json([
                'message' => 'Správu sa nepodarilo odoslať. Skúste to prosím znova.',
            ], 500);
        }

        return response()->json([
            'message' => 'Ďakujeme, vaša správa bola odoslaná.',
        ]);
    }
}
