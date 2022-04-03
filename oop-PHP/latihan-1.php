<?php 

class Komik{

    // ini class
    public $nama = "unknow";
    public $penulis = "unknow";
    public $penerbit = "unknow";
    public $harga = "unknow";

    // ini method
    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }
}

// ini object
$produk1 = new Komik();
$produk1->nama = "Gakuen school";
$produk1->penulis = "Moshimoto Itsuky";
$produk1->penerbit = "Kobassolo";
$produk1->harga = 20000;

// output class
echo "Komik ini berjudul ". $produk1->nama ." Sangatlah seru, Penulisnya ialah ". $produk1->penulis ." diterbitkan oleh ". $produk1->penerbit." Dan harga juga terjangkau, Hanya Rp.".$produk1->harga;
echo "<br/>";
echo "Komik ini memiliki label yaitu : ". $produk1->getLabel() .", Komik ini memiliki Copyright";

?>