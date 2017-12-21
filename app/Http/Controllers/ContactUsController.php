<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;
use Session;

class ContactUsController extends Controller
{
    public function Index()
    {
        return view('contactus');
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'name' => 'min:5',
            'phone' => 'required|^\d{3}-\d{3}\d{4}$',
            'subject' => 'min:5',
            'email' => 'required|email',
            'message' => 'min:10']);

        $data = array(
            'name'=> $request->name,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'email' => $request->email,
            'bodyMessage' => $request->message
        );

        Mail::queue('emails.contact', $data, function($message) use ($data){
            $message->name($data['name']);
            $message->phone($data['phone']);
            $message->subject($data['subject']);
            $message->from($data['email']);
            $message->to('eoku112233@gmail.com');
            
        });

        Session::flash('success', 'Your Contact Form and Email was sent!');

        return redirect('/ContactUs');
    }
     
}
