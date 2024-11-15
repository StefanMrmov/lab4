<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $payment_type = $_POST['payment_type'];

    $db = new Sqlite3(__DIR__ . '/db.sqlite');

    $stmt = $db->prepare("INSERT INTO expenses (name, date,amount, payment_type) VALUES (:name, :date, :amount, :payment_type)");
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':date', $date);
    $stmt->bindValue(':amount', $amount);
    $stmt->bindValue(':payment_type', $payment_type);

    if($stmt->execute()){
        header('Location: index.php');
    }else{
        echo "Error" . $db->lastErrorMsg();
    }
    $db->close();


}else{
    echo "error";
}
?>