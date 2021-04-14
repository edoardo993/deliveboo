<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ['pic_url', 'opening_hours', 'description'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function plates(){
        return $this->hasMany('App\Plate');
    }

    public function categories(){
        return $this->belongsToMany('App\Category');
    }
}
