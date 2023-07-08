class Kendaraan {
    constructor(roda) {
        this._roda = roda
    }
    jalan() {
        console.log("Mobil dengan roda " + this._roda + " berjalan")
    }
}

class Mobil extends Kendaraan {
    constructor(warna) {
        super(4);
        this._warna = warna;
    }
    showDetailInfo() {
        console.log("Mobil dengan roda " + this._roda + " memiliki warna " + this._warna)
    }
}

const mobil = new Mobil("Kuning")
mobil.jalan()
// Mobil dengan roda 4 berjalan
mobil.showDetailInfo()
// Mobil dengan roda 4 memiliki warna Kuning