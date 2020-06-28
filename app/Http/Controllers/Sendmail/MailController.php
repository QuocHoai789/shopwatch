<?php

namespace App\Http\Controllers\Sendmail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
class MailController extends Controller
{
    public function sendmail(){
    	$detail=
    	[
    		'title'=>'Xin chào bạn',
    		'body'=>'Đây là email phản hồi của chúng tôi về thắc mắc của bạn đã được gửi trước đó',
    	];

    	\Mail::to('nguyenquochoai789@gmail.com')->send(new \App\Mail\Mailnotify($detail));
    	echo "send mail sucessfuly!";
    }
}
