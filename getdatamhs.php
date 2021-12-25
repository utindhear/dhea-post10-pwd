<?php
    //Panggil file untuk koneksi ke database
    include "koneksi.php";
    
    if(!empty($_GET['cari'])){
        $sql = "SELECT * FROM mahasiswa WHERE nim = '" . $_GET['cari'] . "';";
    } else {
        $sql = "SELECT * FROM mahasiswa";
    }
    // Jalankan query
    $query = mysqli_query($con,$sql);

    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = $row;
    }
    header('content-type: application/json');
    
    echo json_encode($data);

    // menutup koneksi
    mysqli_close($con);
?>