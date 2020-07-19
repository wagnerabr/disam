<?php 

namespace App\Http\Helpers;

abstract class StringHelper  
{
    static function validaEmail($mail){
		$er = "/^(([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}){0,1}$/";
		if(preg_match($er, $mail)) {
			return true;
		}else{
			return false;
		}
	}

    static function random_string($underscores = 2, $length = 15) {
		// $underscores = 2; // Número máximo de underscores na string
		// $length = 10; // Tamanho da string de retorno
		$p = "";
		for ($i = 0; $i < $length; $i++) {
			$c = mt_rand(1,7);
			switch ($c) {
				case ($c <= 2):
					$p .= mt_rand(0,9);
					break;
				case ($c <= 4):
					$p .= chr(mt_rand(65,90));
					break;
				case ($c <= 6):
					$p .= chr(mt_rand(97,122));
					break;
				case 7:
					$len = strlen($p);
					if ($underscores > 0 && $len > 0 && $len < ($length - 1) && $p[$len - 1] != "_") {
						$p .= "_";
						$underscores--;
					} else {
						$i--;
						continue;
					}
				break;
			}
		}
		return $p;
	}

    static function moeda2br($valor){
    	return number_format($valor, 2, ',', '.');
    }

    static function moeda2us($valor) {
		$valor = str_replace('.', '', $valor);
		return str_replace(',', '.', $valor);
	}

	static function youtube($string) {
		if (strpos($string,'object') !== false || strpos($string,'embed') !== false) {
			$pattern = '/youtube\.com\/v\/([^?]+)/';
		} else {
			$pattern = '/youtube\.com\/watch\?v=([^&]+)/';
		}
		preg_match($pattern, $string, $matches);
		return $matches[1];
	}

	static function youtubeLink($codigo) {
		if ($codigo) return 'http://www.youtube.com/watch?v='.$codigo;
		return '';
	}

	static function youtubeThumb($code) {
		return "http://i2.ytimg.com/vi/{$code}/default.jpg";
	}

	static function limpaCpfCnpj($valor) {
		$valor = trim($valor);
		$valor = str_replace(".", "", $valor);
		$valor = str_replace(",", "", $valor);
		$valor = str_replace("-", "", $valor);
		$valor = str_replace("/", "", $valor);
		return $valor;
	}

	static function geraPermalink($string) {
		$string = strtolower(self::normalize($string));
		$string = explode(' ',$string);
		foreach ($string as $key => $value) {
			$string[$key] = preg_replace('/[^a-z0-9-]/','',$value);
		}
		$string = implode('-',$string);
		while (strpos($string,'--') !== false) {
			$string = str_replace('--','-',$string);
		}
		if (substr($string,0,1) == '-') $string = substr($string,1);
		if (substr($string,-1) == '-') $string = substr($string,0,-1);
		return $string;
	}

	static function normalize($string) {
		$table = array(
			'Š'=>'S', 'š'=>'s', 'Đ'=>'D', 'đ'=>'d', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
			'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
			'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
			'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
			'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
			'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
			'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
			'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r'
		);
		return strtr($string, $table);
	}

	static function date2br($date) {
		if (!$date) return '';
		list($a,$m,$d) = explode('-',$date);
		return $d.'/'.$m.'/'.$a;
	}
	
	static function date2us($date) {
		if (!$date) return '';
		list($d,$m,$a) = explode('/',$date);
		return $a.'-'.$m.'-'.$d;
	}

	static function datetime($date) {
		list($data, $hora) = explode(" ",$date);
		$data = date2br($data);
		$hora = substr($hora, 0, 5);
		$time = array($data, $hora);
		return $time;
	}
	
	static function datetime2br($date, $separador = ' - ') {
		if (!$date || $date == '0000-00-00 00:00:00') return '';
		list($data, $hora) = explode(" ",$date);
		$data = self::date2br($data);
		$hora = substr($hora, 0, 5);
		return $data.$separador.$hora;
	}
}