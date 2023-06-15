<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;


class UnitController extends Controller
{
    public function index()
    {
        return Unit::all();
    }

    public function addUnit(Request $request)
    {
        $request ->validate([
            'name'=>'required',
            'location'=>'required'
        ]);

        $unit = new Unit();
        $unit->name= $request->name;
        $unit->location = $request->location;


        $res = $unit->save();
        if($res){
            return back()->with('success', 'Category Successfully');
        }else{
            return back()->with('fail', 'Something went wrong');
        }
    }
    public static function destroy(Request $request)
    {
        $id = $request-> id;

        return Unit::destroy($id);
    }

}
