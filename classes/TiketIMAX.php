<?php

require_once "Tiket.php";

class TiketIMAX extends Tiket
{
    // Properti tambahan
    protected $kacamata3dId;
    protected $efekGerakFitur;


    public function __construct(
        $id_tiket,
        $nama_film,
        $jadwal_tayang,
        $jumlah_kursi,
        $hargaDasarTiket,
        $kacamata3dId,
        $efekGerakFitur
    )
    {
        parent::__construct(
            $id_tiket,
            $nama_film,
            $jadwal_tayang,
            $jumlah_kursi,
            $hargaDasarTiket
        );

        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }


    // Implementasi abstract method
    public function hitungTotalHarga()
    {
        // Contoh biaya tambahan fasilitas IMAX
        $biayaIMAX = 50000;

        return $this->hargaDasarTiket + $biayaIMAX;
    }


    public function tampilkanInfoFasilitas()
    {
        return "ID Kacamata 3D: " . $this->kacamata3dId .
               ", Efek Gerak: " . $this->efekGerakFitur;
    }
}

?>