<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Models\link;
use App\Http\Models\file;
use App\Http\Models\withdraw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
     
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {   $user = new User();
        $users =  $user->users()->paginate(10);
        return view('admin.users.index')->withUsers($users);        
    }

    public function create()
    {
    
    }


    public function store(Request $request)
    {   $user = new User();
        $users =  $user->fill($request->all());
        return redirect()->route('users.index')->with(['success'=>$request->slug .' Sucessfully Created :)']);
    }

    
    public function show(User $user)
    {
        $user_id =$user->id;
        $links = link::where('user_id',$user_id)->get();
        $withdraws = withdraw::where('user_id',$user_id)->get();
        $files = file::where('user_id',$user_id)->get();
        return view('admin.users.show',compact('user','links','files','withdraws'));
    }

  
    public function edit(User $user)
    {
        $user = User::findOrfail($user);
        return view('admin.users.Form',compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user = User::find($user);
        $user->update($request->all());
        return redirect()->route('users.index')->with(['success'=>$request->slug .' Sucessfully Edited :)']);
    }

    
    public function destroy(User $user)
    {
        $user = User::find($user);
        $user->delete($user);
        $user->save();
        return redirect()->route('users.index')->with(['success'=>$request->slug .' Sucessfully Deleted :)']);
    }
}
