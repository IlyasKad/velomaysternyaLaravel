<?php

namespace App\Macros;

class Parser  {
	public static function check_command($name_of_command){
		// $name_of_commands = get_class_methods($macro);
		$name_of_commands = [
			'command_img',
			'command_page_link',
			'command_get_tiles'
		];
		return in_array($name_of_command, $name_of_commands);
	}

	public static function parse($text) {
		$macro = new Macro();
		$parts = explode("~~", $text);
	
		for($i = 1; $i < count($parts); $i += 2){ 
			//$parts[$i] = "command_img(discount.jpg,dicsount picture)"    		
			$start = strpos($parts[$i], '(');
			$len = strpos($parts[$i], ')') - $start - 1;

			$params_text = substr($parts[$i], $start + 1, $len); 
			$name_of_command = substr($parts[$i], 0, $start); 
			$params = explode(',', $params_text);

			if (self::check_command($name_of_command)) {
				$parts[$i] = call_user_func_array([$macro, $name_of_command], $params); 
			} else {   			
				$parts[$i] = '~~' .  $name_of_command . '~~';
			}    		
		}
		$parsed_text = implode($parts);
		return $parsed_text;
	}
}