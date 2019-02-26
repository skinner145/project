<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function fixture(){
      return $this->belongsTo(Fixture::class);
    }

    protected $fillable =[
      'fixture_id', 'homeTeamScore', 'awayTeamScore', 'report'
    ];
}
