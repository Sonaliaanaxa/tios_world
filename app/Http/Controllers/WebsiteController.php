<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebsiteController extends Controller
{
    public function index(){
        $title = "Thehygieneherbs - Organic Food & Grocery Market Template";
        return view('front.index', compact('title'));
    }

    public function contact() {
        $title = "Thehygieneherbs - Contact";
        return view('front.contact', compact('title'));
    }

    public function about (){
        $title = "Thehygieneherbs - About";
        return view('front.about', compact('title'));
    }

    public function terms(){
        $title = "Thehygieneherbs - Terms";
        return view('front.terms', compact('title'));
    }
    public function cart(){
        $title = "Thehygieneherbs - Cart";
        return view('front.cart', compact('title'));
    }

    public function checkout(){
        $title = "Thehygieneherbs - Checkout";
        return view('front.checkout', compact('title'));
    }

    public function shopDetails(){
        $title = "Thehygieneherbs - Shop Details";
        return view('front.shop-details', compact('title'));
    }
}
