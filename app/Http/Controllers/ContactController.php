<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactController extends Controller
{
    /**
     * Email a contact form message to the portfolio owner.
     */
    public function store(ContactRequest $request): RedirectResponse
    {
        $backToForm = redirect()->to(route('home').'#contact');

        // Spam trap: people never see the "website" field, bots fill it in.
        // Pretend it worked so the bot learns nothing.
        if ($request->filled('website')) {
            return $backToForm->with('contact_sent', true);
        }

        try {
            Mail::to(config('portfolio.email'))->send(new ContactMessage(
                senderName: $request->validated('name'),
                senderEmail: $request->validated('email'),
                messageText: $request->validated('message'),
            ));
        } catch (Throwable $e) {
            report($e);

            return $backToForm->withInput()->with('contact_failed', true);
        }

        return $backToForm->with('contact_sent', true);
    }
}
