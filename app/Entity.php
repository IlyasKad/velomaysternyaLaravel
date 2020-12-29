<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model {
	public $timestamps = false;
    
    public function pages() {
        return $this->hasMany('App\Page');
    }

    public function fields() {
        return $this->hasMany('App\Field');
    }

}
