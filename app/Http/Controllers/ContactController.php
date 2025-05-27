<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required|min:10|max:2000'
        ]);

        // Implementirajte logiku slanja emaila ovde
        // Mail::to(config('mail.from.address'))->send(new ContactFormMail($validated));

        return redirect()->route('contact')
            ->with('success', 'Vaša poruka je uspešno poslata!');
    }
}
