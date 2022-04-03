<?php 

// Membuat sebuah class dengan nama komik
class Produk{

    // Property pada class
    protected $judul = "unknow";
    protected $penulis = "unknow";
    protected $penerbit = "unknow";
    protected $diskon = 0;

    private $harga = 0;


    // Method Construct yang otomatis dijalankan
    public function __construct($judul, $penulis, $penerbit, $harga){

        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
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

    // Menampilkan dan memberi harga diskon
    public function getHarga(){
    	return $this->harga - ( $this->harga * $this->diskon / 100);
    }

}


// Child ckass dari produk untuk komik
class Komik extends Produk {

    public $halaman = "unknow";

    public function __construct($judul, $penulis, $penerbit, $harga, $halaman){

        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->halaman = $halaman; 
    }

    public function getInfoProduk(){
        $str = "Komik : ". parent::getInfoProduk() ." - {$this->halaman} Halaman.";
        return $str;
    }


    public function getDiskon($diskon){
    	$this->diskon = $diskon;
    }
}

// Child ckass dari produk untuk game
class Game extends Produk {
    
    public $waktuMain = "unknow";

    public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain){

        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain; 
    }


    public function getInfoProduk(){
        $str = "Game : ". parent::getInfoProduk() ." ~ {$this->waktuMain} Jam.";
        return $str;
    }

    public function getDiskon($diskon){
    	$this->diskon = $diskon;
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
$produk1 = new Komik("Gakuen school", "Moshimoto Itsuky", "Kobassolo", 20000, 100);

// Buat sebuah objek dari class komik
$produk2 = new Game("Star wars", "Gokutsu imikai", "Superstars", 80000, 20);


// Buat sebuah objek dari class cetakInfoLengkap
$infoProduk1 = new cetakInfoLengkap();


// Tampilkan Hasilnya 
echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<hr>";
echo $produk2->getDiskon(50);
echo $produk2->getHarga();



?>