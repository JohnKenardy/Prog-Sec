<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;


class TypeController extends Controller
{
    public function index()
    {

        return Type::all();
    }

    public function addType(Request $request)
    {
        $request ->validate([
            'category'=>'required',
            'description'=>'required'
        ]);

        $type = new Type();
        $type-> category= $request->category;
        $type-> description = $request->description;


        $res = $type->save();
        if($res){
            return back()->with('success', 'Category Successfully');
        }else{
            return back()->with('fail', 'Something went wrong');
        }
    }
    public static function destroy(Request $request)
    {
        $id = $request-> id;

        return Type::destroy($id);
    }

}
