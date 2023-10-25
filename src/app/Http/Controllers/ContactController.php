<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
  public function index()
  {
    return view('index');
  }
  public function confirm(ContactRequest $request){
    $contact = $request->only(['lastname', 'firstname', 'name', 'gender', 'email', 'addrcode', 'addr', 'builname', 'content']);
    return view('confirm', compact('contact'));
  }

  public function store(ContactRequest $request){
    $contact = $request->only(['lastname', 'firstname','name', 'gender', 'email', 'addrcode', 'addr', 'builname', 'content']);
    if($request->input('back') == 'back'){
      return redirect('/')->withInput();
    }
    else{
      Contact::create($contact);
      return view('thanks');
    }
  }

  public function search()
  {
    $contacts = Contact::paginate(10);
    return view('search', compact('contacts'));
  }

  public function filter(Request $request)
  {
    $contacts = Contact::nameSearch($request->name)->genderSearch($request->gender)->emailSearch($request->email)->dateSearch($request->from,$request->to)->paginate(10);
    return view('search', compact('contacts'));
  }

  public function destroy(Request $request)
  {
    Contact::find($request->id)->delete();
    return redirect('search')->with('message', 'ID:'.$request->id.'のご意見を削除しました');
  }
}
