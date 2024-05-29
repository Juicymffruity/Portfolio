<?php
session_start();

$_SESSION['client_url'] = $_SERVER['REQUEST_URI'];

$error = false;
$error_message1 = $error_message2 = $error_message_recaptcha = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate first name
    if (!preg_match("/^[a-zA-Z\s]+$/", $_POST["first_name"])) {
        $error = true;
        $error_message1 = "Only letters are allowed in the first name.";
    } else {
        $first_name = htmlspecialchars($_POST["first_name"]);
    }

    // Validate last name
    if (!preg_match("/^[a-zA-Z]+$/", $_POST["last_name"])) {
        $error = true;
        $error_message2 = "Only letters are allowed in the last name.";
    } else {
        $last_name = htmlspecialchars($_POST["last_name"]);
    }

    if (!$error) {
        // Database connection and prepared statements as shown above
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "form_user";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        $stmt = $conn->prepare("INSERT INTO contact_form (first_name, last_name, email, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $first_name, $last_name, $email, $message);

        if ($stmt->execute()) {
            echo "";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }

    // reCAPTCHA verification
    $recaptcha_secret = "6Lf9GNMpAAAAAEjDoQAb5VSr-6RC0_ByKv9IGbYe";
    $response = $_POST['g-recaptcha-response'];
    $remoteip = $_SERVER['REMOTE_ADDR'];
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array(
        'secret' => $recaptcha_secret,
        'response' => $response,
        'remoteip' => $remoteip
    );

    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-Type: application/x-www-form-urlencoded',
            'content' => http_build_query($data)
        )
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $result_json = json_decode($result, true);

    if (!$result_json['success']) {
        $error = true;
        $error_message_recaptcha = "reCAPTCHA verification failed.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <script src="https://kit.fontawesome.com/f14a116e47.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style_contactform.css">
    <link rel="stylesheet" type="text/css" href="style_effects.css">
    <link rel="stylesheet" type="text/css" href="media_contact.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <header class="header">
        <h1 id="louis">Louis</h1>
        <nav>
            <div class="right-links">
                <a class="hover" href="index.php #cv">About</a>
                <a class="hover" href="index.php #gallery">Creative</a>
                <a class="contactbutton" href="">Contact</a>
            </div>

            <div class="socials">
                <i class="fa-brands fa-instagram" id="insta"></i>
                <i class="fa-brands fa-youtube" id="yt"></i>
                <i class="fa-brands fa-twitter" id="twitter"></i>
            </div>
        </nav>
    </header>

    <div class=container1>
        <div class="box2">
            <h2 class="digital">A Journey of Digital Exploration</h2>
        </div>

        <div id="text1">
            <p class="journey">Every work of art is a risk-taking journey into previously unexplored realms<br>
                of creativity and invention. It's about speaking up for the wild side of you, <br>
                pushing the envelope, and breaking conventions. The lighthouse of <br>
                creativity leads us from the familiar darkness into the brilliant unknown.</p>
            <p class="journey">Dare to imagine and explore; for where there is creativity,<br> there are no boundaries, only unending possibilities just waiting to be explored.</p>
        </div>
    </div>

    <div class="container2">
        <div class="box1">
            <h2>Get in Touch</h2><br>
            <p class="info">Please contact me via this form <br> Or you may use my email theezrabazar@gmail.com</p>
        </div>

        <div class="box3">
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <label for="first_name">Name *</label><br>
                <input type="text" id="first_name" name="first_name" required placeholder="First Name">
                <?php if (!empty($error_message1)) echo "<p class='error'>$error_message1</p>"; ?>

                <br><br><input type="text" id="last_name" name="last_name" required placeholder="Last Name">
                <?php if (!empty($error_message2)) echo "<p class='error'>$error_message2</p>"; ?>

                <br><br><label for="email">Email Address *</label><br>
                <input type="email" id="email" name="email" required><br><br>

                <label for="message">Message *</label><br>
                <textarea id="message" name="message" rows="4" required></textarea><br><br>

                <div class="g-recaptcha" data-sitekey="6Lf9GNMpAAAAAElQadMJ_VQTroXOJ-eg2nvh5ix4"></div>
                <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                <input id="submitbtn" type="submit" value="Submit">
            </form>
        </div>
    </div>

    <div id="successModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Your message has been successfully sent!</p>
        </div>
    </div>

    <footer class="footer">
        <p>@ 2024 Louis. All rights reserved.</p>
    </footer>

    <script>
        //restricts users from submitting form without recaptcha verification
        $('form').submit(function(event) {
            var response = grecaptcha.getResponse();
            if (response.length === 0) {
                event.preventDefault();
                alert('Please complete the reCAPTCHA verification.');
            }
        });

        //script for site refresh 
        var h1Element = document.querySelector('.header h1');
        h1Element.addEventListener('click', function() {
            window.location.href = 'index.php';
        });


        //modalbox for successful form submission
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($first_name) && isset($last_name) && isset($email) && isset($message)  && $error !== false) { ?>
            document.getElementById('successModal').style.display = 'block';
        <?php } else { ?>
            console.log('Modal should not be displayed');
        <?php } ?>

        var closeBtn = document.querySelector('.modal-content .close');
        closeBtn.addEventListener('click', function() {
            document.getElementById('successModal').style.display = 'none';
        });

        /* script for functional icons */
        document.addEventListener("DOMContentLoaded", function() {
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
        });
    </script>
</body>

</html>