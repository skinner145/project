<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{

  protected $fillable = ['club_id'];


    public function teams(){
      return $this->hasMany('App\Team');
    }
}
