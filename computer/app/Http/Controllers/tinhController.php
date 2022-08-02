<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tinhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $so1= $request->so1;
        $so2= $request->so2;
        $tinh= $request->tinh;
        switch ($tinh){
            case '+':
                $tinh = $so1 + $so2;
                break;
            case '-':
                $tinh = $so1 - $so2;
                break;
            case '*':
                $tinh = $so1 * $so2;
                break;
            case '/':
                if ($so2 !=0){
                    $tinh = $so1 / $so2;
                }else{
                    echo "Phép tính lỗi!";
                }
                break;
            default:  
        }
        return view('/ketqua',compact(['so1','so2','tinh'])); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
