<?php

namespace App\Http\Controllers;

use App\Models\StaffModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = StaffModel::all();
        return view('staff.list', compact('staffs'));
    }

    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator  = $this->validate($request, [
            'name' => 'required|max:255',
            'phone' => 'required|max:11',
            'day_working' => 'required',
            'address' => 'required',
            'wage' => 'required',
        ], [
            'name.required' => 'Bạn chưa nhập tên',
            'name.max' => 'Tên quá dài',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'phone.max' => 'Số điện thoại quá dài',
            'day_working.required' => 'Bạn chưa nhập ngày làm việc',
            'address.required' => 'Bạn chưa nhập địa chỉ',
            'wage.required' => 'Bạn chưa nhập số lương',
        ]);

        // dd(123);

        $staff = new StaffModel();
        $staff->name = $request->name;
        $staff->phone = $request->phone;
        $staff->day_working = $request->day_working;
        $staff->address = $request->address;
        $staff->wage = $request->wage;
        // dd($request);
        $staff->save();
        //dung session de dua ra thong bao
        Session::flash('success', 'Tạo mới thành công');
        //tao moi xong quay ve trang danh sach staff
        return redirect()->route('staff.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staffs = StaffModel::findOrFail($id);
        return view('staff.edit', compact('staffs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $staff = StaffModel::findOrFail($id);
        $staff->name = $request->input('name');
        $staff->phone = $request->input('phone');
        $staff->day_working = $request->input('day_working');
        $staff->address = $request->input('address');
        $staff->wage = $request->input('wage');
        $staff->save();
        //dung session de dua ra thong bao
        Session::flash('success', 'Cập nhật thành công');
        //tao moi xong quay ve trang danh sach staff
        return redirect()->route('staff.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = StaffModel::findOrFail($id);

        // $image = $staff->image;
        // // delete image
        // if ($image) {
        //     Storage::delete('/public/' . $image);
        // }
        $staff->delete();
        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa thành công');
        //xoa xong quay ve trang danh sach staff
        return redirect()->route('staff.list');
    }
}
