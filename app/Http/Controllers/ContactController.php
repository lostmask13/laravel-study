<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\NewContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact-us');
    }

    public function store(ContactRequest $request)
    {
        $mail = new NewContact(
            $request->get('name'),
            $request->get('email'),
            $request->get('phone')
        );

        Mail::to('info@dev.com')->send($mail);

        session()->flash('success', trans('messages.contact.success'));

        return redirect()->back();
    }
}
