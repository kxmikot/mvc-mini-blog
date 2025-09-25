<?php
require_once __DIR__ . "/../../controllers/AuthController.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
  <div class="bg-white p-8 rounded shadow-md w-96">
    <h2 class="text-2xl font-bold mb-4">Register</h2>

    <?php if (!empty($error)): ?>
      <div class="text-red-500"><?= $error ?></div>
    <?php endif; ?>

    <form method="post" class="space-y-4">
      <input class="border rounded w-full p-2" type="text" name="username" placeholder="Username" required>
      <input class="border rounded w-full p-2" type="email" name="email" placeholder="Email" required>
      <input class="border rounded w-full p-2" type="password" name="password" placeholder="Password" required>
      <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 w-full">Register</button>
    </form>
    <p class="text-sm mt-4">Already have an account? 
      <a class="text-blue-500" href="index.php?action=login">Login</a>
    </p>
  </div>
</body>
</html>
