<?php $page_title = "Home - Sustainable Tech"; ?>
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
        <header class="home-hero">
            <h1>Innovating for a Greener Future</h1>
            <p>Discover how technology is transforming sustainability—one breakthrough at a time.</p>
            <a href="solutions.php" class="home-hero-button">Explore Solutions</a>
        </header>

        <section class="home-intro">
            <h2>Welcome to Sustainable Tech</h2>
            <p>
                The world stands at a crossroads. Climate change, resource scarcity, and pollution threaten our planet, but hope lies in innovation. At Sustainable Tech, we’re your gateway to the latest advancements in eco-friendly technology. From solar-powered cities to biodegradable plastics, we spotlight the solutions that are redefining how we live, work, and thrive—without costing the Earth.
            </p>
            <p>
                Whether you’re an eco-enthusiast, a tech innovator, or just curious about a sustainable future, this is your hub for inspiration and action. Let’s build a world where progress and preservation go hand in hand.
            </p>
        </section>

        <section class="home-featured">
            <h2>Featured Solution</h2>
            <?php
            include 'db_connect.php';
            if (isset($conn)) {
                try {
                    $stmt = $conn->query("SELECT title, description, image_url FROM solutions ORDER BY RAND() LIMIT 1");
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($row) {
                        echo "<div class='home-featured-card'>";
                        echo "<h3>{$row['title']}</h3>";
                        echo "<p>{$row['description']}</p>";
                        if ($row['image_url']) {
                            echo "<img src='{$row['image_url']}' alt='{$row['title']}'>";
                        }
                        echo "<a href='solutions.php' class='home-learn-more'>Learn More</a>";
                        echo "</div>";
                    } else {
                        echo "<p>No featured solutions available yet.</p>";
                    }
                } catch (PDOException $e) {
                    echo "<p>Unable to load featured solution: " . $e->getMessage() . "</p>";
                }
            } else {
                echo "<p>Database connection not established.</p>";
            }
            ?>
        </section>

        <section class="home-highlights">
            <h2>Key Areas of Impact</h2>
            <div class="home-highlight-grid">
                <div class="home-highlight-item">
                    <h3>Renewable Energy</h3>
                    <p>Powering the world with sun, wind, and water—clean energy for all.</p>
                </div>
                <div class="home-highlight-item">
                    <h3>Eco Materials</h3>
                    <p>From biodegradable packaging to sustainable construction, materials matter.</p>
                </div>
                <div class="home-highlight-item">
                    <h3>Smart Mobility</h3>
                    <p>Electric vehicles and green transport systems to move us forward.</p>
                </div>
            </div>
        </section>
    </main>
    <footer>© 2025 Sustainable Tech</footer>
</body>
</html>