<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Domain;
use App\User;
class file extends Model
{
  protected $fillable = ['user_id','status','url','title','description','hits','isDeleted  ','domain_id', ];

    // list All files
      public function files()
      {
       return $this->where('isDeleted','0')->orderBy('created_at','desc');
      }
    // list of  files has been deleted and list (Desc) by create date
      public function deletedfiles()
      {
       return $this->where('isDeleted','1')->orderBy('updated_at','desc');
      }
      // list all files for a user
      public function userfiles(User $user)
      {
      }
     public function Domain()
     {
       return $this->belongsTo(Domain::class); 
     }
      public function User()
     {
       return $this->belongsTo(User::class); 
     }
}
