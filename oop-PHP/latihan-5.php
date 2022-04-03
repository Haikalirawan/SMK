<?php 

// Membuat sebuah class dengan nama komik
class Produk{

	// Property pada class
    public $judul = "unknow";
    public $penulis = "unknow";
    public $penerbit = "unknow";
    public $harga = "unknow";
    public $halaman = "unknow";
    public $waktuMain = "unknow";
    public $tipe = "unknow";

    // Method Construct yang otomatis dijalankan
    public function __construct($judul, $penulis, $penerbit, $harga, $halaman, $waktuMain, $tipe){

    	$this->judul = $judul;
    	$this->penulis = $penulis;
    	$this->penerbit = $penerbit;
    	$this->harga = $harga;
        $this->halaman = $halaman;
        $this->waktuMain = $waktuMain;
        $this->tipe = $tipe;
    }

    // Method getLabel untuk class komik
    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }

    // method untuk kondisi produk
    public function getInfoLengkap() {
        $str = "{$this->tipe} : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

        if ($this->tipe == "Komik") {
            $str .= " - {$this->halaman} Halaman.";
        } else if($this->tipe == "Game") {
            $str .= " ~ {$this->waktuMain} Jam.";
        }

        return $str;
    }

}

// Menggunakan object type pada class
class cetakInfoLengkap {

	// parameter pertama didapat dari Object
	public function cetak( Produk $produk){
		$str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
		return $str;
	}

}


// Buat sebuah objek dari class komik
$produk1 = new Produk("Gakuen school", "Moshimoto Itsuky", "Kobassolo", 20000, 100, 0, "Komik");

// Buat sebuah objek dari class komik
$produk2 = new Produk("Star wars", "Gokutsu imikai", "Superstars", 80000, 0, 20, "Game");


// Buat sebuah objek dari class cetakInfoLengkap
$infoProduk1 = new cetakInfoLengkap();


// Tampilkan Hasilnya 
echo $produk1->getInfoLengkap();
echo "<br>";
echo $produk2->getInfoLengkap();



?>