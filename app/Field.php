<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model {
    public $timestamps = false;

	public function entity() {
        return $this->belongsTo('App\Entity');
    }

    public function fieldvalues() {
        return $this->hasMany('App\Fieldvalue');
    }

	public function fieldvaluesByPageId($page_id) {
        return $this->hasMany('App\Fieldvalue')->where('page_id', '=' , $page_id)->first();
    }
}
