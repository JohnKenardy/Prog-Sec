<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function registerUser(Request $request): RedirectResponse
    {

    $request ->validate([
        'name'=>'required',
        'email'=> 'required|email|unique:users',
        'password'=>'required|min:8|max:32',
        'rank' =>'required',
        'unit'=>'required',
        'role'=>'required',
        'accessLevel'=>'required'
    ]);

    $user = new User();
    $user->name = $request->name;
    $user->rank = $request->rank;
    $user->unit = $request->unit;
    $user->role = $request->role;
    $user->accessLevel = $request->accessLevel;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);

    $res = $user->save();
    if($res){
        return back()->with('success', 'you have registered Successfully');
    }else{
        return back()->with('fail', 'something went wrong');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::find($id);
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
    public static function destroy(Resquest $request)
     {
         $id = $request-> id;

        return User::destroy($id);
    }

    public function loginUser(Request $request){
        $request ->validate([
            'email'=> 'required|email',
            'password'=>'required|min:8|max:32',
        ]);

        $user = User::where('email','=',$request->email)->first();
        if($user){
            //Hash::check
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId',$user->userId);
                return redirect('dashboard');
            }else{
                return back()->with('fail', 'Incorrect password');
            }

        }else{
            return back()->with('fail', 'This user email is not registered');
        }




    }

}
