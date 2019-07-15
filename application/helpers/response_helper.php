<?php
/**
*
*/
class response_helper
{

	public static function part($file)
	{
		include str_replace("system", "application/views/", BASEPATH) . "part/$file.php";
	}
	public static function price($price)
	{
		return "Rp ".number_format($price, 0,',','.');
	}
	public static function tanggal($tgl)
	{
		$qq='';
		$k = explode("-",$tgl);
		$bln = array('', 'Januari', 'Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember' );
		$qq = $k[2].' '.$bln[(int)$k[1]].' '.$k[0];
		return $qq;
	}
	public static function tanggalrange($tgl)
	{
		$qq='';
		$k = explode("/",$tgl);
		$bln = array('', 'Januari', 'Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember' );
		$qq = $k[1].' '.$bln[(int)$k[0]].' '.$k[2];
		return $qq;
	}
	public static function waktu($tgl)
	{
		$qq='';
		$k = explode(" ",$tgl);
		$kk = explode("-",$k[0]);
		$bln = array('', 'Januari', 'Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember' );
		
		$qq = $kk[2].' '.$bln[(int)$kk[1]].' '.$kk[0].' '.$k[1];
		return $qq;
	}
	public static function waktupersen($tgl)
	{
		$qq='';
		$k = explode("%",$tgl);
		$kk = explode("-",$k[0]);
		$bln = array('', 'Januari', 'Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember' );
		
		$qq = $kk[2].' '.$bln[(int)$kk[1]].' '.$kk[0].' '.$k[1];
		return $qq;
	}
	public static function render($file, $var = []){
		extract($var);
		include str_replace("system", "application/views", BASEPATH)."/".$file.".php";
	}
}
