<?php

namespace App\Macros;
use App\Page;

class Macro {
    public function command_img($img_path, $alt) {
				$path = asset('images/images/' . $img_path);
				$result = '<img src="'. $path .'" alt="'. $alt .'" />';
				return $result;
    }

    public function command_page_link($code, $text, $css_class) {
				$path = route('userShow', $code);
				$result = '<a href="'.  $path .'" class="'. $css_class .'">'. $text .'<a>';
				return $result;
    }

    public function command_get_tiles($category_code, $order) {
				$main_page = Page::where('code', $category_code)->first();
				$main_page->orderType = $order;
				$tiles = [];
				foreach ($main_page->children as $page) {
						if ($page->code != "root") {
								array_push($tiles, $page->renderTile());
						}
				}
				return implode($tiles);
    }
}
