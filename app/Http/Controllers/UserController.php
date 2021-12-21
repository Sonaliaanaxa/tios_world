<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User; 
use App\Order;

class UserController extends Controller
{
 public function editAddress(Request $request){
    $this->validate(request(), [
        'apartment' => 'nullable',
        'area'=>'nullable',
        'landmark' => 'nullable',
        'city' => 'nullable',
        'state' => 'required'
        
    ]);
    
    $data=[
        'apartment' => $request->apartment,
        'area' => $request->area,
        'landmark' => $request->landmark,
        'city' => $request->city,
        'state' => $request->state,
        'updated_at'=>date('Y-m-d H:i:s')
    ];
    Order::where('user_id',Auth::user()->id)->update($data);
    return redirect()->back()->with('success', 'User Information Successfully Updated!');
 }
  public function editAccountDetails(Request $request)
  {
    $phone=Auth::user()->phone;

    $this->validate(request(), [
      'name' => 'nullable',
      'email'=>'nullable',
      
  ]);

  $data=[
      'name' => $request->name,
      'email' => $request->email,
      'updated_at'=>date('Y-m-d H:i:s')
  ];

  User::where('phone',$phone)->update($data);
  return redirect()->back()->with('success', 'User Information Successfully Updated!');
  }     
}
