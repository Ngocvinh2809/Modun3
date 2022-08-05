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
        ], [
            'name.required' => 'Bạn chưa nhập Tên',
            'name.max' => 'Tên quá dài',
            'image.required' => 'Bạn chưa nhập ảnh',
            'amount.required' => 'Bạn chưa nhập số lượng',
            'amount.max' => 'Số lượng quá dài',
            'price.required' => 'Bạn chưa nhập giá',
        ]);

        $product_model = new ProductModel();
        $product_model->name = $request->input('name');
        $product_model->amount = $request->input('amount');
        $product_model->price = $request->input('price');
        if ($request->hasFile('image')) {
            $file = $request->image;
            $fileExtension = $file->getClientOriginalExtension(); //jpg,png lấy ra định dạng file và trả về
            $fileName = time(); //45678908766 tạo tên file theo thời gian
            $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
            $path = 'storage/' . $request->file('image')->store('image', 'public'); //lưu file vào mục public/images với tê mới là $newFileName
            $product_model->image = $path;
        }

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
        $product_model->amount = $request->input('amount');
        $product_model->price = $request->input('price');
        //cap nhat anh

        // $get_image = $request->image;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $fileExtension = $file->getClientOriginalExtension(); //jpg,png lấy ra định dạng file và trả về
            $fileName = time(); //45678908766 tạo tên file theo thời gian
            $newFileName = $fileName . '.' . $fileExtension; //45678908766.jpg
            $path = 'storage/' . $request->file('image')->store('image', 'public'); //lưu file vào mục public/images với tê mới là $newFileName
            $product_model->image = $path;
        }

        $product_model->save();
        //dung session de dua ra thong bao
        Session::flash('success', 'Cập nhật thành công');
        //tao moi xong quay ve trang danh sach product_model
        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $product = ProductModel::findOrFail($id);
        $product->destroy($id);

        return response()->json(['product' => 'delete successFully']);

        // delete image
        // if ($image) {
        //     Storage::delete('/public/' . $image);
        // }
        // $product_model->delete();
        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa thành công');
        //xoa xong quay ve trang danh sach product_model
        // return redirect()->route('product.index');
    }
}
