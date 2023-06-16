<?php

namespace App\Http\Controllers;

use App\Models\Rank;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;


class RankController extends BaseController
{
    public function index()
    {
        return Rank::all();
    }

    public function addRank(Request $request)
    {
         $request ->validate([
            'title'=>'required|unique:rank'
        ]);


        $rank = new Rank();
        $rank->title = $request->title;


        $res = $rank->save();
        if($res){
            return back()->with('success', 'Rank Saved');
        }else{
            return back()->with('fail', 'Something went wrong');
        }
    }
    public static function destroy(Request $request)
    {
        $id = $request-> id;

        return Rank::destroy($id);
    }

}
