<?php
for ($i = 1; $i <= 100; $i++) {
  if ($i % 3 == 0) { //parent condition

    if($i % 5 == 0){ //child condition
      echo luas_persegi($i/3,$i/5);
    }else{
            echo luas_lingkaran($i/3);
    } //akhir child condition
  
  } elseif ($i % 5 == 0) {
      echo keliling_lingkaran($i/5);
  } else {
    echo $i.'.00';
  } //akhir parent condition
    echo '<br/>';
}


  function luas_lingkaran($angka){ //function luas lingkaran
      return round(3.14 * pow($angka, 2),2);
  }
  function keliling_lingkaran($angka){ //function keliling
      return round(2*3.14*$angka,2);
  }
  function luas_persegi($panjang,$lebar){ //function persegi
      return round(($panjang/3)*($lebar/5),2);
  }
?>