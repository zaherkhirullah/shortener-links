<?php

namespace App\Http\Controllers\Users;

use App\Http\Models\folder;
use Illuminate\Http\Request;
use App\Http\Requests\FolderValidation;
use App\Http\Controllers\Controller;
use Auth;

class FolderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(folder $folder)
    {
        $folders = $folder->folder()->paginate(20);
        return view('admin.folders.index')->withfolder($folders);
    }
  
    public function create()
    {
        return view('admin.folders.Form');
    }

  
    public function store(FolderValidation $request)
    {
        $this->NewItem($request->all());

        return redirect()->route('folder.index')
        ->with(['success'=>$request->name .' Sucessfully Created :)']);
    }


   
// show folder details
public function show(folder $folder)
{
    return view('users.folders.show');
}
// edit folder details
public function edit(folder $folder)
{
    return view('users.folders.Form');
}
// update function
public function update(Request $request, folder $folder)
{    
    return redirect()->route('folders.index')->with( ['success'=>' Sucessfully Edited :)']);
}
// for hide folder    
public function destroy(folder $folder)
{
    return redirect()->route('folders.index')->with( ['success'=>' Sucessfully hided :)']);
}
// for delete folder
public function delete(folder $folder)
{
    return redirect()->route('folders.index')->with( ['success'=>' Sucessfully deleted :)']);
}

// NewItemew for create new item in table(for calling in store).
protected function NewItem(array $data)
{ 
   $Folders = folder::create(
    [
        'name'  => $data['name'],
        'user_id'  => Auth::id(),
    ]);
     
 return $Folders ;
}

}