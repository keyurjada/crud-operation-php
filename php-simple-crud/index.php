<?php
include('config.php');
if (isset($_SESSION['user'])) header("Location: dashboard.php");
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = md5($_POST['password']);
    $res = $mys->query("SELECT * FROM users WHERE username='$user' AND password='$pass'");
    if ($res->num_rows) {
        $_SESSION['user'] = $user;
        if (!empty($_POST['remember'])) {
            setcookie("user", $user, time() + (86400 * 7));
        }
        header("Location: dashboard.php");
    } else {
        $msg = "Invalid login!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="col-md-4 offset-md-4">
      <div class="card shadow-lg">
        <div class="card-body">
          <h3 class="text-center mb-4">Login</h3>
          <form method="POST">
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" name="username" value="<?php echo $_COOKIE['user'] ?? ''; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-check mb-3">
              <input type="checkbox" name="remember" class="form-check-input" id="remember">
              <label for="remember" class="form-check-label">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
          </form>
          <?php if ($msg): ?>
            <div class="alert alert-danger mt-3 text-center"><?php echo $msg; ?></div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
