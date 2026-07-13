<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function sendContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'subject' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',    
            'captcha' => 'required|captcha',
        ]);

        $data = $request->all();

        $admin = env('MAIL_FROM_ADDRESS');
        //Mail::to($data["email"])->send(new ContactMail($data));
        /*  Mail::to($admin)->send(new ContactMail($data)); */

        if ($request->ajax()) {
            return response()->json(['success' => __('frontend.message_sent_success')]);
        }

        return redirect('contact')->with('success', __('frontend.message_sent_success'));
    }
}
