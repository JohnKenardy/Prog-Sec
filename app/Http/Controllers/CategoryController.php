<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function addCategory(Request $request)
    {
        $request ->validate([
            'name'=>'required',
            'description'=>'required'
        ]);

        $category = new Category();
        $category->name= $request->name;
        $category->description = $request->description;


        $res = $category->save();
        if($res){
            return back()->with('success', 'Category Successfully');
        }else{
            return back()->with('fail', 'Something went wrong');
        }
    }
    public static function destroy(Request $request)
    {
        $id = $request-> id;

        return Category::destroy($id);
    }


}
