<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referee extends Model
{
    public function fixtures(){
      return $this->belongsToMany('App/Fixture');
    }
    public function users(){
      return $this->belongsTo('App/User');
    }
}
