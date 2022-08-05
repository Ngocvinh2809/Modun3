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
        $validator  = $this->validate($request, [
            'name' => 'required|max:255',
            'phone' => 'required|max:11',
            'email' => 'required|email|unique:customers',
            'image' => 'required',
        ]
        ,[
            'name.required' => 'Bạn chưa nhập Tên',
            'name.max' => 'Tên quá dài',
            'phone.required' => 'Bạn chưa nhập Số Điện Thoại',
            'phone.max' => 'Số điện thoại quá dài',
            'email.required' => 'Bạn chưa nhập Email',
            'email.email' => 'Bạn chưa nhập Email',
            'email.unique' => 'Email đã tồn tại',
            'image.required' => 'Bạn chưa nhập ảnh',
        ]
    );
        $customer = new CustomerModel();
        $customer->name = $request->input('name');
        $customer->phone = $request->input('phone');
        $customer->email = $request->input('email');
      
        if ($request->hasFile('image')) {
            $file = $request->image;
            $fileExtension = $file->getClientOriginalExtension(); //jpg,png lấy ra định dạng file và trả về
            $fileName = time(); //45678908766 tạo tên file theo thời gian
            $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
            $path = 'storage/' . $request->file('image')->store('image', 'public'); //lưu file vào mục public/images với tê mới là $newFileName
            $customer->image = $path;
        }
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
    
        if ($request->hasFile('image')) {
            $file = $request->image;
            $fileExtension = $file->getClientOriginalExtension(); //jpg,png lấy ra định dạng file và trả về
            $fileName = time(); //45678908766 tạo tên file theo thời gian
            $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
            $path = 'storage/' . $request->file('image')->store('image', 'public'); //lưu file vào mục public/images với tê mới là $newFileName
            $customer->image = $path;
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
        $customer->destroy($id);
        return response()->json(['customer' => 'delete successFully']);

        // delete image
        // if ($image) {
        //     Storage::delete('/public/' . $image);
        // }
        // $customer->delete();
        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa thành công');
        //xoa xong quay ve trang danh sach customer
        // return redirect()->route('customer.index');
    }
}
