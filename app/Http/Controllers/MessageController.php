<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Carbon\Carbon;

class MessageController extends Controller
{
  function customermessageinsert(Request $request){
    $request->validate([
      'first_name' => 'required ',
      'last_name' => 'required',
      'subject' => 'required',
      'message' => 'required',
    ]);
    Message::insert([
      'first_name' => $request->first_name,
      'last_name' => $request->last_name,
      'subject' => $request->subject,
      'message' => $request->message,
      'created_at' => Carbon::now(),
    ]);
    return back()->with('status', 'Message Sent Successfully!');
  }
  function customermessage(){
    $all_message = Message::all();
    return view('message/view', compact('all_message'));
  }
  function messageread(Request $request){
    Message::findOrFail($request->message_id)->update([
      'status' => 2
    ]);
    return back();
  }
  function messageview($message_id){
    $messagedetails = Message::findOrFail($message_id);
    return view('message/details', compact('messagedetails'));
  }
  function messagedelete($message_id){
    $messagedetails = Message::findOrFail($message_id)->delete();
    return back()->with('delete_status', 'Message Deleted Successfully!');
  }
}
