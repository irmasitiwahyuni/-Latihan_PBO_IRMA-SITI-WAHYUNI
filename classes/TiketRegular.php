<?php

require_once "Tiket.php";

class TiketRegular extends Tiket
{
    // Properti tambahan
    protected $tipeAudio;
    protected $lokasiBaris;


    public function __construct(
        $id_tiket,
        $nama_film,
        $jadwal_tayang,
        $jumlah_kursi,
        $hargaDasarTiket,
        $tipeAudio,
        $lokasiBaris
    )
    {
        parent::__construct(
            $id_tiket,
            $nama_film,
            $jadwal_tayang,
            $jumlah_kursi,
            $hargaDasarTiket
        );

        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }


    // Implementasi abstract method
    public function hitungTotalHarga()
    {
        return $this->hargaDasarTiket;
    }


    public function tampilkanInfoFasilitas()
    {
        return "Tipe Audio: " . $this->tipeAudio .
               ", Lokasi Baris: " . $this->lokasiBaris;
    }
}

?>