<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bills;
use App\Models\BillDetails;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use App\Models\Carts;


class BillFontEndController extends Controller
{
    public function create(Request $request)
    {
        $table = new Bills;
        $table->total = $request->total;
        $table->note = $request->note;
        $table->name = $request->name;
        $table->address = $request->address;
        $table->phone_number = $request->phone_number;
        $table->users_id = $request->users_id;
        $table->save();
        if (Auth::check()) {
            $carts = Carts::where('users_id', Auth::user()->id)->get();
            foreach ($carts as $cart) {
                $detail = new BillDetails;
                $detail->bills_id = $table->id;
                $detail->products_id = $cart->products_id;
                $detail->quantily = $cart->quantily;
                $detail->price = $cart->products->sellprice;
                $detail->save();

                //update quantily product
                $product = Products::find($cart->products_id);
                $quantily = ($product->quantily) - ($cart->quantily);
                $product->quantily = $quantily;
                $product->save();
            }
            Carts::where('users_id', Auth::user()->id)->delete();
        } else {
            $cart = session()->get('cart');
            foreach ($cart as $key => $value) {
                //create detail bill
                $product = Products::find($key);
                $detail = new BillDetails;
                $detail->bills_id = $table->id;
                $detail->products_id = $key;
                $detail->quantily = $cart[$key]['quantily'];
                $detail->price = $cart[$key]['price'];
                $detail->save();

                //update quantily product
                $quantily = ($product->quantily) - $cart[$key]['quantily'];
                $product->quantily = $quantily;
                $product->save();
            }
        }
        //delete all session
        session()->forget('cart');
        return redirect(route('getCart'))->with('notification', 'Đặt đơn hàng thành công');
    }
    public function getBillUser(Request $request)
    {
        $data['bill'] = Bills::find($request->id);
        $data['billDetail'] = BillDetails::where('bills_id', $request->id)->get();
        return view('fontend.page.bill', $data);
    }
}
