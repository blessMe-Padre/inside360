<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['count'])) {
        $count = $_POST['count'];
        $sql = "UPDATE counts SET count_value = ? WHERE id = 1";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("i", $count);
        $result = $stmt->execute();

        $stmt->close();

    } elseif (isset($_POST['reset'])) {
        $sql = "UPDATE counts SET count_value = 0 WHERE id = 1";
        $result = $connect->query($sql);

    } else {
        echo "Неверный запрос";
    }
} else {
    echo "Неверный метод запроса";
}

$connect->close();
?>