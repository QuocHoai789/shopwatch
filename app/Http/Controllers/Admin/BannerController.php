<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banners;
use App\Http\Requests\BannerRequest;
session_start();
class BannerController extends Controller
{
    //comments
    function add_banner()
    {
        return view('backend.page.banner.add-banner');
    }
    function post_add_banner(BannerRequest $request)
    {
        

        $banner = new Banners();
        $banner->name = $request->banner_name;
        if (isset($request->banner_link)) {
            $banner->link = $request->banner_link;
        }
        $banner->status = $request->banner_status;
        $banner->ordernum = $request->banner_odernum;
        //hình ảnh
        $file_image = $request->banner_image;

        $file_name = $file_image->getClientOriginalName();
        $file_image->move('public/upload/images/', $file_name);
        $banner->image = $file_name;
        $banner->save();
        // $request->session()->flash('status', 'Đã thêm mới thành công!');

        return redirect('admin/banner/all-banner')->with('notification', 'Đã thêm mới thành công!');
    }
    function all_banner()
    {
        $banners = Banners::orderBy('ordernum','asc')->get();
        return view('backend.page.banner.all-banner', ['banners' => $banners]);
    }
    function active_banner($id, Request $req)
    {
        $banner = Banners::find($id);
        if($req->status == 1)
        {
            $banner->status = 0;
            $banner->save();
            echo 'Ẩn';
        }

        else if($req->status == 0)
        {
            $banner->status = 1;
            $banner->save();
            echo 'Hiện';
        }
        
        
        
    }
    
    function edit_banner($id)
    {
        $banner = Banners::where('id', $id)->get();
        //dd($banner);
        return view('backend.page.banner.edit-banner', ['banners' => $banner]);
    }
    function post_edit_banner(Request $request, $id)
    {

        $banner = Banners::find($id);
        $banner->name = $request->edit_banner_name;
        $banner->link = $request->edit_banner_link;
        $banner->status = $request->edit_banner_status;
        $banner->ordernum = $request->edit_banner_ordernum;

        //hình ảnh
        $file_image = $request->edit_banner_img;
        if ($file_image) {
            $file_name = $file_image->getClientOriginalName();
            $file_image->move('public/upload/images/', $file_name);
            $banner->image = $file_name;
        }
        $banner->save();
        return redirect('admin/banner/all-banner')->with('notification', 'Đã cập nhật thành công!');
    }
    function delete_banner($id)
    {
        Banners::find($id)->delete();
        return redirect('admin/banner/all-banner')->with('notification', 'Đã xóa thành công!');
    }
}
