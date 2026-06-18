<?php

require_once "koneksi.php";
require_once "classes/TiketRegular.php";
require_once "classes/TiketIMAX.php";
require_once "classes/TiketVelvet.php";

// Koneksi Database
$db = new Database();
$conn = $db->getConnection();

// Ambil semua data tiket
$query = "SELECT * FROM tabel_tiket ORDER BY jenis_studio";
$result = $conn->query($query);

// Array pengelompokan studio
$dataTiket = [
    "Regular" => [],
    "IMAX" => [],
    "Velvet" => []
];

// Membuat objek sesuai jenis studio (Polymorphism)
while ($row = $result->fetch_assoc()) {

    if ($row['jenis_studio'] == "Regular") {

        $objek = new TiketRegular(
            $row['id_tiket'],
            $row['nama_film'],
            $row['jadwal_tayang'],
            $row['jumlah_kursi'],
            $row['harga_dasar_tiket'],
            $row['tipe_audio'],
            $row['lokasi_baris']
        );

    } elseif ($row['jenis_studio'] == "IMAX") {

        $objek = new TiketIMAX(
            $row['id_tiket'],
            $row['nama_film'],
            $row['jadwal_tayang'],
            $row['jumlah_kursi'],
            $row['harga_dasar_tiket'],
            $row['kacamata_3d_id'],
            $row['efek_gerak_fitur']
        );

    } else {

        $objek = new TiketVelvet(
            $row['id_tiket'],
            $row['nama_film'],
            $row['jadwal_tayang'],
            $row['jumlah_kursi'],
            $row['harga_dasar_tiket'],
            $row['bantal_selimut_pack'],
            $row['layanan_butler']
        );
    }

    // Simpan data asli + objek
    $dataTiket[$row['jenis_studio']][] = [
        "data" => $row,
        "objek" => $objek
    ];
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Cinema Ticket Dashboard</title>

<style>

/* RESET */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    background:
        radial-gradient(circle at top, 
        rgba(255,255,255,0.15), 
        transparent 25%),
        linear-gradient(to bottom, 
        #080808,
        #1a0000,
        #000);
        
    color: white;
    min-height: 100vh;
    padding: 30px;
    overflow-x: hidden;
}


/* Efek lampu proyektor */
body::before {
    content: "";
    position: fixed;
    top: -250px;
    left: 50%;
    transform: translateX(-50%);
    width: 600px;
    height: 500px;
    background: radial-gradient(
        circle,
        rgba(255,255,220,0.45),
        transparent 70%
    );
    pointer-events: none;
}


/* Kursi bioskop bawah */
body::after {
    content: "🪑 🪑 🪑 🪑 🪑 🪑 🪑 🪑 🪑 🪑 🪑 🪑 🪑";
    position: fixed;
    bottom: 0;
    width: 100%;
    text-align: center;
    font-size: 35px;
    letter-spacing: 15px;
    opacity: 0.35;
}


/* HEADER LAYAR BIOSKOP */
.header {

    background: #111;
    border: 5px solid #c9a227;
    border-radius: 25px;

    text-align: center;
    padding: 35px;

    box-shadow:
        0 0 20px #c9a227,
        inset 0 0 25px #000;

    margin-bottom: 35px;
}


.header h1 {
    color: #ffd700;
    font-size: 42px;
    text-shadow:
        0 0 15px #ffb300;
    letter-spacing: 4px;
}


.header p {
    color: #ddd;
    margin-top: 10px;
}


/* SEARCH */
.search-area {
    text-align: center;
    margin-bottom: 30px;
}


#searchInput {

    width: 50%;
    padding: 15px 25px;

    border-radius: 40px;
    border: 2px solid #c9a227;

    background: #111;
    color: white;

    font-size: 16px;

    box-shadow:
        0 0 20px rgba(255,215,0,.4);

}


#searchInput::placeholder {
    color: #aaa;
}


/* CARD STUDIO */
.studio-card {

    background:
        linear-gradient(
            145deg,
            #220000,
            #080808
        );

    border-left: 8px solid #c9a227;
    border-radius: 25px;

    margin-bottom: 40px;

    overflow: hidden;

    box-shadow:
        0 0 25px rgba(255,215,0,.25);

}


/* NAMA STUDIO */
.studio-title {

    background:
        linear-gradient(
            90deg,
            #600000,
            #c90000
        );

    color: white;

    text-align: center;

    font-size: 28px;
    font-weight: bold;

    padding: 18px;

    letter-spacing: 3px;

}


/* TABLE */
table {
    width: 100%;
    border-collapse: collapse;
}


th {

    background: #1d1d1d;

    color: #ffd700;

    padding: 15px;

    text-transform: uppercase;
}


