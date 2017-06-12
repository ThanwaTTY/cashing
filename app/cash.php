<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cash extends Model
{
  protected $fillable = ['user_id','method','fromBank','fromAccountNumber','fromAccountName','amount','transferDate','transferTime','toBank','toAccountNumber','toAccountName','transferStatus'];

  public function user()
  {
    //return $this->belongsTo(cash::class, 'user_id');
     return $this->belongsTo('App\User', 'user_id');
  }
}
