<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\ReplyComment;
use App\Models\Users;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use App\Models\Carts;

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
        $check_user = Auth::check();
        
        if($check_user == true){

            $users_id = Auth::user()->id;
            $product = Carts::where('products_id', $id)->where('users_id' , $users_id)->first();
            
                $product->quantily = $req->number;
                $product->save();
            $list_product = Carts::where('users_id', $users_id)->get();
            
            foreach($list_product as $list_pro){
                
                $total += $list_pro->products->sellprice*$list_pro->quantily ;

            }
            
            

        }
        else{
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

        }
         
        
        return view('fontend.ajax.update-cart')->with('total',$total)->with('ship',0);
    }

    function delete_cart($id){
        $check_user = Auth::check();
        
        if($check_user == true){
            $users_id = Auth::user()->id;
            Carts::where('products_id',$id)->where('users_id',$users_id)->delete();

        }
        else{
            $cart = session()->get('cart');
            foreach ($cart as $key => $value) {
                if($key == $id){
                    unset($cart[$key]);
                }
            }
            
            if(count($cart) == 0){
                session()->forget('cart');
            }
            else{
                session()->put('cart', $cart);
            }
        }
        
    }

    //check email
    public function checkEmail(Request $request)
    {
        $data = Users::where('email', $request->email)->get();
        if (count($data) >= 1) {
            return 'true';
        }
        return 'false';
    }
}
