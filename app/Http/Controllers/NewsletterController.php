<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;

class NewsletterController extends Controller
{
    // auto execute this function when the controller called on  the routes file
    public function __invoke(Newsletter $newsletter)
    {
        try {
            $newsletter->subscribe(request('email'));
        } catch (\Exception $e) {
            throw \Illuminate\Validation\ValidationException::withMessages(['email' => 'This email could be added to our newsletter list']);
        }
        return redirect()->back()->with('success', 'You have subscribed successfully!');
    }
}
