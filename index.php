<?php
session_start();
require 'jwt_helper.php';

// Проверка дали JWT токенот постои и е валиден
if (!isset($_SESSION['jwt']) || !decodeJWT($_SESSION['jwt'])) {
    header("Location: login.php");
    exit;
}
$db =new SQLite3(__DIR__ . '/db.sqlite');

$query= "SELECT * FROM expenses";
$result = $db->query($query);

if(!$result){
    die("error: " .$db->lastErrorMsg());
}
?>
<a href="add_form.php">
    Add Expense
</a>
<table >
    <thead >
    <tr>
        <th>ID</th>
        <th>name</th>
        <th>amount</th>
        <th>date</th>
        <th>payment_type</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php if ($result): ?>
        <?php while ($row= $result->fetchArray(SQLITE3_ASSOC)):?>
     <tr>
        <td><?php echo htmlspecialchars($row['id']); ?></td>
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td><?php echo htmlspecialchars($row['amount']); ?></td>
        <td><?php echo htmlspecialchars($row['date']); ?></td>
        <td><?php echo htmlspecialchars($row['payment_type']); ?></td>
        <td>
            <form action="delete.php" method="post" style="display: inline;">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <button type="submit">Delete</button>
            </form>
            <form action="update_form.php" method="get" style="display: inline;">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <button type="submit">Update</button>
            </form>
        </td>
    </tr>
        <?php endwhile; ?>
    <?php else:  ?>
    <tr>
        <td colspan="5"> Empty message</td>
    </tr>
    <?php endif; ?>
    </tbody>
</table>
