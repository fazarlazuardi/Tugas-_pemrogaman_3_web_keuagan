<?php
ini_set('display_errors',1);
include 'koneksi.php';

$id_member = $_POST['x'];
$sql = "SELECT d.diskon FROM member m LEFT JOIN level l on l.id_level = m.id_level LEFT JOIN diskon d on d.id_level = l.id_level WHERE m.id_member = {$id_member}";
$result = mysqli_query($koneksi,$sql);
while($rows = mysqli_fetch_array($result))
{
    $data['Diskon'] = $rows["diskon"];
}
echo json_encode($data);

?>