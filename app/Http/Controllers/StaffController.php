<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Staff::all();
        return view('index', ['staffs' => $staffs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');

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
        //validation
      $this->validate($request, [
        'staff_name' => 'required',
        'staff_email' => 'required|unique:staff',
        'staff_phonenumber' => 'required|numeric',
        'staff_address' => 'required',

     ]);

     $staff = Staff::create([
      'staff_name' => $request->input('staff_name'),
      'staff_email' => $request->input('staff_email'),
      'staff_phonenumber' => $request->input('staff_phonenumber'),
      'staff_address' => $request->input('staff_address'),
   ]);
   if($staff){
       return redirect()->route('staff.index')->with('success', 'Staff Record Saved Successfully!');
   }
       return back()->withInput();
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
        $staff = Staff::find($id);
        return view('show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        //
        $staff = Staff::find($staff->id);
      return view('edit', ['staff'=>$staff]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        //
        $staff = Staff::find($staff->id);
        $staff->staff_name = $request->staff_name;
        $staff->staff_email = $request->staff_email;
        $staff->staff_phonenumber = $request->staff_phonenumber;
        $staff->staff_address = $request->staff_address;

        if($staff->save()){
            return redirect()->route('index')->with('success', $staff->staff_name. ' Record Updated Successfully!');
        }
            return back()->withInput();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        //
        $s=Staff::find($staff->id);
        if($s->delete()){
            return redirect()->route('index')->with('success', $staff->staff_name. ' record has been deleted');
        }
    }

    public function delete(Request $request){
        $delid = $request->input('delid');
        Staff::whereIn('id', $delid)->delete();
        return redirect()->route('index')->with('success', 'staff record has been deleted');
    }
}
