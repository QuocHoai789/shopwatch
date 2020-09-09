<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\ReplyComment;
use App\Models\Users;

class AjaxFontEndController extends Controller
{
    public function index()
    {
        echo 'ajax controller ok';
    }
    public function addComment(Request $request)
    {
        $table = new Comment;
        $table->content = $request->content;
        $table->users_id = $request->users_id;
        $table->products_id = $request->products_id;
        if ($table->save()) {
            $data['comment'] = $table;
            return view('fontend.ajax.comment', $data);
        }
        //return "false";
    }
    public function addReplyComment(Request $request)
    {
        $table = new ReplyComment;
        $table->content = $request->content;
        $table->comment_id = $request->comment_id;
        $table->users_id = $request->users_id;
        if ($table->save()) {
            $data['reply'] = ReplyComment::find($table->id);
            return view('fontend.ajax.replycomment', $data);
        }
        //return 'false';
    }
    function update_cart($id, Request $req){
        $total = 0;
        $cart = session()->get('cart');
        foreach ($cart as $key => $car) {

         if($key == $id){
            $cart[$key]['quantily'] = $req->number;
            break; 
         }  

        }

        foreach ($cart as $value) {
            $total += $value['price']*$value['quantily'];
        }
        session()->put('cart',$cart);


         
        
        return view('fontend.ajax.update-cart')->with('total',$total)->with('ship',0);
    }
    //check email
    public function checkEmail(Request $request)
    {
        $data = Users::where('email', $request->email)->get();
        if (count($data) >=1) {
            return 'true';
        }
        return 'false';
    }
}
