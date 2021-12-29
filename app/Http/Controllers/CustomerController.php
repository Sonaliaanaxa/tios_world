<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


use App\User;




class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "All Seller";
        $subtitle = "customer";
        $activePage = "Seller";
        $role = 'seller';
        $dCount = User::where('user_type', $role)->count();
        $customer = User::where('user_type', $role)
            ->orderBy('id', 'DESC')
            ->sortable()->paginate(10);

        return view('admin.customer.list', compact('title', 'customer', 'activePage', 'subtitle', 'dCount'));
    }


    public function create()
    {
        $title = "Create New Seller";
        $subtitle = "Customer";
        $activePage = "Seller";
        return view('admin.customer.add', compact('title', 'activePage', 'subtitle'));
    }

    public function save(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
        ]);
        /*----image-------*/
        $logo_name = '';

        if ($request->hasFile('myLogo')) {
            $file = $request->file('myLogo');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg') {
                $logo_name = 'logo_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/profile_img');
                $file->move($destinationPath, $logo_name);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }
        $image_name1 = '';

        if ($request->hasFile('myImage1')) {
            $file = $request->file('myImage1');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg') {

                $image_name1 = 'image1_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/profile_img');
                $file->move($destinationPath, $image_name1);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }
        /*-------image------*/

        /*----image2-------*/
        $image_name2 = '';

        if ($request->hasFile('myImage2')) {
            $file = $request->file('myImage2');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg') {

                $image_name2 = 'image2_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/profile_img');
                $file->move($destinationPath, $image_name2);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }
        /*-------image------*/

        /*----image3-------*/
        $image_name3 = '';

        if ($request->hasFile('myImage3')) {
            $file = $request->file('myImage3');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg') {

                $image_name3 = 'image3_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/profile_img');
                $file->move($destinationPath, $image_name3);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }
        /*-------image------*/
        $user = new User;
        $user->name = $request->name;
        $user->slug =  Str::slug($request->name);
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->user_type = $request->user_type;
        $user->business_title = $request->business_title;
        $user->tag_line = $request->tag_line;
        $user->about_business = $request->about_business;
        $user->logo = $logo_name;
        $user->image1 = $image_name1;
        $user->image2 = $image_name2;
        $user->image3 = $image_name3;
        $user->about_founder = $request->about_founder;
        $user->save();

        return redirect(route('customer.list'))->with('success', '  Data Successfully Added!');
    }



    public function edit(Request $request, $id)
    {
        $title = "Update Seller";
        $subtitle = "allEmployee";
        $activePage = "Seller";
        $email = auth()->user()->email;

        $customer = User::where('id', $id)->first();
        return view('admin.customer.edit', compact('title', 'customer', 'subtitle', 'activePage'));
    }


    public function update(Request $request, $id)
    {

        $title = "Update Seller";
        $subtitle = "allEmployee";
        $activePage = "Seller";

        $this->validate(request(), [
            'name' => 'required|min:3',
            'email' => 'required|email',
        ]);

        $id = $request->id;
        $data4['logo'] = '';

        if ($request->hasFile('myLogo')) {
            $file = $request->file('myLogo');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif') {
                $data4['logo'] = 'logo_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/profile_img');
                $file->move($destinationPath, $data4['logo']);
                User::where('id', $id)->update($data4);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }


        $id = $request->id;
        $data1['image1'] = '';

        if ($request->hasFile('myImage1')) {
            $file = $request->file('myImage1');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'gif') {
                $data1['image1'] = 'image1_' . time() . '.' . $extension;
                $destinationPath = public_path('/uploads/profile_img');
                $file->move($destinationPath, $data1['image1']);
                User::where('id', $id)->update($data1);
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
                User::where('id', $id)->update($data2);
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
                User::where('id', $id)->update($data3);
            } else {
                return redirect()->back()->with('error', 'Invalid file attached! Please updload the image!');
            }
        }


        $user = User::where('id', $id)->first();

        $data = [
            'name' => $request->name,
            'slug' => Str::slug($user->name),
            'email' => $request->email,
            'user_type' => $request->user_type,
            'updated_at' => date('Y-m-d H:i:s'),
            // 'password' => Hash::make($request->password),
            'business_title' => $request->business_title,
            'tag_line' => $request->tag_line,
            'about_business' => $request->about_business,
            'about_founder' => $request->about_founder,
        ];


        $result = User::where('id', $id)->update($data);
        return redirect(route('customer.list'))->with('success', 'Customer Details Successfully Updated!');
    }


    public function destroy(Request $request)
    {
        $id = $request->id;

        $delete = User::where('id', $id)->delete();
        if ($delete) {

            return ['success' => 1, 'Seller Successfully Deleted!'];
        } else {
            return ['success' => 0, 'Error Occured!'];
        }
    }
}
