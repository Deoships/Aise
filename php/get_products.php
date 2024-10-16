<?php
// Подключение к базе данных
$conn = mysqli_connect("localhost", "root", "", "aise");

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Получение списка продуктов
$sql = "SELECT * FROM `Product`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Название</th><th>Цена</th><th>Описание</th><th>Изображение</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td>" . $row['img'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Нет доступных продуктов.";
}

$conn->close();
?>
