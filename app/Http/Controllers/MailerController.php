<?php

namespace App\Http\Controllers;

use App\Models\Mailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;


class MailerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mailers = Mailer::get();
        return view('mailer.index', compact('mailers'));
//        Config::set('mail.mailers.smtp.transport', 'stp');
//        dd(config('mail.mailers.smtp.transport'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mailer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(['mail_driver' => 'required',
            'mail_host' => 'required',
            'mail_port' => 'required',
            'mail_username' => 'required',
            'mail_password' => 'required',
            'mail_encryption' => 'required',
            'mail_from_address' => 'required',
            'status' => 'required'
        ]);
        $mailer = Mailer::create($request->all());
        if($mailer) {
            return redirect()->route('set_mailer.index')->with('success', 'Successfully Added');
        }else{
            return redirect()->route('set_mailer.index')->with('error', 'Something Worng');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mailer  $mailer
     * @return \Illuminate\Http\Response
     */

    public function active(Mailer $mailer){
        dd($mailer);
    }

    public function show(Mailer $mailer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mailer  $mailer
     * @return \Illuminate\Http\Response
     */
    public function edit(Mailer $mailer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mailer  $mailer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mailer $mailer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mailer  $mailer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mailer $mailer)
    {
        //
    }
}
