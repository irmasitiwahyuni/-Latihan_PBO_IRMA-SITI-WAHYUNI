<?php

abstract class Tiket
{
    // Properti terenksapsulasi (protected)
    protected $id_tiket;
    protected $nama_film;
    protected $jadwal_tayang;
    protected $jumlah_kursi;
    protected $hargaDasarTiket;


    // Constructor untuk mengisi data dari database
    public function __construct(
        $id_tiket,
        $nama_film,
        $jadwal_tayang,
        $jumlah_kursi,
        $hargaDasarTiket
    )
    {
        $this->id_tiket = $id_tiket;
        $this->nama_film = $nama_film;
        $this->jadwal_tayang = $jadwal_tayang;
        $this->jumlah_kursi = $jumlah_kursi;
        $this->hargaDasarTiket = $hargaDasarTiket;
    }


    // Method abstract untuk menghitung harga tiket
    abstract public function hitungTotalHarga();


    // Method abstract untuk menampilkan fasilitas studio
    abstract public function tampilkanInfoFasilitas();
}

?>