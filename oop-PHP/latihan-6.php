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

    // Method Construct yang otomatis dijalankan
    public function __construct($judul, $penulis, $penerbit, $harga, $halaman, $waktuMain){

        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->halaman = $halaman;
        $this->waktuMain = $waktuMain;
    }

    // Method getLabel untuk class komik
    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }

    // method untuk kondisi produk
    public function getInfoProduk() {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

        return $str;
    }

}


// Child ckass dari produk untuk komik
class Komik extends Produk {
    public function getInfoProduk(){
        $str = "Komik : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) - {$this->halaman} Halaman.";
        return $str;
    }
}

// Child ckass dari produk untuk game
class Game extends Produk {
    public function getInfoProduk(){
        $str = "Game : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) ~ {$this->waktuMain} Jam.";
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
$produk1 = new Komik("Gakuen school", "Moshimoto Itsuky", "Kobassolo", 20000, 100, 0);

// Buat sebuah objek dari class komik
$produk2 = new Game("Star wars", "Gokutsu imikai", "Superstars", 80000, 0, 20);


// Buat sebuah objek dari class cetakInfoLengkap
$infoProduk1 = new cetakInfoLengkap();


// Tampilkan Hasilnya 
echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();



?>