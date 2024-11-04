<?php 
$koneksi = mysqli_connect("localhost","root","","markers");
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

$sql = "SELECT * FROM markers";
    $result = $koneksi->query($sql);
    if ($result->num_rows > 0) {
        echo "<table border='1px'><tr>
        <th>Lokasi</th>
        <th>Longitude</th>
        <th>Latitude</th>";
    }
    // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . 
                $row["Lokasi"] . "</td><td>" .
                $row["Longitude"] . "</td><td>" .
                $row["Latitude"] . "</td><td>" .
                "</td></tr>";
        }
?>