<?php
// Simple local form handler for XAMPP testing.
// It saves submissions to a local file and returns a simple HTML response.

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /landing_pages/');
    exit;
}

$name = isset($_POST['name']) ? strip_tags(trim($_POST['name'])) : '';
$email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';
$message = isset($_POST['message']) ? strip_tags(trim($_POST['message'])) : '';

$errors = [];
if (empty($name)) $errors[] = 'Name is required.';
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email is required.';

if (!empty($errors)) {
    echo "<h1>Submission error</h1><p>" . implode('<br>', $errors) . "</p><p><a href=\"/landing_pages/\">Back</a></p>";
    exit;
}

$entry = [
    'time' => date('c'),
    'name' => $name,
    'email' => $email,
    'message' => $message
];

$log = __DIR__ . '/submissions.log';
file_put_contents($log, json_encode($entry) . PHP_EOL, FILE_APPEND | LOCK_EX);

// Show simple thank you page with a link back
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Thanks — Awesome</title>
    <link rel="stylesheet" href="assets/css/styles.css" />
  </head>
  <body>
    <main class="container">
      <h1>Thanks, <?= htmlspecialchars($name) ?>!</h1>
      <p>We've received your request. We'll be in touch at <?= htmlspecialchars($email) ?>.</p>
      <p><a class="btn" href="/landing_pages/">Back to site</a></p>
    </main>
  </body>
</html>
