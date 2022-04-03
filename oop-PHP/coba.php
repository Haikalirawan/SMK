<?php

// POLIMORFISME
// pada oop php


// buat abstract class
abstract class komputer{
   // buat abstract method
   abstract public function booting_os();
}
  
  // buat method turunan dari abstract method
class laptop extends komputer{
   public function booting_os(){
     return "Proses Booting Sistem Operasi Laptop";
   }
}

  // buat method turunan dari abstract method
class pc extends komputer{
   public function booting_os(){
     return "Proses Booting Sistem Operasi PC";
   }
}


  // buat method turunan dari abstract method
class macbook extends komputer{
public function booting_os(){
     return "Proses Booting Sistem Operasi Macbook";
   }


}
  
// buat objek dari class diatas
$laptop_baru = new laptop();
$pc_baru = new pc();
$macbook_baru = new macbook();
  

  // Digunakan untuk memanggil method-method dari setiap class.
function booting_os($objek_komputer) {
   return $objek_komputer->booting_os();
}
  
echo "PENERAPAN POLIMORFISME PADA OOP PHP";
echo "<br />";
echo "<br />";
echo "<br />";
// jalankan fungsi
echo booting_os($laptop_baru);
echo "<br />";
echo booting_os($pc_baru);
echo "<br />";
echo booting_os($macbook_baru);
