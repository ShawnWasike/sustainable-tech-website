<?php $page_title = "Gallery - Sustainable Tech"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'navigation.php'; ?>
    <main>
        <h1>Media Gallery</h1>
        <div class="gallery">
            <?php
            include 'db_connect.php';
            $stmt = $conn->query("SELECT * FROM media");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='card'>";
                echo "<p>{$row['caption']}</p>";
                if ($row['type'] == 'image') echo "<img src='{$row['url']}' alt='{$row['caption']}'>";
                if ($row['type'] == 'video') echo "<video controls><source src='{$row['url']}' type='video/mp4'></video>";
                echo "</div>";
            }
            ?>
        </div>
    </main>
    <footer>© 2025 Sustainable Tech</footer>
</body>
</html>