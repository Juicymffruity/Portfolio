<?php
session_start();

$_SESSION['client_url'] = $_SERVER['REQUEST_URI'];

$servername = "localhost";
$username = "root";
$password = "";
$database = "form_user";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_title = "SELECT title FROM project WHERE id = 1";
$result_title = $conn->query($sql_title);

if ($result_title->num_rows > 0) {
    $row_title = $result_title->fetch_assoc();
    $project_title = htmlspecialchars($row_title['title']);
} else {
    $project_title = "Project Title";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>High Altitudes</title>
    <link rel="stylesheet" type="text/css" href="style_contactform.css">
    <script src="https://kit.fontawesome.com/f14a116e47.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style_project.css">
    <link rel="stylesheet" type="text/css" href="style_effects.css">
    <link rel="stylesheet" type="text/css" href="media_highaltitudes.css">
</head>

<body>
    <header class="header">
        <h1 id="louis">Louis</h1>
        <nav>
            <div class="right-links">
                <a class="btn" href="index.php #cv">About</a>
                <a class="btn" href="index.php #gallery">Creative</a>
                <a class="btn" href="contactform.php">Contact</a>
            </div>

            <div class="socials">
                <i class="fa-brands fa-instagram" id="insta"></i>
                <i class="fa-brands fa-youtube" id="yt"></i>
                <i class="fa-brands fa-twitter" id="twitter"></i>
            </div>
        </nav>
    </header>


    <div class="project-container transition-element">
        <div class="leaf" style="top: -50px; left: 20%; animation-duration: 8s;"></div>
        <div class="leaf" style="top: -50px; left: 40%; animation-duration: 10s;"></div>
        <div class="leaf" style="top: -50px; left: 60%; animation-duration: 12s;"></div>
        <div class="leaf" style="top: -50px; left: 70%; animation-duration: 8s;"></div>
        <div class="leaf" style="top: -50px; left: 80%; animation-duration: 15s;"></div>
        <div class="leaf" style="top: -50px; left: 90%; animation-duration: 19s;"></div>
        <div class="leaf" style="top: -50px; left: 50%; animation-duration: 20s;"></div>
        <div class="leaf" style="top: -50px; left: 20%; animation-duration: 5s;"></div>
        <div class="leaf" style="top: -50px; left: 70%; animation-duration: 23s;"></div>
        <div class="leaf" style="top: -50px; left: 90%; animation-duration: 30s;"></div>
        <div class="leaf" style="top: -50px; left: 20%; animation-duration: 5s;"></div>
        <h1 id="word2"><?php echo $project_title; ?></h1>

        <p>I love taking landscape and portraits photos, I love writing poetries. Combining these two I've created a visual poetry project I called "High Altitudes" showcasing a short verse of some of my written works.
            This project tells the untold stories witnessed by the majestic mountains, the whispering trees, and the timeless winds. It explores the depths of solitude, the vastness of wilderness and a forbidden love.
            A poetry of earth and the sky. High Altitudes, where stories find wings to soar, in nature's embrace forevermore.
        </p>
    </div><br><br>

    <div class="project-container transition-element">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "form_user";

        $conn = new mysqli($servername, $username, $password, $database);

        $sql_select = "SELECT image, title, description FROM user_photo";
        $result_select = $conn->query($sql_select);

        if ($result_select->num_rows > 0) {
            echo "<div class='uploaded-photos'>";
            echo "<table>";

            $count = 0;
            while ($row = $result_select->fetch_assoc()) {
                if ($count % 3 == 0) {
                    echo "<tr>";
                }
                echo "<td>";
                echo "<img src='Admin/uploads/" . $row["image"] . "' alt='Uploaded Image' data-title='" . htmlspecialchars($row["title"]) . "' data-description='" . rawurlencode($row["description"]) . "' class='transition-element'>";
                echo "</td>";
                $count++;
                if ($count % 3 == 0) {
                    echo "</tr>";
                    echo "<tr class='spacer-row'><td></td></tr>";
                }
            }

            if ($count % 3 != 0) {
                echo "</tr>";
                echo "<tr class='spacer-row'><td colspan='" . ($count % 3 == 1 ? '2' : '3') . "'></td></tr>";
            }

            echo "</table>";
            echo "</div>";
        } else {
            echo "<p>No photos uploaded yet.</p>";
        }

        $conn->close();

        ?>
    </div>

    <footer class="footer">
        <p>@ 2024 Louis. All rights reserved.</p>
    </footer>

    <div id="imageModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="post-container">
                <div class="post-image">
                    <img id="modalImage" src="" alt="Image">
                </div>
                <div class="post-details">
                    <h2 id="modalTitle"></h2>
                    <p id="modalDescription"></p>
                </div>
            </div>
        </div>

        <div class="navigation-buttons">
            <button id="prevButton">&lt;</button>
            <button id="nextButton">&gt;</button>
        </div>
    </div>

    <div id="arrow-up" class="hidden">&lt;
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.transition-element');
            elements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;

                if (elementTop < windowHeight * 0.9) {
                    element.classList.add('fade-in');
                }
            });

            window.addEventListener('scroll', () => {
                elements.forEach(element => {
                    const elementTop = element.getBoundingClientRect().top;
                    const windowHeight = window.innerHeight;

                    if (elementTop < windowHeight * 0.9) {
                        element.classList.add('fade-in');
                    } else {
                        element.classList.remove('fade-in');
                    }
                });
            });

            var arrowUp = document.getElementById('arrow-up');
            var scrollThreshold = 100;

            window.addEventListener('scroll', function() {
                if (window.scrollY > scrollThreshold) {
                    arrowUp.classList.remove('hidden');
                } else {
                    arrowUp.classList.add('hidden');
                }
            });

            var instagramIcon = document.getElementById("insta");
            instagramIcon.addEventListener("click", function() {
                window.open("https://www.instagram.com/juicymffruity", "_blank");
            });

            var youtubeIcon = document.getElementById("yt");
            youtubeIcon.addEventListener("click", function() {
                window.open("https://www.youtube.com/@juicymffruity", "_blank");
            });

            var twitterIcon = document.getElementById("twitter");
            twitterIcon.addEventListener("click", function() {
                window.open("https://www.twitter.com/louis232003", "_blank");
            });

            var h1Element = document.querySelector('.header h1');
            h1Element.addEventListener('click', function() {
                window.location.href = 'index.php';
            });

            var images = document.querySelectorAll('.uploaded-photos img');
            images.forEach(function(image) {
                image.addEventListener('click', function() {
                    var title = this.getAttribute('data-title');
                    var description = this.getAttribute('data-description');

                    var modal = document.getElementById('imageModal');
                    var modalImage = modal.querySelector('#modalImage');
                    var modalTitle = modal.querySelector('#modalTitle');
                    var modalDescription = modal.querySelector('#modalDescription');

                    modalImage.src = this.src;
                    modalTitle.textContent = title;
                    modalDescription.innerHTML = decodeURIComponent(description);
                    modal.style.display = 'block';
                });
            });

            var closeButtons = document.querySelectorAll('.close');
            closeButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var modal = document.getElementById('imageModal');
                    modal.style.display = 'none';
                });
            });

            document.getElementById('arrow-up').addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            var images = document.querySelectorAll('.uploaded-photos img');
            var modal = document.getElementById('imageModal');
            var modalImage = modal.querySelector('#modalImage');
            var modalTitle = modal.querySelector('#modalTitle');
            var modalDescription = modal.querySelector('#modalDescription');
            var currentIndex = 0;

            function displayImage(index) {
                var image = images[index];
                var title = image.getAttribute('data-title');
                var description = image.getAttribute('data-description');

                modalImage.src = image.src;
                modalTitle.textContent = title;
                modalDescription.innerHTML = decodeURIComponent(description);
            }

            images.forEach(function(image, index) {
                image.addEventListener('click', function() {
                    currentIndex = index;
                    displayImage(currentIndex);
                    modal.style.display = 'block';
                });
            });

            var prevButton = document.getElementById('prevButton');
            var nextButton = document.getElementById('nextButton');

            prevButton.addEventListener('click', function() {
                currentIndex = (currentIndex - 1 + images.length) % images.length;
                displayImage(currentIndex);
            });

            nextButton.addEventListener('click', function() {
                currentIndex = (currentIndex + 1) % images.length;
                displayImage(currentIndex);
            });
        });
    </script>
</body>

</html>