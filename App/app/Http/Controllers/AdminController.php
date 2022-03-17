<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $admins = Admin::all();
        return response()->json($admins);
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
        {
            $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|unique:posts',
                'password'=>'required|unique:posts|max:255',
            ]);

            $newAdmin = new admin([
                'name' => $request->get('name'),
                'Email' => $request->get('email'),

                'password'=>$request->get('password')
            ]);

            $newAdmin->save();

            return response()->json($newAdmin);
        }}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = admin::findOrFail($id);
        return response()->json($admin);
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
        $admin = admin::findOrFail($id);
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:posts',

            'password'=>'required|unique:posts|max:255',
        ]);
        $admin->name = $request->get('name');
        $admin->email = $request->get('email');

        $admin->password = $request->get('password');

        $admin->save();
        return response()->json($admin);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = admin::findOrFail($id);
        $admin->delete();

        return response()->json($admin::all());
    }


    public function sendOtp(){
        $otp = rand(000000,999999);

        $data = "Your Otp ".$otp;
        Mail::send('Otp For registation', (array)$data, function ($message) {
            $message->from('divya.pitti@mpokket.com', 'Divya');

            $message->to('shubham.kamble@mpokket.com');
        });

        return "Otp Send Successfully";

    }
}
