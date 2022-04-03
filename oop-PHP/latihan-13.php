<?php 

// Membuat sebuah class dengan nama komik
abstract class Produk{

    // Property pada class
    private $judul = "unknow";
    private $penulis = "unknow";
    private $penerbit = "unknow";

    protected $diskon = 0;

    private $harga = 0;


    // Method Construct yang otomatis dijalankan
    public function __construct($judul, $penulis, $penerbit, $harga){

        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    // Atur nama Judul Produk
    public function setJudul($judul){
        // Exeption Handling
        if (!is_string($judul))
        {
            throw new Exception("Judul harus Berupa STRING");
        } else {
        return $this->judul = $judul;
        }
    }

        // Atur nama Penulis Produk
    public function setPenulis($penulis){
        // Exception Handling
        if (!is_string($penulis))
        {
            throw new Exception("Penulis harus Berupa STRING");
        } else {
        return $this->penulis = $penulis;
        }
    }

        // Atur nama Penerbit Produk
    public function setPenerbit($penerbit){
        // Exeption Handling
        if (!is_string($penerbit))
        {
            throw new Exception("Penerbit harus Berupa STRING");
        } else {
        return $this->penerbit = $penerbit;
        }
    }

    // Mengambil judul Produk
    public function getJudul(){
        return $this->judul;
    }

        // Mengambil Penulis Produk
    public function getPenulis(){
        return $this->penulis;
    }

        // Mengambil Penerbit Produk
    public function getPenerbit(){
        return $this->penerbit;
    }


    // Method getLabel untuk class komik
    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }

    // Menampilkan dan memberi harga diskon
    public function getHarga() {
    	return $this->harga - ( $this->harga * $this->diskon / 100);
    }

    // method Abstract
    abstract public function getInfoProduk();

    public function getInfo() {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

        return $str;
    }

}





// Child ckass dari produk untuk komik
class Komik extends Produk {

    public $halaman = "unknow";

    // __construct milik Komik
    public function __construct($judul, $penulis, $penerbit, $harga, $halaman){

        // Mengambil __consturct milik parent
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->halaman = $halaman; 
    }

    public function getInfoProduk(){
        $str = "Komik : ". $this->getInfo() ." - {$this->halaman} Halaman.";
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
        $str = "Game : ". $this->getInfo() ." ~ {$this->waktuMain} Jam.";
        return $str;
    }

    public function getDiskon($diskon){
    	$this->diskon = $diskon;
    }
}






// Menggunakan object type pada class
class cetakInfoLengkap {
	public $daftarProduk = [];


	public function tambahProduk(Produk $produk){
		$this->daftarProduk[] = $produk;
	}

    public function cetak(){
        $str = "DAFTAR PRODUK : <br>";

        foreach ($this->daftarProduk as $p) {
        	$str .= "- {$p->getInfoProduk()} <br>";
        }
        return $str;
    }

}






// Buat sebuah objek dari class komik
$produk1 = new Komik("Gakuen school", "Moshimoto Itsuky", "Kobassolo", 20000, 100);

// Buat sebuah objek dari class komik
$produk2 = new Game("Star wars", "Gokutsu imikai", "Superstars", 80000, 20);




$cetakProduk = new cetakInfoLengkap();
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);

echo $cetakProduk->cetak();












// ABSTRACT CLASS

?>