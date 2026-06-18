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
    return ($this->jumlah_kursi * $this->hargaDasarTiket) * 1.50;
}


    public function tampilkanInfoFasilitas()
    {
        return "Paket Bantal/Selimut: " . $this->bantalSelimutPack .
               ", Layanan Butler: " . $this->layananButler;
    }
}

?>