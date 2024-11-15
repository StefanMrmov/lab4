
<form method="post" action="add.php">
    <label for="name">Name</label>
    <input type="text" id="name" name="name" required>
    <br/>

    <label for="date">Date</label>
    <input type="date" id="date" name="date" required>
    <br/>

    <label for="amount">Amount</label>
    <input type="number" id="amount" name="amount" required>
    <br/>

    <label for="payment_type">Payment Type</label>
    <select id="payment_type" name="payment_type" required>
        <option value="cash">Cash</option>
        <option value="card">Card</option>
    </select>

    <button type="submit">Good Job</button>
</form>