<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.index');
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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'image' => 'image|file|max:2048'
        ]);
  
        $data = $request->all();
  
        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('foto');
        }else{
            unset($data['image']);
        }
    
        $pass = User::find($id)->password;

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = $pass;
        }

        User::find($id)->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function deleteImage(Request $request, $id)
    {
        $image = User::find($request->id);
        unlink('foto/'.$image->image);
        User::where('id', $image->id)->delete();
        return back();
    }
    public function destroy($id)
    {
        //
    }
}
