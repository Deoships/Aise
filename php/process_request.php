<?php
// Получение значения параметра request из URL
$requestNumber = $_GET["request"];

// Установка соединения с базой данных
$conn = mysqli_connect("localhost", "root", "", "aise");

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Выполнение запроса в зависимости от номера запроса
$queries = array(
    "SELECT * FROM Homes WHERE district_id = 1",
    "SELECT c.name AS client_name, t.name AS home_type, d.home_id FROM clients c
    INNER JOIN deals d ON c.id_clients = d.client_id
    INNER JOIN homes h ON d.home_id = h.id_homes
    INNER JOIN type t ON h.type_id = t.id_type
    WHERE t.name = 'одноэтажный'",
    "SELECT * FROM Deals WHERE agent_id = 1",
    "SELECT Homes.id_Homes, Homes.price, Agents.name FROM Homes
    JOIN Agents ON Homes.agent_id = Agents.id_agents",
    "SELECT Clients.name, Deals.deal_amount, Homes.id_Homes, Homes.district_id FROM Clients
    JOIN Deals ON Clients.id_clients = Deals.client_id
    JOIN Homes ON Deals.home_id = Homes.id_Homes
    WHERE Deals.deal_amount = 100000",
    "SELECT * FROM Homes WHERE sale_date < '2023-06-07' OR sale_date IS NULL",
    "SELECT Agents.name, SUM(Deals.deal_amount) AS total_deal_amount
    FROM Agents
    JOIN Deals ON Agents.id_agents = Deals.agent_id
    GROUP BY Agents.name",
    "SELECT * FROM Homes WHERE status_id = 1 AND type_id = 1",
    "SELECT * FROM Clients WHERE budget BETWEEN 1 AND 100000000",
    "SELECT id_Homes, rooms_id, area, status_id, price FROM Homes"
);

// Список столбцов для каждого запроса
$columns = array(
    array("id_homes", "price", "agent_id"),
    array("client_name", "home_type", "home_id"),
    array("id_deals", "home_id", "agent_id"),
    array("id_Homes", "price", "name"),
    array("name", "deal_amount", "id_Homes", "district_id"),
    array("id_homes", "rooms_id", "area", "status_id", "price"),
    array("name", "total_deal_amount"),
    array("id_homes", "status_id", "type_id"),
    array("id_clients", "name", "budget"),
    array("id_Homes", "rooms_id", "area", "status_id", "price")
);

// Проверка валидности номера запроса
if ($requestNumber >= 1 && $requestNumber <= count($queries)) {
    $sql = $queries[$requestNumber - 1];

    $result = $conn->query($sql);

    // Обработка результата запроса
    if ($result->num_rows > 0) {
        // Вывод заголовка запроса
        echo "<h2>Запрос $requestNumber</h2>";

        // Вывод результатов запроса
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            // Вывод соответствующих столбцов для каждого запроса
            $columnNames = $columns[$requestNumber - 1];
            echo "<li>";
            foreach ($columnNames as $columnName) {
                echo "$columnName: " . $row[$columnName] . ", ";
            }
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "Нет результатов";
    }
} else {
    echo "Неверный номер запроса";
}

$conn->close();
?>
