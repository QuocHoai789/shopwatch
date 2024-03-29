<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Products;
use App\Models\News;
use App\Models\ImgProduct;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

	public function index()
	{
		//hello();
		$highlight_product 	= Products::where('status', 1)
			->where('ordernum', 1)
			->limit(12)
			->get();
		$new_product 		= Products::where('status', 1)
			->where('ordernum', 2)
			->limit(12)
			->get();
		$new				= News::all()
			->random(6);
		return view('fontend.page.home', compact('highlight_product', 'new_product', 'new'));
	}
}
