<?php

namespace App\Http\Controllers;

use App\Models\Storage;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;


class StorageController extends BaseController
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Storage::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addStorage(Request $request)
    {

        $request ->validate([
            'locationName'=>'required',
            'locationAddress'=> 'required',
            'locationDescription'=>'required',

        ]);

        $storage = new Storage();
        $storage->locationName = $request->locationName;
        $storage->locationAddress = $request->locationAddress;
        $storage->locationDescription= $request->locationDescription;

        $res = $storage->save();
        if($res){
            return back()->with('success', 'Storage location registered Successfully');
        }else{
            return back()->with('fail', 'something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Storage::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = User::find($id);
        $customer->update($request->all());
        return $customer;
    }

    /**
     * Remove the specified resource from storage.
     */
    public static function destroy(Request $request)
    {
        $id = $request-> id;

        return Storage::destroy($id);
    }


}
