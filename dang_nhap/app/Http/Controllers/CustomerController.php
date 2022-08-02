<?php

namespace App\Http\Controllers;

use App\Models\CustomerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = CustomerModel::all();
        return view('customer.index', compact('customers'));
    }
    public function create()
    {
        return view('customer.create');
    }
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|max:255',
        //     'phone' => 'required|max:11',
        //     'email' => 'required|email|unique',
        //     'image' => 'required',
        // ],[
        //     'name' => 'Bạn chưa nhập Tên',
        //     'phone' => 'Bạn chưa nhập Số Điện Thoại',
        //     'email' => 'Bạn chưa nhập Email',
        //     'image' => 'Bạn chưa nhập ảnh',
        // ]);
    
        $customer = new CustomerModel();
        $customer->name = $request->input('name');
        $customer->phone = $request->input('phone');
        $customer->email = $request->input('email');
        //upload file
        // if ($request->hasFile('image')) {
         
        //     $image = $request->file('image');
        //     $storedPath = $image->move('images', $image->getClientOriginalName());
        //     $customer->image           = 'images/' . $image->getClientOriginalName();
        // }
        $get_image=$request->image;
        $path='public/uploads/login/';
        $get_name_image=$get_image->getClientOriginalName();
        $name_image=current(explode('.',$get_name_image));
        $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);
        $customer->image=$new_image;
        $request['login_image']=$new_image;
        $customer->save();
        //dung session de dua ra thong bao
        Session::flash('success', 'Tạo mới thành công');
        //tao moi xong quay ve trang danh sach customer
        return redirect()->route('customer.index');
    }
    public function edit($id)
    {
        $customers = CustomerModel::findOrFail($id);
        return view('customer.edit', compact('customers'));
    }

    public function update(Request $request, $id)
    {
        $customer = CustomerModel::findOrFail($id);
        $customer->name = $request->input('name');
        $customer->phone = $request->input('phone');
        $customer->email = $request->input('email');
        //cap nhat anh
        // if ($request->hasFile('image')) {

        //     //xoa anh cu neu co
        //     $currentImg = $customer->image;
        //     if ($currentImg) {
        //         Storage::delete('/public/' . $currentImg);
        //     }
        //     // cap nhat anh moi
        //     $image = $request->file('image');
        //     $path = $image->store('image', 'public');
        //     $customer->image = $path;
        // }
        $get_image=$request->image;
        if($get_image){
            $path='public/uploads/login/'.$customer->image;
            if(file_exists($path)){
                unlink($path);
            }
        $path='public/uploads/login/';
        $get_name_image=$get_image->getClientOriginalName();
        $name_image=current(explode('.',$get_name_image));
        $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);
        $customer->image=$new_image;
        $request['login_image']=$new_image;     
        }
        $customer->save();
        //dung session de dua ra thong bao
        Session::flash('success', 'Cập nhật thành công');
        //tao moi xong quay ve trang danh sach customer
        return redirect()->route('customer.index');
    }

    public function destroy($id)
    {
        $customer = CustomerModel::findOrFail($id);
        $image = $customer->image;

        // delete image
        if ($image) {
            Storage::delete('/public/' . $image);
        }
        $customer->delete();
        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa thành công');
        //xoa xong quay ve trang danh sach customer
        return redirect()->route('customer.index');
    }
}
