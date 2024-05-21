<?php
header('Content-Type: application/json');

// Подключение файла конфигурации
require_once 'dbConfig.php';

// Получение даты из GET-запроса
$date = isset($_GET['date']) ? $_GET['date'] : null;

if ($date) {
    try {
        $conn = getDBConnection();
        $sql = "SELECT date, revenue, cash, cashless, credit_cards, average_receipt, average_guest, removal_after_payment, removal_before_payment, number_of_receipts, number_of_guests FROM metrics WHERE date = :date";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode(array("message" => "No data found for the given date"));
        }
    } catch (PDOException $e) {
        // Логирование ошибок для отладки
        error_log("Database error: " . $e->getMessage());
        echo json_encode(array("error" => "Database error. Please try again later."));
    }
} else {
    echo json_encode(array("message" => "Date parameter is required"));
}
