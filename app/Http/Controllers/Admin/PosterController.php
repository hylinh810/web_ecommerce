<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class PosterController extends Controller
{
    public function index(){
        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return redirect('admin/login');
        }
        $posters = Poster::get();
        return view('admin.poster.index', compact('posters'));
    }

    public function add()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return redirect('admin/login');
        }
        return view('admin.poster.add');
    }

    public function post(Request $request)
    {
        $admin_id = Session::get('admin_id');
        $data = $request->all();
        
        $data['user_id'] = $admin_id;
// dd($data);

        $img = $request->file('image');
        $exten = $img->getClientOriginalExtension();
        $filename = pathinfo($img, PATHINFO_FILENAME);
        $newname = $filename . mt_rand(10000, 99999);
        $request->file('image')->move(public_path('front/poster'), $newname . '.' . $exten);

        $data['image'] = $newname . '.' . $exten;
        Poster::create($data);

        return redirect()->back()->with('success', 'Thêm poster thành công');
    }

    public function edit($id)
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return redirect('admin/login');
        }
        $poster = Poster::find($id);
        return view('admin.poster.edit', compact('poster'));
    }

    public function update($id, Request $request)
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return redirect('admin/login');
        }


        $admin_id = Session::get('admin_id');
        $data = $request->all();

        $data['user_id'] = $admin_id;
        
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $exten = $img->getClientOriginalExtension();
            $filename = pathinfo($img, PATHINFO_FILENAME);
            $newname = $filename . mt_rand(10000, 99999);
            $request->file('image')->move(public_path('front/poster'), $newname . '.' . $exten);
            $data['image'] = $newname . '.' . $exten;
            // unset($data['image']);
        }
        Poster::find($id)->update($data);
        return redirect()->back()->with('success', 'Cập nhập poster thành công');
    }

    public function remove($id)
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return redirect('admin/login');
        }
        $poster = Poster::find($id);
        $poster->delete();
        File::delete(public_path('front/poster/' . $poster->image));
        return redirect()->back();
    }


}