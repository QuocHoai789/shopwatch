<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ImgProduct;
use App\Models\Comment;
use App\Models\ReplyComment;

class ProductDetailController extends Controller
{
    public function getProductDetail(Request $request, $id)
    {
        $products = Products::find($request->id);
        if (isset($products)) {
            $listProducts   = Products::all();
            $comments       =  Comment::where('products_id', $request->id)->get();
            return view('fontend.page.single', compact('products', 'listProducts', 'comments'));
        } else {
            abort(404, 'Trang không tồn tại');
        }
    }
}
