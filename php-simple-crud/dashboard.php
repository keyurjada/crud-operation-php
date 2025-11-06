<?php
include('config.php');
if (!isset($_SESSION['user'])) header("Location: index.php");
$result = $mys->query("SELECT * FROM employees");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Employee Manager</a>
    <div class="d-flex">
      <a href="create.php" class="btn btn-success me-2">Add Employee</a>
      <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <h3 class="mb-3">Employee Records</h3>
  <table class="table table-striped table-bordered align-middle">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Salary</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= htmlspecialchars($row['id']) ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['address']) ?></td>
        <td><?= htmlspecialchars($row['salary']) ?></td>
        <td>
          <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this record?')">Delete</a>
        </td>
      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>
</div>
</body>
</html>
