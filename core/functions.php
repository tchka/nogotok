<?php

function fgpm() { }

function postFilter($data) {
	if (is_array($data)) {
		foreach ($data as $j => $i) {
			$data[$j] = postFilter($i);
		}
	} else {
		$data = htmlspecialchars($data);
	}
	return $data;
}

function postFilterDecode($data) {
	if (is_array($data)) {
		foreach ($data as $j => $i) {
			$data[$j] = postFilterDecode($i);
		}
	} else {
		$data = htmlspecialchars_decode($data);
	}
	return $data;
}

function isEmail($data) {
	return (filter_var($data, FILTER_VALIDATE_EMAIL) !== false);
}

function randomPass() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789!@#$%^&*()";
    $l = strlen($alphabet) - 1; 
    $pass = array(); 
    for ($i = 0; $i < 12; $i++) {
        $n = rand(0, $l);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function encodePass($pass) {
	$salt = app()->config->param('user/salt');

	$part1 = md5($salt.$pass);
	$part2 = md5($pass.$salt);
	$part3 = md5($salt);

	for ($j = 0; $j < 32; $j++) {
		$output.= $part1[$j]. $part2[$j]. $part3[$j];
	}
	return md5($output);
}

function showPrice($data, $num = 2) {
	return number_format($data, $num, '.', ' ');
}

function hideEmail($email) {
	list($part1, $part2) = explode('@', $email);

	$part1 = str_pad(substr($part1, 0, 2), strlen($part1), "*", STR_PAD_RIGHT);
	$part2 = str_pad(substr($part2, 0, 1), strlen($part2), "*", STR_PAD_RIGHT);

	$result = $part1."@".$part2;
	for ($j = 0; $j < strlen($email); $j++) {
		if ($email[$j] == '.') {
			$result[$j] = '.';
		}
	}

	return $result;
}

function cutText($content, $lim, $after = "") {
	if (mb_strlen($content) <= $lim) return $content;
	$content = mb_substr($content, 0, $lim);
	$k = max(mb_strrpos($content, " "), mb_strrpos($content, ",")-1, mb_strrpos($content, "."), mb_strrpos($content, "!"));
	$content = mb_substr($content, 0, $k);
	return $content.$after;
}

function translit($str, $to_alias = true) {				
	$table = array('А' => 'A','Б' => 'B','В' => 'V','Г' => 'G','Д' => 'D','Е' => 'E','Ё' => 'YO','Ж' => 'ZH','З' => 'Z','И' => 'I','Й' => 'J','К' => 'K','Л' => 'L','М' => 'M','Н' => 'N','О' => 'O','П' => 'P','Р' => 'R','С' => 'S','Т' => 'T','У' => 'U','Ф' => 'F','Х' => 'H','Ц' => 'C','Ч' => 'CH','Ш' => 'SH','Щ' => 'CSH','ъ' => '','Ы' => 'Y','ь' => '','Э' => 'E','Ю' => 'YU','Я' => 'YA', 
	   	'а' => 'a','б' => 'b','в' => 'v','г' => 'g','д' => 'd','е' => 'e','ё' => 'yo','ж' => 'zh','з' => 'z','и' => 'i','й' => 'j','к' => 'k','л' => 'l','м' => 'm','н' => 'n','о' => 'o','п' => 'p','р' => 'r','с' => 's','т' => 't','у' => 'u','ф' => 'f','х' => 'h','ц' => 'c','ч' => 'ch','ш' => 'sh','щ' => 'csh','ъ' => '','ы' => 'y','ь' => '','э' => 'e','ю' => 'yu','я' => 'ya', 
		);

    $str = str_replace(
        array_map('urldecode', array_keys($table)),
        array_values($table),
        urldecode($str)
    );	
		
	if ($to_alias) {						
		$str = mb_strtolower($str,"UTF-8");
		$from = array("'","\""," ");
		$to = array("_","_" ,"_");
		$str = str_replace($from,$to,$str);
		while (strpos($str, '__') !== false) {
			$str = str_replace('__', '_', $str);
		}

		$str = preg_replace("/[^a-z^0-9^_^\.]*/", "", $str);	
	}		
	return $str;		
}

function getCountString($n, $form1, $form2, $form3) {
	$plural = ($n % 10 == 1 && $n % 100 != 11 ? 0 : ($n % 10 >= 2 && $n % 10 <= 4 && ($n % 100 < 10 or $n % 100 >= 20) ? 1 : 2));
    switch($plural) 
        {
            case 0:
            default:
                return $form1;
            case 1:
                return $form2;
            case 2:
                return $form3;
    	}
}	

function dateFormat( $d ) {
	$months = array(
		1 => 'января',
		2 => 'февраля',
		3 => 'марта',
		4 => 'апреля',
		5 => 'мая',
		6 => 'июня',
		7 => 'июля',
		8 => 'августа',
		9 => 'сентября',
		10 => 'октября',
		11 => 'ноября',
		12 => 'декабря',
	);

	if (!is_numeric($d)) {
		$d = strtotime($d);
	}

	$h = date('d', $d);

	$h.= ' ' . $months[ date('n', $d) ] . ' ';

	$h.= date('Y', $d);

	return $h;
}

function aTel( $tel ) {
	return preg_replace('/([^0-9\+])/', '', $tel);
}

function aWa( $tel ) {
	return preg_replace('/([^0-9])/', '', $tel);
}