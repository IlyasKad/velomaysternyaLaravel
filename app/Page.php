<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

    public $content;
    public $language;

    public function setLanguage($language) {
        $this->language = $language;
    }

    public function render() {
        $this->content = $this->content_ua;  
        $this->caption = $this->caption_ua;
        if (strcmp($this->language,'en') == 0) {
            $this->content = $this->content_en;
            $this->caption = $this->caption_en;
        }
      
        return view('page', ['page' => $this]);
    }

    
    public function renderTile() {
        $this->intro = $this->intro_ua;  
        $this->caption = $this->caption_ua;
        if (strcmp($this->language,'en') == 0) {
            $this->intro = $this->intro_en;
            $this->caption = $this->caption_en;
        }
      
        return view('pageTile', ['page' => $this]);
    }
}
