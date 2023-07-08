<?php

class Kendaraan {
    public $roda;
    protected $pemilik;
    private $harga;

    function __construct($roda, $pemilik, $harga)
    {
        $this->roda = $roda;
        $this->pemilik = $pemilik;
        $this->harga = $harga;
    }

    function getHarga() {
        return $this->harga;
    }

    function setHarga($harga) {
        $this->harga = $harga;
    }

    function jalan() {
        echo "Kendaraan roda " . $this->roda . " berjalan dengan cepat";
    }
}

$kendaraan = new Kendaraan(3, "Budi", 10000000);
$kendaraan->jalan();
// Kendaraan roda 3 berjalan dengan cepat