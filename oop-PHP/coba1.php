<?php

// INHERITANCE
// pada oop php

// buat class
class Motor {

	// membuat property motor 
	public $warna = "unknow",
		   $tahun = "unknow",
		   $nomor_mesin = "unknow";

	// membuat method motor 
	public function stater(){
		return "Proses stater dimulai";
	}
}

   // buat class turunan dari class diatas
class Mio extends Motor{

	// membuat property motor mio
	public $warna = "Putih",
		   $tahun = "2017",
		   $nomor_mesin = "1712m7";

	// membuat method motor mio
   	public function staterMotor(){
     return "Proses Stater sangat kasar";
   }
}




// buat objek dari class diatas
$sepeda_mio = new Mio();


// Hasil yang ditampilkan
echo "PENERAPAN INHERITANCE PADA OOP PHP";
echo "<br />";
echo "<br />";
echo "<br />";

echo "Spesifikasi Motor";
echo "<br />";
echo "<br />";
echo "Warna : " . $sepeda_mio->warna;
echo "<br />";
echo "Tahun : " . $sepeda_mio->tahun;
echo "<br />";
echo "Nomor Mesin : " . $sepeda_mio->nomor_mesin;
echo "<br />";

echo "Stater Sepeda motor Mio : " . $sepeda_mio->StaterMotor();