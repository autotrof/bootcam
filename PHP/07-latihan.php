<?php

class Hewan 
{
    public $suara;

    function __construct($suara)
    {
        $this->suara = $suara;
    }

    function bersuara() {
        echo $this->suara;
    }
}

class Kucing extends Hewan 
{
    public $warna;
    
    function __construct($warna)
    {
        parent::__construct("Meong");
        $this->warna = $warna;
    }

    function makan() {
        echo "Kucing berwarna " . $this->warna . " sedang makan ikan. Setelah itu dia bersuara " . $this->suara;
    }
}