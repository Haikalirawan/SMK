<?php 

class Komik{

    public $nama = "unknow";
    public $penulis = "unknow";
    public $penerbit = "unknow";
    public $harga = "unknow";

    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }
}

$produk1 = new Komik();
$produk1->nama = "Gakuen school";
$produk1->penulis = "Moshimoto Itsuky";
$produk1->penerbit = "Kobassolo";
$produk1->harga = 20000;

echo "Komik ini berjudul ". $produk1->nama ." Sangatlah seru, Penulisnya ialah ". $produk1->penulis ." diterbitkan oleh ". $produk1->penerbit." Dan harga juga terjangkau, Hanya Rp.".$produk1->harga;
echo "<br/>";
echo "Komik ini memiliki label yaitu : ". $produk1->getLabel() .", Komik ini memiliki Copyright";

?>