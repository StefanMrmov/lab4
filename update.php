<?php
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])){
    $id= intval($_POST["id"]);
    $name = $_POST['name'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $payment_type = $_POST['payment_type'];

    $db = new Sqlite3(__DIR__ . '/db.sqlite');

    $query= "UPDATE expenses SET name = :name, date = :date, amount = :amount, payment_type = :payment_type WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':date', $date);
    $stmt->bindValue(':amount', $amount);
    $stmt->bindValue(':payment_type', $payment_type);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $db->close();
    header("Location: index.php");
    exit();

}else{
    echo "FAIL";
}
?>