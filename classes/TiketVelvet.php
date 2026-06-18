<?php

require_once "Tiket.php";

class TiketVelvet extends Tiket
{
    // Properti tambahan
    protected $bantalSelimutPack;
    protected $layananButler;


    public function __construct(
        $id_tiket,
        $nama_film,
        $jadwal_tayang,
        $jumlah_kursi,
        $hargaDasarTiket,
        $bantalSelimutPack,
        $layananButler
    )
    {
        parent::__construct(
            $id_tiket,
            $nama_film,
            $jadwal_tayang,
            $jumlah_kursi,
            $hargaDasarTiket
        );

        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }


    // Implementasi abstract method
    public function hitungTotalHarga()
    {
        // Contoh biaya tambahan layanan Velvet
        $biayaVelvet = 75000;

        return $this->hargaDasarTiket + $biayaVelvet;
    }


    public function tampilkanInfoFasilitas()
    {
        return "Paket Bantal/Selimut: " . $this->bantalSelimutPack .
               ", Layanan Butler: " . $this->layananButler;
    }
}

?>