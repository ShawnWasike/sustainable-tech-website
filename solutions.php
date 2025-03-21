<?php $page_title = "Solutions - Sustainable Tech"; ?>
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
        <h1>Sustainable Solutions</h1>
        <div class="gallery">
            <?php
            include 'db_connect.php';
            if (isset($conn)) {
                try {
                    $stmt = $conn->query("SELECT * FROM solutions");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<div class='card'>";
                        echo "<h3>{$row['title']}</h3>";
                        echo "<p>{$row['description']}</p>";
                        if ($row['image_url']) echo "<img src='{$row['image_url']}' alt='{$row['title']}'>";
                        if ($row['video_url']) echo "<video controls><source src='{$row['video_url']}' type='video/mp4'></video>";
                        echo "</div>";
                    }
                } catch (PDOException $e) {
                    echo "<p>Unable to load solutions: " . $e->getMessage() . "</p>";
                }
            } else {
                echo "<p>Database connection not established.</p>";
            }
            ?>
        </div>
    </main>
    <footer>© 2025 Sustainable Tech</footer>
</body>
</html>