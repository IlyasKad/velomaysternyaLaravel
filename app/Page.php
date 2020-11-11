<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {
    public $content;
    public $language;
    public $forAdmin;
    public $orderType; // current kind of sort
    public $orderTypes; // all kind of sort
   

    public function setLanguage($language) {
        $this->language = $language;
    }

    public function render($forAdmin, $order = null) {
        $this->forAdmin = $forAdmin; 
        $this->orderTypes = [
            'price' => 'За ціною', 
            'created_at' => 'За датою створення',
            'updated_at' => 'За датою оновлення',
            'order_num' => 'За замовчуванням',
        ];
        if ($order == null) {
            $this->orderType = $this->order_type;
        } else {
            $this->orderType = $order;
        }
       
        if ($this->container->type == 'one product') {
            return $this->renderOneProduct();
        }

        if ($this->container->type == 'category') {
            return $this->renderCategory();
        }
    }

    private function renderCategory() {
        if ($this->forAdmin) {
            $pages = $this->children;
            $tiles = [];
            foreach ($pages as $page) { 
                array_push($tiles, $page->renderItemForList());
            }
            return view('adminCategoryPage', ['tiles' => $tiles, 'page' => $this]);
        } else {
            $pages = $this->children; 
            $tiles = [];
            foreach ($pages as $page) { 
                if ($page->code != "root") { 
                    array_push($tiles, $page->renderTile());
                } 
            }
            if ($this->code == "root") { 
                return view('index', ['tiles' => $tiles, 'page' => $this]);
            } else {
                return view('categoryPage', ['tiles' => $tiles, 'page' => $this]);
            } 
        }
    }


    private function renderOneProduct() {
        $this->content = $this->content_ua;  
        $this->caption = $this->caption_ua;
        if (strcmp($this->language,'en') == 0) {
            $this->content = $this->content_en;
            $this->caption = $this->caption_en;
        }

        if ($this->forAdmin) {
            return view('adminOneProductPage', ['page' => $this]);
        } else {
            return view('oneProductPage', ['page' => $this]);
        }
    }

    public function container() {
        return $this->belongsTo('App\Container'); 
    }

    public function parent() {
        return $this->belongsTo('App\Page', 'parent_id'); 
    }

    public function children() {
        return $this->hasMany('App\Page', 'parent_id')->orderBy($this->orderType, 'asc'); 
    }

    public static function getCategories() {
        return Page::where('container_id', '!=' , 3)->get();
    }


    private function renderTile() {
        $this->intro = $this->intro_ua;  
        $this->caption = $this->caption_ua;
        if (strcmp($this->language,'en') == 0) {
            $this->intro = $this->intro_en;
            $this->caption = $this->caption_en;
        }

        if ($this->alias_of != 0) { 
            $originalPage = Page::find($this->alias_of); 
            $this->code = $originalPage->code;
            if($this->intro == null) { 
                $this->intro = $originalPage->intro_ua;
            }

            if($this->caption == null) {
                $this->caption = $originalPage->caption_ua;
            }

            if($this->image_intro == null) {
                $this->image_intro = $originalPage->image_intro;
            }

            if($this->price == 0) {
                $this->price = $originalPage->price;
            }
           
        }
        return view('pageTile', ['page' => $this]);
    }

    private function renderItemForList() {
        $this->intro = $this->intro_ua;  
        $this->caption = $this->caption_ua;
        if (strcmp($this->language,'en') == 0) {
            $this->intro = $this->intro_en;
            $this->caption = $this->caption_en;
        }
      
        return view('adminItemForList', ['page' => $this]);
    }

}

// bike1 находится folding and hybrid
