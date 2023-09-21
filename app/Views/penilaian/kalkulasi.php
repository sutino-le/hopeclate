<?= $this->extend('main/layout'); ?>

<?= $this->section('isi') ?>

<style>
.list-group-flush {
    height: 780px;
    overflow-y: auto;
}
</style>





<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
<div class='card'>
    <div class='card-header bg-info'>
        <div class='row'>
            <div class='col'>
                <h1 class="card-title">Simple Additive Weighting (SAW)</h1>
            </div>
        </div>
    </div>

    <div class="body">

        <ul class='list-group list-group-flush'>
            <li class='list-group-item'>



                <?php

                $conn = mysqli_connect("localhost", "root", "", "hopeclate");

                ?>

                <div class="row">
                    <div class="col"><b>A. Analisis Kebutuhan Input dan Output</b></div>
                </div>

                <div class="container-fluid">

                    <br>

                    <div class="row">

                        <div class="col-3">
                            <b>Tabel 1. Kriteria (Ci)</b> <br>
                            <table border="1">
                                <tr align="center" bgcolor="yellow">
                                    <td><b>No</b></td>
                                    <td><b>Kriteria</b></td>
                                    <td><b>Keterangan</b></td>
                                </tr>
                                <?php
                                $sqlkriteria = "SELECT * FROM kriteria";
                                $resultkriteria = mysqli_query($conn, $sqlkriteria);
                                if (mysqli_num_rows($resultkriteria) > 0) {
                                    // output data of each row
                                    $nokriteria = 1;
                                    $c_kriteria = 1;
                                    while ($rowkriteria = mysqli_fetch_assoc($resultkriteria)) {
                                ?>
                                <tr>
                                    <td align="center"><?= $nokriteria++ ?></td>
                                    <td align="center">C<?= $c_kriteria++ ?></td>
                                    <td><?= $rowkriteria['kriteria'] ?></td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </table>
                        </div>

                        <div class="col-3">
                            <b>Tabel 2. Rating Kepentingan dan Bobot Preferensi</b> <br>
                            <table border="1">
                                <tr align="center" bgcolor="yellow">
                                    <td><b>No</b></td>
                                    <td><b>Rating Kepentingan</b></td>
                                    <td><b>Bobot</b></td>
                                </tr>
                                <?php
                                $sqlbobor = "SELECT * FROM bobot";
                                $resultbobot = mysqli_query($conn, $sqlbobor);
                                if (mysqli_num_rows($resultbobot) > 0) {
                                    // output data of each row
                                    $nobobot = 1;
                                    while ($rowbobot = mysqli_fetch_assoc($resultbobot)) {
                                ?>
                                <tr>
                                    <td align="center"><?= $nobobot++ ?></td>
                                    <td><?= $rowbobot['jenis'] ?></td>
                                    <td align="center"><?= $rowbobot['nilai'] ?></td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </table>
                        </div>



                    </div>

                    <br><br>

                    <div class="row">

                        <div class="col-3">
                            <b>Tabel 3. Bobot Kriteria Berdasarkan Harga</b> <br>
                            <table border="1">
                                <tr align="center" bgcolor="yellow">
                                    <td><b>No</b></td>
                                    <td><b>Harga</b></td>
                                    <td><b>Bobot</b></td>
                                </tr>
                                <tr>
                                    <td align="center">5</td>
                                    <td>
                                        <= 20.000</td>
                                    <td align="center">5</td>
                                </tr>
                                <tr>
                                    <td align="center">4</td>
                                    <td>>= 21.000 & <= 40.000</td>
                                    <td align="center">4</td>
                                </tr>
                                <tr>
                                    <td align="center">3</td>
                                    <td>>= 41.000 & <= 60.000</td>
                                    <td align="center">3</td>
                                </tr>
                                <tr>
                                    <td align="center">2</td>
                                    <td>>= 61.000 & <= 90.000</td>
                                    <td align="center">2</td>
                                </tr>
                                <tr>
                                    <td align="center">1</td>
                                    <td>>= 91.000 & <= 100.000</td>
                                    <td align="center">1</td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-3">
                            <b>Tabel 4. Bobot Kriteria Berdasarkan Rasa</b> <br>
                            <table border="1">
                                <tr align="center" bgcolor="yellow">
                                    <td><b>No</b></td>
                                    <td><b>Rasa</b></td>
                                    <td><b>Bobot</b></td>
                                </tr>
                                <tr>
                                    <td align="center">1</td>
                                    <td>
                                        <= 20</td>
                                    <td align="center">1</td>
                                </tr>
                                <tr>
                                    <td align="center">2</td>
                                    <td>>= 21 & <= 40</td>
                                    <td align="center">2</td>
                                </tr>
                                <tr>
                                    <td align="center">3</td>
                                    <td>>= 41 & <= 60</td>
                                    <td align="center">3</td>
                                </tr>
                                <tr>
                                    <td align="center">4</td>
                                    <td>>= 61 & <= 80</td>
                                    <td align="center">4</td>
                                </tr>
                                <tr>
                                    <td align="center">5</td>
                                    <td>>= 81 & <= 100</td>
                                    <td align="center">5</td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-3">
                            <b>Tabel 5. Bobot Kriteria Berdasarkan Kebersihan</b> <br>
                            <table border="1">
                                <tr align="center" bgcolor="yellow">
                                    <td><b>No</b></td>
                                    <td><b>Kebersihan</b></td>
                                    <td><b>Bobot</b></td>
                                </tr>
                                <tr>
                                    <td align="center">1</td>
                                    <td>
                                        <= 20</td>
                                    <td align="center">1</td>
                                </tr>
                                <tr>
                                    <td align="center">2</td>
                                    <td>>= 21 & <= 40</td>
                                    <td align="center">2</td>
                                </tr>
                                <tr>
                                    <td align="center">3</td>
                                    <td>>= 41 & <= 60</td>
                                    <td align="center">3</td>
                                </tr>
                                <tr>
                                    <td align="center">4</td>
                                    <td>>= 61 & <= 80</td>
                                    <td align="center">4</td>
                                </tr>
                                <tr>
                                    <td align="center">5</td>
                                    <td>>= 81 & <= 100</td>
                                    <td align="center">5</td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-3">
                            <b>Tabel 6. Bobot Kriteria Berdasarkan Pelayanan</b> <br>
                            <table border="1">
                                <tr align="center" bgcolor="yellow">
                                    <td><b>No</b></td>
                                    <td><b>Pelayanan</b></td>
                                    <td><b>Bobot</b></td>
                                </tr>
                                <tr>
                                    <td align="center">1</td>
                                    <td>
                                        <= 20</td>
                                    <td align="center">1</td>
                                </tr>
                                <tr>
                                    <td align="center">2</td>
                                    <td>>= 21 & <= 40</td>
                                    <td align="center">2</td>
                                </tr>
                                <tr>
                                    <td align="center">3</td>
                                    <td>>= 41 & <= 60</td>
                                    <td align="center">3</td>
                                </tr>
                                <tr>
                                    <td align="center">4</td>
                                    <td>>= 61 & <= 80</td>
                                    <td align="center">4</td>
                                </tr>
                                <tr>
                                    <td align="center">5</td>
                                    <td>>= 81 & <= 100</td>
                                    <td align="center">5</td>
                                </tr>
                            </table>
                        </div>



                    </div>

                    <br>

                </div>

                <div class="row">
                    <div class="col"><b>B. Analisis Kasus dengan Metode SAW</b></div>
                </div>
                <br>

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-3">
                            <b>Tabel 7. Rating Kecocokan Alternatif</b> <br>
                            <table border="1">
                                <tr align="center" bgcolor="yellow">
                                    <td><b>Alternatif</b></td>
                                    <td><b>Harga <br> C1</b></td>
                                    <td><b>Rasa <br> C2</b></td>
                                    <td><b>Kebersihan <br> C3</b></td>
                                    <td><b>Pelayanan <br> C4</b></td>
                                </tr>
                                <?php
                                $sqlmenu = "SELECT * FROM daftarmenu";
                                $resulmenu = mysqli_query($conn, $sqlmenu);
                                if (mysqli_num_rows($resulmenu) > 0) {
                                    // output data of each row
                                    while ($rowmenu = mysqli_fetch_assoc($resulmenu)) {
                                ?>
                                <tr>
                                    <td><?= $rowmenu['menunama'] ?></td>
                                    <td align="center"><?= $rowmenu['n_harga'] ?></td>
                                    <td align="center"><?= $rowmenu['n_rasa'] ?></td>
                                    <td align="center"><?= $rowmenu['n_kebersihan'] ?></td>
                                    <td align="center"><?= $rowmenu['n_pelayanan'] ?></td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </table>
                        </div>

                        <div class="col-3">
                            <b>Tabel 8. Bobot Preferensi (W)</b> <br>
                            <table border="1">
                                <tr align="center" bgcolor="yellow">
                                    <td><b>Kriteria</b></td>
                                    <td><b>Bobot</b></td>
                                    <td><b>Atribut</b></td>
                                </tr>
                                <?php
                                $sql_bp = "SELECT * FROM kriteria JOIN bobot ON kriteria.bobot=bobot.bobotid";
                                $result_bp = mysqli_query($conn, $sql_bp);
                                if (mysqli_num_rows($result_bp) > 0) {
                                    // output data of each row
                                    while ($row_bp = mysqli_fetch_assoc($result_bp)) {
                                ?>
                                <tr>
                                    <td><?= $row_bp['kriteria'] ?></td>
                                    <td align="center"><?= $row_bp['nilai'] ?></td>
                                    <td align="center"><?= $row_bp['atribut'] ?></td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </table>
                        </div>



                    </div>

                </div>

                <br>

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-3">
                            <center><b>Matrik Keputusan Berdasarkan Kriteria :</b></center> <br>
                            <table width="70%">
                                <tr>
                                    <td valign="center" align="center">X = </td>
                                    <td>

                                        <table width="100%">
                                            <?php
                                            $sqlmenu = "SELECT * FROM daftarmenu";
                                            $resulmenu = mysqli_query($conn, $sqlmenu);
                                            if (mysqli_num_rows($resulmenu) > 0) {
                                                // output data of each row
                                                while ($rowmenu = mysqli_fetch_assoc($resulmenu)) {
                                            ?>
                                            <tr>
                                                <td align="center">| <?= $rowmenu['n_harga'] ?></td>
                                                <td align="center"><?= $rowmenu['n_rasa'] ?></td>
                                                <td align="center"><?= $rowmenu['n_kebersihan'] ?></td>
                                                <td align="center"><?= $rowmenu['n_pelayanan'] ?> |</td>
                                            </tr>
                                            <?php
                                                }
                                            } else {
                                                echo "0 results";
                                            }
                                            ?>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                        </div>

                        <div class="col-3">
                            <center><b>Nilai Total Matrik Ternormalisasi :</b></center> <br>
                            <table width="70%">
                                <tr>
                                    <td valign="center" align="center">R = </td>
                                    <td>

                                        <table width="100%">
                                            <?php

                                            // nilai min/max harga
                                            $r_harga = mysqli_query($conn, "SELECT * FROM kriteria WHERE kriteria='Harga' ");
                                            $r_resultharga =  mysqli_fetch_array($r_harga);

                                            if ($r_resultharga['atribut'] == "Benefit") {
                                                $r_sqlmaxharga = mysqli_query($conn, "SELECT MAX(n_harga) AS 'k_harga' FROM daftarmenu");
                                                $r_minmaxharga = mysqli_fetch_array($r_sqlmaxharga);
                                                $nr_minmaxharga = $r_minmaxharga['k_harga'];
                                            } else if ($r_resultharga['atribut'] == "Cost") {
                                                $sqlminharga = mysqli_query($conn, "SELECT MIN(n_harga) AS 'k_harga' FROM daftarmenu");
                                                $r_minmaxharga = mysqli_fetch_array($sqlminharga);
                                                $nr_minmaxharga = $r_minmaxharga['k_harga'];
                                            } else {
                                                $nr_minmaxharga = 0;
                                            }





                                            // nilai min/max rasa
                                            $r_rasa = mysqli_query($conn, "SELECT * FROM kriteria WHERE kriteria='Rasa' ");
                                            $r_resultrasa =  mysqli_fetch_array($r_rasa);

                                            if ($r_resultrasa['atribut'] == "Benefit") {
                                                $r_sqlmaxrasa = mysqli_query($conn, "SELECT MAX(n_rasa) AS 'k_rasa' FROM daftarmenu");
                                                $r_minmaxrasa = mysqli_fetch_array($r_sqlmaxrasa);
                                                $nr_minmaxrasa = $r_minmaxrasa['k_rasa'];
                                            } else if ($r_resultrasa['atribut'] == "Cost") {
                                                $sqlminrasa = mysqli_query($conn, "SELECT MIN(n_rasa) AS 'k_rasa' FROM daftarmenu");
                                                $r_minmaxrasa = mysqli_fetch_array($sqlminrasa);
                                                $nr_minmaxrasa = $r_minmaxrasa['k_rasa'];
                                            } else {
                                                $nr_minmaxrasa = 0;
                                            }

                                            // nilai min/max kebersihan
                                            $r_kebersihan = mysqli_query($conn, "SELECT * FROM kriteria WHERE kriteria='Kebersihan' ");
                                            $r_resultkebersihan =  mysqli_fetch_array($r_kebersihan);

                                            if ($r_resultkebersihan['atribut'] == "Benefit") {
                                                $r_sqlmaxkebersihan = mysqli_query($conn, "SELECT MAX(n_kebersihan) AS 'k_kebersihan' FROM daftarmenu");
                                                $r_minmaxkebersihan = mysqli_fetch_array($r_sqlmaxkebersihan);
                                                $nr_minmaxkebersihan = $r_minmaxkebersihan['k_kebersihan'];
                                            } else if ($r_resultkebersihan['atribut'] == "Cost") {
                                                $sqlminkebersihan = mysqli_query($conn, "SELECT MIN(n_kebersihan) AS 'k_kebersihan' FROM daftarmenu");
                                                $r_minmaxkebersihan = mysqli_fetch_array($sqlminkebersihan);
                                                $nr_minmaxkebersihan = $r_minmaxkebersihan['k_kebersihan'];
                                            } else {
                                                $nr_minmaxkebersihan = 0;
                                            }

                                            // nilai min/max pelayanan
                                            $r_pelayanan = mysqli_query($conn, "SELECT * FROM kriteria WHERE kriteria='Pelayanan' ");
                                            $r_resultpelayanan =  mysqli_fetch_array($r_pelayanan);

                                            if ($r_resultpelayanan['atribut'] == "Benefit") {
                                                $r_sqlmaxpelayanan = mysqli_query($conn, "SELECT MAX(n_pelayanan) AS 'k_pelayanan' FROM daftarmenu");
                                                $r_minmaxpelayanan = mysqli_fetch_array($r_sqlmaxpelayanan);
                                                $nr_minmaxpelayanan = $r_minmaxpelayanan['k_pelayanan'];
                                            } else if ($r_resultpelayanan['atribut'] == "Cost") {
                                                $sqlminpelayanan = mysqli_query($conn, "SELECT MIN(n_pelayanan) AS 'k_pelayanan' FROM daftarmenu");
                                                $r_minmaxpelayanan = mysqli_fetch_array($sqlminpelayanan);
                                                $nr_minmaxpelayanan = $r_minmaxpelayanan['k_pelayanan'];
                                            } else {
                                                $nr_minmaxpelayanan = 0;
                                            }


                                            $sqlmenu = "SELECT * FROM daftarmenu";
                                            $resulmenu = mysqli_query($conn, $sqlmenu);
                                            if (mysqli_num_rows($resulmenu) > 0) {
                                                // output data of each row
                                                while ($rowmenu = mysqli_fetch_assoc($resulmenu)) {



                                            ?>
                                            <tr>
                                                <td align="center">
                                                    |
                                                    <?php
                                                            if ($nr_minmaxharga == 0) {
                                                                $nr_minmaxhrg = 1;
                                                            } else {
                                                                $nr_minmaxhrg = $nr_minmaxharga;
                                                            }
                                                            ?>
                                                    <?= $rowmenu['n_harga'] / $nr_minmaxhrg ?>
                                                </td>
                                                <td align="center">
                                                    <?php
                                                            if ($nr_minmaxrasa == 0) {
                                                                $nr_minmaxtaste = 1;
                                                            } else {
                                                                $nr_minmaxtaste = $nr_minmaxrasa;
                                                            }
                                                            ?>
                                                    <?= $rowmenu['n_rasa'] / $nr_minmaxtaste ?>
                                                </td>
                                                <td align="center">
                                                    <?php
                                                            if ($nr_minmaxkebersihan == 0) {
                                                                $nr_minmaxbersih = 1;
                                                            } else {
                                                                $nr_minmaxbersih = $nr_minmaxkebersihan;
                                                            }
                                                            ?>
                                                    <?= $rowmenu['n_kebersihan'] / $nr_minmaxbersih ?>
                                                </td>
                                                <td align="center">
                                                    <?php
                                                            if ($nr_minmaxpelayanan == 0) {
                                                                $nr_minmaxpelayan = 1;
                                                            } else {
                                                                $nr_minmaxpelayan = $nr_minmaxpelayanan;
                                                            }
                                                            ?>
                                                    <?= $rowmenu['n_pelayanan'] / $nr_minmaxpelayan ?>
                                                    |
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            } else {
                                                echo "0 results";
                                            }
                                            ?>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                        </div>

                        <div class="col-6">
                            <center><b>Selanjutnya melakukan proses perankingan dengan cara
                                    mengalikan matrik ternormalisasi (R) dengan nilai
                                    bobot (W), :</b></center> <br>

                            <table width="100%" border="1">
                                <tr align="center" bgcolor="yellow">
                                    <td><b>Menu</b></td>
                                    <td><b>Perangkingan = Harga + Rasa + Kebersihan + Pelayangan</b></td>
                                    <td><b>Nilai Rangking</b></td>
                                </tr>
                                <?php

                                // nilai min/max harga
                                $wr_harga = mysqli_query($conn, "SELECT * FROM kriteria JOIN bobot ON kriteria.bobot=bobot.bobotid WHERE kriteria.kriteria='Harga' ");
                                $wr_resultharga =  mysqli_fetch_array($wr_harga);

                                if ($wr_resultharga['atribut'] == "Benefit") {
                                    $wr_sqlmaxharga = mysqli_query($conn, "SELECT MAX(n_harga) AS 'k_harga' FROM daftarmenu");
                                    $wr_minmaxharga = mysqli_fetch_array($wr_sqlmaxharga);
                                    $wnr_bobotharga = $wr_resultharga['nilai'];
                                    $wnr_minmaxharga = $wr_minmaxharga['k_harga'];
                                } else if ($wr_resultharga['atribut'] == "Cost") {
                                    $sqlminharga = mysqli_query($conn, "SELECT MIN(n_harga) AS 'k_harga' FROM daftarmenu");
                                    $wr_minmaxharga = mysqli_fetch_array($sqlminharga);
                                    $wnr_bobotharga = $wr_resultharga['nilai'];
                                    $wnr_minmaxharga = $wr_minmaxharga['k_harga'];
                                } else {
                                    $wnr_bobotharga = $wr_resultharga['nilai'];
                                    $wnr_minmaxharga = 0;
                                }





                                // nilai min/max rasa
                                $wr_rasa = mysqli_query($conn, "SELECT * FROM kriteria JOIN bobot ON kriteria.bobot=bobot.bobotid WHERE kriteria.kriteria='Rasa' ");
                                $wr_resultrasa =  mysqli_fetch_array($wr_rasa);

                                if ($wr_resultrasa['atribut'] == "Benefit") {
                                    $wr_sqlmaxrasa = mysqli_query($conn, "SELECT MAX(n_rasa) AS 'k_rasa' FROM daftarmenu");
                                    $wr_minmaxrasa = mysqli_fetch_array($wr_sqlmaxrasa);
                                    $wnr_bobotrasa = $wr_resultrasa['nilai'];
                                    $wnr_minmaxrasa = $wr_minmaxrasa['k_rasa'];
                                } else if ($wr_resultrasa['atribut'] == "Cost") {
                                    $sqlminrasa = mysqli_query($conn, "SELECT MIN(n_rasa) AS 'k_rasa' FROM daftarmenu");
                                    $wr_minmaxrasa = mysqli_fetch_array($sqlminrasa);
                                    $wnr_bobotrasa = $wr_resultrasa['nilai'];
                                    $wnr_minmaxrasa = $wr_minmaxrasa['k_rasa'];
                                } else {
                                    $wnr_bobotrasa = $wr_resultrasa['nilai'];
                                    $wnr_minmaxrasa = 0;
                                }

                                // nilai min/max kebersihan
                                $wr_kebersihan = mysqli_query($conn, "SELECT * FROM kriteria JOIN bobot ON kriteria.bobot=bobot.bobotid WHERE kriteria.kriteria='Kebersihan' ");
                                $wr_resultkebersihan =  mysqli_fetch_array($wr_kebersihan);

                                if ($wr_resultkebersihan['atribut'] == "Benefit") {
                                    $wr_sqlmaxkebersihan = mysqli_query($conn, "SELECT MAX(n_kebersihan) AS 'k_kebersihan' FROM daftarmenu");
                                    $wr_minmaxkebersihan = mysqli_fetch_array($wr_sqlmaxkebersihan);
                                    $wnr_bobotkebersihan = $wr_resultkebersihan['nilai'];
                                    $wnr_minmaxkebersihan = $wr_minmaxkebersihan['k_kebersihan'];
                                } else if ($wr_resultkebersihan['atribut'] == "Cost") {
                                    $sqlminkebersihan = mysqli_query($conn, "SELECT MIN(n_kebersihan) AS 'k_kebersihan' FROM daftarmenu");
                                    $wr_minmaxkebersihan = mysqli_fetch_array($sqlminkebersihan);
                                    $wnr_bobotkebersihan = $wr_resultkebersihan['nilai'];
                                    $wnr_minmaxkebersihan = $wr_minmaxkebersihan['k_kebersihan'];
                                } else {
                                    $wnr_bobotkebersihan = $wr_resultkebersihan['nilai'];
                                    $wnr_minmaxkebersihan = 0;
                                }

                                // nilai min/max pelayanan
                                $wr_pelayanan = mysqli_query($conn, "SELECT * FROM kriteria JOIN bobot ON kriteria.bobot=bobot.bobotid WHERE kriteria.kriteria='Pelayanan' ");
                                $wr_resultpelayanan =  mysqli_fetch_array($wr_pelayanan);

                                if ($wr_resultpelayanan['atribut'] == "Benefit") {
                                    $wr_sqlmaxpelayanan = mysqli_query($conn, "SELECT MAX(n_pelayanan) AS 'k_pelayanan' FROM daftarmenu");
                                    $wr_minmaxpelayanan = mysqli_fetch_array($wr_sqlmaxpelayanan);
                                    $wnr_bobotpelayanan = $wr_resultpelayanan['nilai'];
                                    $wnr_minmaxpelayanan = $wr_minmaxpelayanan['k_pelayanan'];
                                } else if ($wr_resultpelayanan['atribut'] == "Cost") {
                                    $sqlminpelayanan = mysqli_query($conn, "SELECT MIN(n_pelayanan) AS 'k_pelayanan' FROM daftarmenu");
                                    $wr_minmaxpelayanan = mysqli_fetch_array($sqlminpelayanan);
                                    $wnr_bobotpelayanan = $wr_resultpelayanan['nilai'];
                                    $wnr_minmaxpelayanan = $wr_minmaxpelayanan['k_pelayanan'];
                                } else {
                                    $wnr_bobotpelayanan = $wr_resultpelayanan['nilai'];
                                    $wnr_minmaxpelayanan = 0;
                                }


                                $w_sqlmenu = "SELECT * FROM daftarmenu";
                                $w_resulmenu = mysqli_query($conn, $w_sqlmenu);
                                if (mysqli_num_rows($w_resulmenu) > 0) {
                                    // output data of each row
                                    while ($w_rowmenu = mysqli_fetch_assoc($w_resulmenu)) {



                                ?>
                                <tr>
                                    <td><?= $w_rowmenu['menunama'] ?></td>
                                    <?php
                                            // minmax harga
                                            if ($wnr_minmaxharga == 0) {
                                                $wnr_minmaxhrg = 1;
                                            } else {
                                                $wnr_minmaxhrg = $wnr_minmaxharga;
                                            }

                                            // minmax rasa
                                            if ($wnr_minmaxrasa == 0) {
                                                $wnr_minmaxtaste = 1;
                                            } else {
                                                $wnr_minmaxtaste = $wnr_minmaxrasa;
                                            }

                                            // minmax kebersihan
                                            if ($wnr_minmaxkebersihan == 0) {
                                                $wnr_minmaxbersih = 1;
                                            } else {
                                                $wnr_minmaxbersih = $wnr_minmaxkebersihan;
                                            }

                                            // minmax pelayanan
                                            if ($wnr_minmaxpelayanan == 0) {
                                                $wnr_minmaxpelayan = 1;
                                            } else {
                                                $wnr_minmaxpelayan = $wnr_minmaxpelayanan;
                                            }

                                            ?>
                                    <td align="center">
                                        (<?= $wnr_bobotharga ?>) * (<?= $w_rowmenu['n_harga'] / $wnr_minmaxhrg ?>) +
                                        (<?= $wnr_bobotrasa ?>) * (<?= $w_rowmenu['n_rasa'] / $wnr_minmaxtaste ?>) +
                                        (<?= $wnr_bobotkebersihan ?>) *
                                        (<?= $w_rowmenu['n_kebersihan'] / $wnr_minmaxbersih ?>) +
                                        (<?= $wnr_bobotpelayanan ?>) *
                                        (<?= $w_rowmenu['n_pelayanan'] / $wnr_minmaxpelayan ?>) =
                                    </td>
                                    <td align="center">

                                        <?php

                                                $hasilrangking = ($wnr_bobotharga * ($w_rowmenu['n_harga'] / $wnr_minmaxhrg)) + ($wnr_bobotrasa * ($w_rowmenu['n_rasa'] / $wnr_minmaxtaste)) + ($wnr_bobotkebersihan * ($w_rowmenu['n_kebersihan'] / $wnr_minmaxbersih)) + ($wnr_bobotpelayanan * ($w_rowmenu['n_pelayanan'] / $wnr_minmaxpelayan));



                                                echo $hasilrangking;


                                                ?>
                                    </td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </table>

                        </div>



                    </div>

                </div>

























                <?php
                mysqli_close($conn);
                ?>

            </li>
        </ul>

    </div>

    <div class='card-footer'>
        <div class='row'>
            selesai
        </div>
    </div>

</div>


<?= $this->endSection('isi') ?>