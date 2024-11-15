<?php

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $db = new Sqlite3(__DIR__ . '/db.sqlite');

    // Fetch the current details of the student
    $stmt = $db->prepare("SELECT * FROM expenses WHERE id = :id");
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $result = $stmt->execute();
    $expense = $result->fetchArray(SQLITE3_ASSOC);

    $db->close();
} else {
    die("Invalid expense ID.");
}
?>
<form method="post" action="update.php">
    <input type="hidden" name="id" value="<?php echo $expense['id']; ?>">
    <label for="name">Name</label>
    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($expense['name']); ?>" required>
    <br/>
    <label for="date">Date</label>
    <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($expense['date']); ?>" required>
    <br/>
    <label for="amount">Amount</label>
    <input type="number" id="amount" name="amount" value="<?php echo htmlspecialchars($expense['amount']); ?>" required>
    <br/>
    <label for="payment_type">Payment_type</label>
  <select id="payment_type" name="payment_type" required>
      <option value="cash" <?php echo ($expense['payment_type'] === 'cash') ? 'selected' : '' ?> >Cash</option>
      <option value="card" <?php echo ($expense['payment_type'] === 'card') ? 'selected' : '' ?>>Card</option>
  </select>
    <button type="submit">Submit</button>
    <br/>
</form>

