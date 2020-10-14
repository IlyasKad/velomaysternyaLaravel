<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Container extends Model {
    public function pages() {
        return $this->hasMany('App\Page');
    }
}