td {

    padding: 15px;

    text-align: center;

    border-bottom:
        1px solid rgba(255,255,255,.1);

}


tr {
    transition: .3s;
}


tr:hover {

    background:
        rgba(255,215,0,.12);

    transform: scale(1.01);

}


/* Harga */
.price {

    color: #00ff95;

    font-weight: bold;

    text-shadow:
        0 0 8px #00ff95;

}


/* Fasilitas */
.fasilitas {

    color: #fff3b0;

    font-style: italic;

}


/* Scrollbar bioskop */
::-webkit-scrollbar {
    width: 10px;
}


::-webkit-scrollbar-thumb {

    background: #c9a227;
    border-radius: 10px;

}


::-webkit-scrollbar-track {
    background: #111;
}


/* Responsive */
@media(max-width: 768px) {

    #searchInput {
        width: 90%;
    }

    body::after {
        font-size: 22px;
        letter-spacing: 8px;
    }

    table {
        font-size: 12px;
    }

}

/* ==========================
   MASKOT CINEMA
========================== */

.mascot {
    position: fixed;
    z-index: 999;
    font-size: 75px;
    filter: drop-shadow(0 0 15px #ffd700);
    animation: float 3s ease-in-out infinite;
}

/* Popcorn kiri */
.mascot.left {
    top: 90px;
    left: 25px;
}

/* Clapper kanan */
.mascot.right {
    top: 90px;
    right: 25px;
    animation-delay: 1s;
}

/* Kamera bawah */
.camera {
    position: fixed;
    bottom: 80px;
    right: 30px;
    font-size: 65px;
    filter: drop-shadow(0 0 12px #ff3333);
    animation: float 4s ease-in-out infinite;
}


/* Animasi melayang */
@keyframes float {

    0% {
        transform: translateY(0px) rotate(0deg);
    }

    50% {
        transform: translateY(-15px) rotate(5deg);
    }

    100% {
        transform: translateY(0px) rotate(0px);
    }

}

</style>

</head>


<body>

<div class="mascot left">
    🍿😄
</div>

<div class="mascot right">
    🎬
</div>

<div class="camera">
    🎥
</div>

<!-- Maskot Cinema -->
<div class="mascot left">
    🍿
</div>

<div class="mascot right">
    🎬
</div>

<div class="camera">
    🎥
</div>


<!-- HEADER -->

<div class="header">

    <h1>
        🎬 CINEMA TICKET DASHBOARD 🎬
    </h1>

    <p>
        Enjoy Your Premium Movie Experience
    </p>

</div>



<!-- SEARCH -->

<div class="search-area">
    <input 
        type="text"
        id="searchInput"
        placeholder="🔍 Cari nama film..."
        onkeyup="searchTiket()">
</div>


<!-- DATA STUDIO -->

<?php foreach($dataTiket as $studio => $daftar) : ?>


<div class="studio-card">

    <div class="studio-title">

        🍿 Studio <?= $studio; ?>

    </div>


<table>

<tr>

    <th>ID Tiket</th>

    <th>Film</th>

    <th>Jadwal</th>

    <th>Kursi</th>

    <th>Harga Dasar</th>

    <th>Fasilitas Premium</th>

    <th>Total Harga</th>

</tr>


<?php foreach($daftar as $item) : ?>


<tr class="ticket-row">


<td>

<?= $item['data']['id_tiket']; ?>

</td>


<td class="nama-film">
    🎥 <?= $item['data']['nama_film']; ?>
</td>


<td>

🕒 <?= $item['data']['jadwal_tayang']; ?>

</td>


<td>

🎫 <?= $item['data']['jumlah_kursi']; ?>

</td>


<td class="price">

Rp <?= number_format($item['data']['harga_dasar_tiket'],0,",","."); ?>

</td>


<td class="fasilitas">

<!-- POLYMORPHISM -->

<?= $item['objek']->tampilkanInfoFasilitas(); ?>

</td>


<td class="price">

<!-- METHOD OVERRIDING -->

Rp <?= number_format($item['objek']->hitungTotalHarga(),0,",","."); ?>

</td>


</tr>


<?php endforeach; ?>


</table>


</div>


<?php endforeach; ?>

<script>

function searchTiket() {

    let input = document.getElementById("searchInput").value.toLowerCase();

    let cards = document.querySelectorAll(".studio-card");

    cards.forEach(function(card) {

        let rows = card.querySelectorAll(".ticket-row");

        let adaFilm = false;

        rows.forEach(function(row) {

            let film = row.querySelector(".nama-film").textContent.toLowerCase();

            if (film.includes(input)) {
                row.style.display = "table-row";
                adaFilm = true;
            } else {
                row.style.display = "none";
            }

        });

        // tampilkan card jika ada hasil pencarian
        if (adaFilm || input === "") {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }

    });

}

</script>