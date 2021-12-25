<?php
    $search='NIM';
    if(isset($_POST['submit'])){
        $search = empty($_POST['cari']) ? 'NIM' : strtoupper($_POST['cari']);
        $url = "http://localhost/post10_pwd/getdatamhs.php?cari=" . $_POST['cari'];
        error_reporting(0);
    } else {
        $url = "http://localhost/post10_pwd/getdatamhs.php";
    }
?>

<div>
    <h3>Cari Mahasiswa [<?=$search?>]</h3>
    <form action="#" method="POST">
        <input name='cari' type="text">
        <button name='submit'> Cari </button>
    </form>
</div>

<?php
    $client = curl_init($url);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($client);
    $result = json_decode($response);
    foreach ($result as $r) {
        echo "<p>";
        echo "NIM : " . $r->nim . "<br />";
        echo "Nama : " . $r->nama . "<br />";
        echo "jenis kel : " . $r->jkel . "<br />";
        echo "Alamat : " . $r->alamat . "<br />";
        echo "Tgl Lahir : " . $r->tgllhr . "<br />";
        echo "</p>";
    }
