<?php 

class ContohStatic
{
	public static $angka = 1;
	
	public static function halo()
	{
		return "Halo " . self::$angka++ . " Kali.";
	}
}

echo ContohStatic::$angka;
echo "<br>";
echo ContohStatic::halo();
echo "<br>";
echo ContohStatic::halo();
echo "<hr>";



class Contoh
{
	
	public static $angka = 1;

	public function halo(){
		return "Halo " . self::$angka++ ." Kali.";
	}
}



$cetak = new Contoh;
echo $cetak->halo();
echo "<br>";
echo $cetak->halo();
echo "<br>";
echo $cetak->halo();
echo "<br>";
echo $cetak->halo();

echo "<hr>";

$cetak2 = new Contoh;
echo $cetak2->halo();
echo "<br>";
echo $cetak2->halo();
echo "<br>";
echo $cetak2->halo();

// Static keyword