<?php
namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Type;
use App\Models\User;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class ItemController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Item::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addItem(Request $request)
    {

        $request ->validate([
            'rfid'=>'required|min:8',
            'type'=> 'required',
            'unit'=>'required',
            'inspector'=>'required',
            'inspectorComments'=> 'required',
            'conditionDescription'=>'required',
            'storage' =>'required'
        ]);

        $query = DB::table('item')->insert([
            'rfid'=>$request->input('rfid'),
            'type'=>$request->input('type'),
            'unit'=>$request->input('unit'),
            'inspector'=>$request->input('inspector'),
            'inspectorComments'=>$request->input('inspectorComments'),
            'conditionDescription'=>$request->input('conditionDescription'),
            'storage'=>$request->input('storage')
        ]);
        if($query){
            return back()->with('success', 'Item Saved');
        }else{
            return back()->with('fail', 'something went wrong');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Item::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Item::find($id);
        $item->update($request->all());
        return $item;
    }

    /**
     * Remove the specified resource from storage.
     */
    public static function destroy(Request $request)
    {
        $id = $request-> id;

        return Item::destroy($id);
    }
    public function listTypes(){
        $types = Type::all();
        return view('add_item',['data'=>$types]);
    }


}
