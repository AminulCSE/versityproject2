<?php

namespace App\Http\Controllers;
use App\Contact; 
use Mail; 
use Nexmo\Laravel\Facade\Nexmo;
use Illuminate\Http\Request;
class ContactController extends Controller
{
    public function contact_us(){
        return view('website.contact_us');
    }

    public function save_contact(Request $request){
    	$this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'phone_number' => 'required',
            'message' => 'required'
        ]);

        $contact = new Contact;

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->phone_number = $request->phone_number;
        $contact->message = $request->message;
        $contact->save();
        return back()->with('message', 'Thank you for contact us!');
    }

    public function sendsms(){
        Nexmo::message()->send([
            'to'   => '01787377982',
            'from' => '01787377982',
            'text' => 'Using the facade to send a message.'
        ]);
    }
}
