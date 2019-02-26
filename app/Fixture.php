<?php

namespace App;

use App\Mail\FixtureCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;


class Fixture extends Model
{
    protected $guarded = [];

    public function reports(){
      return $this->hasMany(Report::class);
    }

    public function user(){
      return $this->belongsTo(User::class);
    }
}
