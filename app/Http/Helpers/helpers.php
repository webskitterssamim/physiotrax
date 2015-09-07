<?php namespace App\Http;
use \Route, \Config;
    class Helpers {
        public function hashEncrypt($string){
           return md5($string.'foreignhub');
        }
        
        
	public function url_title($str, $separator = '-', $lowercase = FALSE)
	{
		if ($separator == 'dash') 
		{
		    $separator = '-';
		}
		else if ($separator == 'underscore')
		{
		    $separator = '_';
		}
		
		$q_separator = preg_quote($separator);

		$trans = array(
			'&.+?;'                 => '',
			'[^a-z0-9 _-]'          => '',
			'\s+'                   => $separator,
			'('.$q_separator.')+'   => $separator
		);

		$str = strip_tags($str);

		foreach ($trans as $key => $val)
		{
			$str = preg_replace("#".$key."#i", $val, $str);
		}

		if ($lowercase === TRUE)
		{
			$str = strtolower($str);
		}

		return trim($str, $separator);
	}
        
        
	//public static function ccNcrypt($ccno)
	//{
	//	$base_en_cc = base64_encode($ccno);
	//	return $new_cc = substr($base_en_cc,5,6).base64_encode($ccno);
	//}
	//
	//public static function ccDcrypt($ccno)
	//{
	//	$new_ccn = base64_encode($ccno);
	//	return base64_decode(substr(base64_decode($new_ccn), 6));
	//}
        
        
        public static function ccNcrypt($string){
                $key = Config::get('constants.SEC_SALT_KEY');
                $result = "";
                for($i=0; $i<strlen($string); $i++){
                        $char = substr($string, $i, 1);
                        $keychar = substr($key, ($i % strlen($key))-1, 1);
                        $char = chr(ord($char)+ord($keychar));
                        $result.=$char;
                }
                $salt_string = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxys0123456789~!@#$^&*()_+`-={}|:<>?[]\;',./";
                $length = rand(1, 15);
                $salt = "";
                for($i=0; $i<=$length; $i++){
                        $salt .= substr($salt_string, rand(0, strlen($salt_string)), 1);
                }
                $salt_length = strlen($salt);
                $end_length = strlen(strval($salt_length));
                return base64_encode($result.$salt.$salt_length.$end_length);
        }
        
        public static function ccDcrypt($string){
                $key = Config::get('constants.SEC_SALT_KEY');
                $result = "";
                $string = base64_decode($string);
                $end_length = intval(substr($string, -1, 1));
                $string = substr($string, 0, -1);
                $salt_length = intval(substr($string, $end_length*-1, $end_length));
                $string = substr($string, 0, $end_length*-1+$salt_length*-1);
                for($i=0; $i<strlen($string); $i++){
                        $char = substr($string, $i, 1);
                        $keychar = substr($key, ($i % strlen($key))-1, 1);
                        $char = chr(ord($char)-ord($keychar));
                        $result.=$char;
                }
                return $result;
        }        
        
	public static function getStars($no)
	{       $str ='';
                if($no>0 && $no!=''){
                    for($i=0;$i<$no;$i++){
                        $str .='X';
                    }                    
                }
                return $str;
	}        
        
        
        
        public static function getRoute($type){
            
            $classaction = class_basename(Route::currentRouteAction());
            $routeArr = explode('@', $classaction);
            
            switch ($type) {
                case 'controller':
                    return $routeArr[0];
                break;
                case 'action':
                    return $routeArr[1];
                break;
                case 'alise':
                    return Route::currentRouteName();
                break;
            }
            //return Route::currentRouteName();
            //return class_basename(Route::currentRouteAction());
        }
		
		public static function  isActiveRoute($route, $output = "active")
		{
			if (Route::currentRouteName() == $route) return $output;
		}
        
        
    } //Class
