<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class StudentController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = Student::all();
        // dd($items);

        $items = DB::table('students')->get();
        dd($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $student = new Student();
        // $student->name = 'Nguyeenx Van A';
        // $student->save();
        // try {
        //     $student->save();
        //     //chuyen huong + thong bao thanh cong
        // } catch (\Exection $e) {
        //     //chuyen huong + thong bao khong thanh cong

        // }

        DB::table('students')->insert([
            'name' => 'Nguyen Van C'
        ]);

        


        
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
        // $item = Student::find($id);
        // dd($item);

        $item = DB::table('students')->where('id','=',$id)->first();
        dd($item);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $student = Student::find($id);
        // $student->name = 'Nguyeenx Van B';
        // $student->save();
        $data = [
            'name' => 'NGuyen Van D'
        ];
        DB::table('students')->where('id','=',$id)->update($data);


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
        // $student = StudentController::find($id);
        // $student->delete();
    }
}
