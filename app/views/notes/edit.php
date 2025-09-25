<?php
require_once __DIR__ . "/../../controllers/NoteController.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Note</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <div class="bg-white p-6 rounded shadow w-96">
    <h2 class="text-2xl font-bold mb-4">Edit Note</h2>
    <form method="post" class="space-y-4">
      <input class="border rounded w-full p-2" type="text" name="title" value="<?= htmlspecialchars($note['title']) ?>" required>
      <textarea class="border rounded w-full p-2" name="content" required><?= htmlspecialchars($note['content']) ?></textarea>
      <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 w-full">Update</button>
    </form>
    <a href="index.php?action=notes" class="block mt-4 text-blue-500">Back to Notes</a>
  </div>
</body>
</html>
