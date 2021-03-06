<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
	function contactPage()
	{
		return view('fontend.page.contact');
	}
	function post_contact(Request $request)
	{

		$name = $request->name;
		$email = $request->email;
		$phone = $request->phone;
		$message = $request->message;
		$contact = new Contact;
		$contact->name = $name;
		$contact->email = $email;
		$contact->phone_number = $phone;
		$contact->message = $message;
		$contact->save();
		return redirect()->back()->with('notification', 'Da gui loi nhan');
	}
}
