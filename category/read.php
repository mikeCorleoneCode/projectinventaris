<?php
require_once('connection.php');

$sql = 'SELECT * FROM categories';
$stmt = $conn->prepare($sql);

$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows >0){
    $data = array();

    while ($row = $result->fetch_assoc()){
        $data[] = $row;
    }
    echo json_encode($data);
}
else {
    echo "No items found";
}

$stmt->close();
$conn->close();