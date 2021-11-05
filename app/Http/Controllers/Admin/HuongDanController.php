<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HuongDan;

class HuongDanController extends Controller
{
    public function index(){
        $huongdan = HuongDan::orderBy('created_at', 'desc')->paginate(5);
        return view('backend.page.huongdan.all-huongdan')->with(['huongdan'=>$huongdan]);
    }
    public function addHuongDan(){
        return view('backend.page.huongdan.add-huongdan');
    }
    public function post_addHuongDan(Request $req){
        
        $new_hd = new HuongDan();
        $new_hd->title = $req->title;
        $new_hd->content = $req->content;
        $new_hd->status = $req->status;
        if($new_hd->save()){
            return redirect(route('list-huongdan'))->with('notification','Đã thêm mới thành công');
        }else{
            return redirect()->back()->with('notification', 'Đã xảy ra lỗi');
        }
        

    }
    public function edit($id){
        $huongdan_item = HuongDan::where('id',$id)->get();
        return view('backend.page.huongdan.edit-huongdan')->with(['item'=>$huongdan_item]);
    }
    public function post_edit($id, Request $req){
        $huongdan = HuongDan::find($id);
        $huongdan->title = $req->title;
        $huongdan->content = $req->content;
        $huongdan->status = $req->status;
        if($huongdan->save()){
            return redirect(route('list-huongdan'))->with('notification','Đã chỉnh sửa thành công');
        }else{
            return redirect()->back()->with('notification', 'Đã xảy ra lỗi');
        }
    }
    public function delete($id){
        HuongDan::find($id)->delete();
        return redirect()->back();
    }
}
