<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fieldvalue extends Model {
   public $timestamps = false;
   protected $fillable = ['value', 'page_id', 'field_id'];

	public function field() {
        return $this->belongsTo('App\Field');
    }

    public function page() {
        return $this->belongsTo('App\Page');
    }

}
