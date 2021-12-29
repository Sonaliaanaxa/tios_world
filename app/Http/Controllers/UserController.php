<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Order;

class UserController extends Controller
{
  public function editAddress(Request $request)
  {
    $this->validate(request(), [
      'apartment' => 'nullable',
      'area' => 'nullable',
      'landmark' => 'nullable',
      'city' => 'nullable',
      'state' => 'required'

    ]);

    $data = [
      'apartment' => $request->apartment,
      'area' => $request->area,
      'landmark' => $request->landmark,
      'city' => $request->city,
      'state' => $request->state,
      'updated_at' => date('Y-m-d H:i:s')
    ];
    Order::where('user_id', Auth::user()->id)->update($data);
    return redirect()->back()->with('success', 'User Information Successfully Updated!');
  }
  public function editAccountDetails(Request $request)
  {
    $phone = Auth::user()->phone;

    $this->validate(request(), [
      'name' => 'nullable',
      'email' => 'nullable',

    ]);

    $data = [
      'name' => $request->name,
      'email' => $request->email,
      'updated_at' => date('Y-m-d H:i:s')
    ];

    User::where('phone', $phone)->update($data);
    return redirect()->back()->with('success', 'User Information Successfully Updated!');
  }

  function myProfile()
  {
    $title = "My Profile";
    $subtitle = "Profile";
    $activePage = "Profile";
    $email = auth()->user()->email;
    $user_type = auth()->user()->user_type;

    $user = User::where('user_type', $user_type)->where('email', $email)->first();
    return view('admin.profile.edit', compact('title', 'user', 'subtitle', 'activePage'));
  }

  public function saveBasicMyProfile(Request $request)
  {

    $email = auth()->user()->email;
    $user_type = auth()->user()->user_type;

    $this->validate(request(), [
      'name' => 'required|min:3',
      'phone' => 'required',
      'business_title' => 'required',
      'tag_line' => 'required',
      'about_business' => 'required',

    ]);

    $data = [
      'name' => $request->name,
      'phone' => $request->phone,
      'business_title' => $request->business_title,
      'tag_line' => $request->tag_line,
      'about_business' => $request->about_business,
      'email' => $request->email,
      'updated_at' => date('Y-m-d H:i:s')

    ];
    User::where('email', $email)->update($data);

    return redirect()->back()->with('success', 'Basic Information Successfully Updated!');
  }
}
