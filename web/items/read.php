<?php
require_once('connection.php');

$res = array();

try {
    $sql = 'SELECT * FROM items';
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        throw new Exception("Error in SQL query: " . $conn->error);
    }

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = array();

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $res['success'] = true;
        $res['data'] = $data;
    } else {
        $res['success'] = false;
        $res['message'] = "No items found";
    }

    $stmt->close();
} catch (Exception $e) {
    $res['success'] = false;
    $res['message'] = "Error: " . $e->getMessage();
}

// Set appropriate HTTP headers
header('Content-Type: application/json');
echo json_encode($res);

$conn->close();