<?php
require_once __DIR__ . "/../../controllers/NoteController.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Notes</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
  <div class="max-w-3xl mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-2xl font-bold">Hello, <?= htmlspecialchars($_SESSION['username']) ?>!</h2>
      <a href="index.php?action=logout" class="text-red-500">Logout</a>
    </div>

    <a href="index.php?action=notes_create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">+ Add Note</a>

    <div class="mt-6 space-y-4">
      <?php foreach ($notes as $note): ?>
        <div class="bg-white p-4 rounded shadow flex justify-between">
          <div>
            <h3 class="text-lg font-semibold"><?= htmlspecialchars($note['title']) ?></h3>
            <p class="text-gray-700"><?= nl2br(htmlspecialchars($note['content'])) ?></p>
          </div>
          <div class="space-x-2">
            <a class="text-blue-500" href="index.php?action=notes_edit&id=<?= $note['id'] ?>">Edit</a>
            <a class="text-red-500" href="index.php?action=notes_delete&id=<?= $note['id'] ?>">Delete</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>
</html>
