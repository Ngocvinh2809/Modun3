<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $product_models = ProductModel::all();
        return view('product.index', compact('product_models'));
    }
    public function create()
    {
        return view('product.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'image' => 'required',
            'amount' => 'required|max:11',
            'price' => 'required',
        ],[
            'name.required' => 'Bạn chưa nhập Tên',
            'name.max' => 'Tên quá dài',
            'image.required' => 'Bạn chưa nhập ảnh',
            'amount.required' => 'Bạn chưa nhập số lượng',
            'amount.max' => 'Số lượng quá dài',
            'price.required' => 'Bạn chưa nhập giá',
        ]);

        $product_model = new ProductModel();
        $product_model->name = $request->input('name');
        
        //upload file
        // if ($request->hasFile('image')) {

        //     $image = $request->file('image');
        //     $storedPath = $image->move('images', $image->getClientOriginalName());
        //     $product_model->image           = 'images/' . $image->getClientOriginalName();
        // }
        $get_image = $request->image;
        $path = 'public/uploads/login/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $product_model->image = $new_image;
        $request['login_image'] = $new_image;

        $product_model->amount = $request->input('amount');
        $product_model->price = $request->input('price');
        $product_model->save();
        //dung session de dua ra thong bao
        Session::flash('success', 'Tạo mới thành công');
        //tao moi xong quay ve trang danh sach product_model
        return redirect()->route('product.index');
    }
    public function edit($id)
    {
        $product_models = ProductModel::findOrFail($id);
        return view('product.edit', compact('product_models'));
    }

    public function update(Request $request, $id)
    {
        $product_model = ProductModel::findOrFail($id);
        $product_model->name = $request->input('name');

        $get_image = $request->image;
        if ($get_image) {
            $path = 'public/uploads/login/' . $product_model->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $path = 'public/uploads/login/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $product_model->image = $new_image;
            $request['login_image'] = $new_image;
        }
        $product_model->amount = $request->input('amount');
        $product_model->price = $request->input('price');
        //cap nhat anh
        // if ($request->hasFile('image')) {

        //     //xoa anh cu neu co
        //     $currentImg = $product_model->image;
        //     if ($currentImg) {
        //         Storage::delete('/public/' . $currentImg);
        //     }
        //     // cap nhat anh moi
        //     $image = $request->file('image');
        //     $path = $image->store('image', 'public');
        //     $product_model->image = $path;
        // }

        $product_model->save();
        //dung session de dua ra thong bao
        Session::flash('success', 'Cập nhật thành công');
        //tao moi xong quay ve trang danh sach product_model
        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $product_model = ProductModel::findOrFail($id);
        $image = $product_model->image;

        // delete image
        if ($image) {
            Storage::delete('/public/' . $image);
        }
        $product_model->delete();
        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa thành công');
        //xoa xong quay ve trang danh sach product_model
        return redirect()->route('product.index');
    }
}
