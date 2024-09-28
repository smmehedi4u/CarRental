<?php

namespace App\Http\Controllers;


use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

             $cars = Car::limit(6)->get();

            $usertype=Auth::user()?->usertype;



             if($usertype=='admin')
            {
                return redirect()->route('dashboard');
            }else
            {
                return view('frontend.index', compact('cars'));
            }

    }

    public function home()
    {
        $cars = Car::limit(6)->get();
        return view('frontend.index', compact('cars'));
    }
}
