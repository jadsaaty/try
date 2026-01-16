<?php
require "admin_guard.php";
?>

<h2>Add / Update User Roles (Admin Only)</h2>

<form action="add_users_process.php" method="POST">
    <input type="email" name="email" placeholder="User Email" required><br><br>
    <select name="role">
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select><br><br>
    <button type="submit">Update Role</button>
</form>
