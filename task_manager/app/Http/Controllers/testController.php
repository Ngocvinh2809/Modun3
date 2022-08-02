<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Contracts\View\View;

use function Ramsey\Uuid\v1;

class testController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //lay tat ca du lieu
    public function index()
    {
        $customers = customer::all();
        return View('layout.admin.customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //trang tao moi
    public function create()
    {
        return View('layout.admin.customer.client');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //luu du lieu moi
    public function store(Request $request)
    {
        $customers = new Customer();
        $customers ->name = $request->name;
        $customers ->phone = $request->phone;
        $customers ->email = $request->email;
        $customers->save();
        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //trang xem chi tiet
    public function show($id)
    {
        // return View('admin.customer.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //trang chinh sua
    public function edit($id)

    { 
        $customers = Customer::find($id);
        return View('layout.admin.customer.edit',compact('customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      //cap nhat du lieu
      
    public function update(Request $request ,$id)
    {
        $customers = Customer::find($id);
        $customers ->name = $request->name;
        $customers ->phone = $request->phone;
        $customers ->email = $request->email;
        $customers->save();
        return redirect()->route('customer.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    //xoa
    public function destroy($id)
    {
        // dd($id);
        $customers = Customer::findOrFail($id);
        $customers->delete();
        return redirect()->route('customer.index');

    }
}
