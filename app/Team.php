<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function club(){
      return $this->belongsTo('App\Club');
    }
    protected $fillable = ['club_id'];

}
