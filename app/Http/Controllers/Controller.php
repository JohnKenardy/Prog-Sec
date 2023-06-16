<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Rank;
use App\Models\Storage;
use App\Models\Type;
use App\Models\Unit;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function addItem(): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $types = Type::all();
        $units = Unit::all();
        $locations = Storage::all();

        $data = array();
        if(Session::has('loginId')){
            $data = User::where('userId','=',Session::get('loginId'))->first();
        }
        return view('add_Item',compact('data','types','units','locations'));
    }
    public function manageUsers(){
        $data = array();
        $users = User::all();
        $units = Unit::all();
        $ranks = Rank::all();
        if(Session::has('loginId')){
            $data = User::where('userId','=',Session::get('loginId'))->first();
        }
        return view ('manage_users',compact('data','users','units','ranks'));
    }
    public function manageItems(){
        $data = array();
        $items = Item::all();
        $types = Type::all();
        $units = Unit::all();
        $locations = Storage::all();
        if(Session::has('loginId')){
            $data = User::where('userId','=',Session::get('loginId'))->first();
        }
        return view ('manage_items',compact('data','items','types','units','locations'));
    }
    public function manageCategories(){
        $categories = Category::all();
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('userId','=',Session::get('loginId'))->first();
        }
        return view ('manage_categories',compact('data','categories'));
    }
    public function manageUnits(){
        $units = Unit::all();
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('userId','=',Session::get('loginId'))->first();
        }
        return view ('manage_units',compact('data','units'));
    }
    public function manageStorage(){
        $storages = Storage::all();
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('userId','=',Session::get('loginId'))->first();
        }
        return view ('manage_storage',compact('data','storages'));
    }
    public function manageTypes(){
        $types = Type::all();
        $data = array();
        $categories = Category::all();
        if(Session::has('loginId')){
            $data = User::where('userId','=',Session::get('loginId'))->first();
        }
        return view ('manage_types',compact('data','types','categories'));

    }
    public function dashboard(): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('userId','=',Session::get('loginId'))->first();
        }
        return view('dashboard',compact('data'));
    }
    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
        }
        return redirect('login');
    }

    public function login(): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('login');
    }
    public function manageRanks(): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $ranks = Rank::all();
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('userId','=',Session::get('loginId'))->first();
        }
        return view('manage_ranks',compact('data','ranks'));
    }
}
