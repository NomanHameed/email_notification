<?php

namespace App\Http\Controllers;

use App\Imports\ContactsImport;
use App\Jobs\SendEmailJob;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('contact.contacts', compact('contacts',$contacts));
    }

    public function getImport()
    {
        return view('contact.import');
    }

    public function processImport(Request $request)
    {
        $validated = $request->validate([
            'file' => 'required|mimes:csv',
        ]);
        Excel::import(new ContactsImport(), $request->file('file'));
        return redirect()->route('contacts')->with('success', 'Contacts Imported Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->back()->with('success','Delete Successflly');
    }

    public function listView()
    {
        $contacts = Contact::all();
        return view('contact.send_mail', compact('contacts'));
    }

    public function send(Request $request){
        $validated = $request->validate([
            'template' => 'required',
            'check' => 'required',
        ]);
        $check = $request->all();
        if(count($check['check'])> 0){
            SendEmailJob::dispatch($check);
        }
        return redirect()->back()->with(['success'=>'Mail Send Successfully!!']);
    }
}
