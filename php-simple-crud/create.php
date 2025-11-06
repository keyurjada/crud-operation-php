<?php
include('config.php');
if (!isset($_SESSION['user'])) header("Location: index.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];
    $mys->query("INSERT INTO employees (name, address, salary) VALUES ('$name', '$address', '$salary')");
    header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Employee</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="col-md-6 offset-md-3">
    <div class="card shadow-lg">
      <div class="card-body">
        <h3 class="mb-4 text-center">Add New Employee</h3>
        <form method="POST">
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" name="address" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Salary</label>
            <input type="number" name="salary" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary w-100">Save</button>
          <a href="dashboard.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
