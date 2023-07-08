class Kendaraan {
    constructor(roda) {
        this._roda = roda
    }
    jalan() {
        console.log("Mobil dengan roda " + this._roda + " berjalan")
    }
}

const mobil = new Kendaraan(4)
mobil.jalan()
// Mobil dengan roda 4 berjalan