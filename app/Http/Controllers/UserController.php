<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Order;
use Illuminate\Support\Str;

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

   
        $data4['logo'] = '';

        if ($request->hasFile('myLogo')) {
            $file = $request->file('myLogo');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif') {
                $data4['logo'] = 'logo_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/profile_img');
                $file->move($destinationPath, $data4['logo']);
                User::where('email', $email)->update($data4);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }


        $data1['image1'] = '';

        if ($request->hasFile('myImage1')) {
            $file = $request->file('myImage1');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif') {
                $data1['image1'] = 'image1_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/profile_img');
                $file->move($destinationPath, $data1['image1']);
                User::where('email', $email)->update($data1);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }

        $data2['image2'] = '';

        if ($request->hasFile('myImage2')) {
            $file = $request->file('myImage2');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif') {
                $data2['image2'] = 'image2_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/profile_img');
                $file->move($destinationPath, $data2['image2']);
                User::where('email', $email)->update($data2);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }

        $data3['image3'] = '';

        if ($request->hasFile('myImage3')) {
            $file = $request->file('myImage3');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif') {
                $data3['image3'] = 'image1_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/profile_img');
                $file->move($destinationPath, $data3['image3']);
                User::where('email', $email)->update($data3);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }

        $data = [
          'name' => $request->name,
          'slug' => Str::slug(Auth::user()->name),
          'email' => $request->email,
          'business_title' => $request->business_title,
          'tag_line' => $request->tag_line,
          'about_business' => $request->about_business,
          'about_founder' => $request->about_founder,
          'updated_at' => date('Y-m-d H:i:s'),
          'user_type' => 'seller'
      ];
    User::where('email', $email)->update($data);

    return redirect()->back()->with('success', 'Basic Information Successfully Updated!');
  }
}
