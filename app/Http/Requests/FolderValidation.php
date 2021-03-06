<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
class FolderValidation extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
           'name' => 'required|string|min:3|max:50|unique:folders,name,NULL,id,user_id,' . Auth::id(),    
        ];
    }
}
