class Kendaraan {
    constructor(roda) {
        this._roda = roda;
    }

    get roda() {
        return this._roda;
    }

    set roda(value) {
        this._roda = value;
    }
}

let mobil = new Kendaraan(4);
mobil.roda = 5
console.log(mobil.roda)