<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ReplyContact;
use Mail;
class ContactController extends Controller
{
    public function all_contact()

    {
    	$contact = Contact::paginate(6);
    	return view('backend.page.contact.all-contact')->with('contact',$contact);
    }

    public function delete_contact($id)
    {
    	$con = Contact::find($id)->delete();
    	return redirect()->back()->with('notification','Đã xóa thành công');
    }

    public function reply_contact($id)
    {
    	$contact = Contact::where('id',$id)->get();
        
        return view('backend.page.contact.reply-contact')->with('contact',$contact);
    }

    public function post_reply_contact($id, Request $request)
    {   
        $contact = Contact::find($id);
        $mail = $request->mail;

        $reply_contact = new ReplyContact;
        
        $reply = $request->reply_message;

        $reply_contact->contact_id = $request->id;

        $reply_contact->content = $reply;

        $reply_contact->save();

        \Mail::to($mail)->send(new \App\Mail\Mailnotify($reply));
        echo "send mail sucessfuly!";
    }
}
