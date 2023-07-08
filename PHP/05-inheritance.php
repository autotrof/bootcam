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

class Mobil extends Kendaraan {
    public $merk;
    function __construct($pemilik, $harga, $merk)
    {
        parent::__construct(4, $pemilik, $harga);
        $this->merk = $merk;
    }

    function printInfo () {
        echo (
            "Kendaraan ini berjenis mobil. memiliki roda " . $this->roda . 
            ". Memiliki merk " . $this->merk . 
            ". Pemiliknya bernama " . $this->pemilik
        );
    }
}

$mobil = new Mobil("Budi", 100000000, "BMX");
$mobil->printInfo();
// Kendaraan ini berjenis mobil. memiliki roda 4. Memiliki merk BMX. Pemiliknya bernama Budi