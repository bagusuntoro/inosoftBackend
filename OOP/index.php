<?php

abstract class BangunDatar {
  abstract public function area();
  abstract public function circumference();
  abstract public function enlarge($scale);
  abstract public function shrink($scale);
}

// class lingkaran
class Lingkaran extends BangunDatar {
  private $jari;

  public function __construct($jari) {
      $this->jari = $jari;
  }

  public function area() {
      return pi() * pow($this->jari, 2)."<br>";
  }
  public function circumference() {
      return 2 * pi() * $this->jari."<br>";
  }
  public function enlarge($scale) {
      $this->jari *= $scale;
  }
  public function shrink($scale) {
      $this->jari /= $scale;
  }
}
echo "Result Lingkaran<br>";
$lingkaran = new Lingkaran(10);
$lingkaran->area();
$lingkaran->circumference();
$lingkaran->enlarge(2);
$lingkaran->shrink(2);
Descriptor::describe($lingkaran);
echo "<br>";
echo "<br>";
// end class




// class persegi
class Persegi extends BangunDatar {
  private $sisi;

  public function __construct($sisi) {
      $this->sisi = $sisi;
  }
  public function area() {
      return pow($this->sisi, 2)."<br>";
  }
  public function circumference() {
      return 4 * $this->sisi."<br>";
  }
  public function enlarge($scale) {
      $this->sisi *= $scale;
  }
  public function shrink($scale) {
      $this->sisi /= $scale;
  }
}
echo "<br>Result Persegi<br>";
$persegi = new Persegi(10);
$persegi->area();
$persegi->circumference();
$persegi->enlarge(2);
$persegi->shrink(2);
Descriptor::describe($persegi);
echo "<br>";
echo "<br>";
// end class



// class persegi panjang
class PersegiPanjang extends BangunDatar {
  private $panjang, $lebar;

  public function __construct($panjang, $lebar) {
      $this->panjang = $panjang;
      $this->lebar = $lebar;
  }
  public function area() {
      return $this->panjang * $this->lebar."<br>";
  }
  public function circumference() {
      return 2 * ($this->panjang + $this->lebar)."<br>";
  }
  public function enlarge($scale) {
      $this->panjang *= $scale;
      $this->lebar *= $scale;
  }
  public function shrink($scale) {
      $this->panjang /= $scale;
      $this->lebar /= $scale;
  }
}
echo "<br>Result Persegi Panjang<br>";
$persegiPanjang = new PersegiPanjang(10, 20);
$persegiPanjang->area();
$persegiPanjang->circumference();
$persegiPanjang->enlarge(2);
$persegiPanjang->shrink(2);
Descriptor::describe($persegiPanjang);
// end class


class Descriptor {
  public static function describe($bangunDatar) {
      $luas = $bangunDatar->area();
      $keliling = $bangunDatar->circumference();
      $nama = get_class($bangunDatar);
      echo "Bangun datar ini adalah $nama yang memiliki luas $luas dan keliling $keliling.";
  }
}