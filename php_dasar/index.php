<?php
for ($i = 1; $i <= 100; $i++) { // loop i = 1 to i = 100

  if ($i % 3 == 0) { // for check i mod 3 == 0 or not 

    echo ($i % 5 == 0) ? luas_lingkaran($i/3,$i/5) : luas_lingkaran($i/3); // ternary for check (i mod 3 == 0) && i mod 5 == 0 or not
  
  } elseif ($i % 5 == 0) { // for check i mod 5 == 0 or not 

      echo keliling_lingkaran($i/5);

  } else { // default i

    echo $i.'.00';

  }
    echo '<br/>';
}


  function luas_lingkaran($angka){ //function luas lingkaran
      return round(3.14 * pow($angka, 2),2);
  }
  function keliling_lingkaran($angka){ //function keliling lingkaran
      return round(2*3.14*$angka,2);
  }
  function luas_persegi($panjang,$lebar){ //function luas persegi
      return round($panjang*$lebar,2);
  }
?>