const detailSiswa = {
    nama: "Budi",
    kelas: 6,
    tanggal_lahir: "2015-01-01"
}


let detailKaryawan = {
    nama: "Budi",
    tanggal_lahir: "2015-01-01",
    departemen: "Marketing",
    showInfo: function() {
        console.log(
            "Karyawan ini bernama " + this.nama + 
            ". Lahir pada tanggal " + this.tanggal_lahir + 
            ". Ia bekerja di departemen " + this.departemen
        )
    }
}
detailKaryawan.showInfo()
// Karyawan ini bernama Budi. Lahir pada tanggal 2015-01-01. Ia bekerja di departemen Marketing