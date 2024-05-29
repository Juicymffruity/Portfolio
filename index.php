<?php
session_start();

if (isset($_GET['action']) && $_GET['action'] == 'get_highlights') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "form_user";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql_select = "SELECT image, title, description FROM user_photo";
    $result_select = $conn->query($sql_select);

    $highlights = [];

    if ($result_select->num_rows > 0) {
        while ($row = $result_select->fetch_assoc()) {
            $highlights[] = $row;
        }
    }

    $conn->close();

    echo json_encode($highlights);
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ezra Louis Bazar</title>
	<script src="https://kit.fontawesome.com/f14a116e47.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style_home.css">
	<link rel="stylesheet" type="text/css" href="style_about.css">
	<link rel="stylesheet" type="text/css" href="style_creative.css">
	<link rel="stylesheet" type="text/css" href="media_creative.css">
	<link rel="stylesheet" type="text/css" href="media_project.css">
	<link rel="stylesheet" type="text/css" href="media_home.css">
	<link rel="stylesheet" type="text/css" href="media_about.css">
	<link rel="stylesheet" type="text/css" href="style_effects.css">
</head>

<body>
	<?php include 'Admin/update_project.php'; ?>
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

	<h1 class="a">
		<div id="name">
			<span>Hello,</span>
			<span>I'm</span>
			<span>Louis.</span>
		</div>
	</h1>

	<p class="info">I am a UI/UX designer and a creative guy
		from Philippines, I am a product of College of
		information and computing of University of Southeastern
		Philippines pursuing the degree in information technology.</p>

	<div class="buttons">
		<button id="cv">Download CV</button>
	</div>

	<div class="box1 transition-element">
		<div class="page2">
			<div class="photo">
				<img id="boy2" src="Image/pfp.jpg">
			</div>

			<div class="aboutme">
				<h1 id="about">About Me</h1>
				<p>Hello! My name is Ezra Louis Bazar, a 20 years old driven college student with a
					passion for UI/UX designing. Currently pursuing my degree in information technology at
					University of Southeastern Philippines, I am dedicated in honing my skills. I am an avid
					for designing and making things aesthetically pleasing, always eager to explore opportunities.
				</p>
				<h1 id="education">Education</h1>
				<p class="year">
					2016-2020 - Mats College of Technology<br>
					2020-2022 - Mindanao Medical Foundation College<br>
					Current - University of Southeastern Philippines
				</p>

				<h1 id="hobbies">Hobbies</h1>
				<span>Video Gaming</span><br>
				<span>Poetry</span><br>
				<span>Photography</span>
			</div>
		</div>

		<div class="box4 transition-element">
			<span>Services</span>
			<h1>Skill-Set</h1>
		</div>

		<div class="box2 transition-element">
			<div id="child1">
				<i class="fa-sharp fa-solid fa-computer"></i>
				<h1 class="skill">Graphic Design</h1>
				<p>A bit experienced in graphic design, adept at creating visually compelling
					assets to enhance brand identity and engage audiences effectively.</p>
			</div>

			<div id="child2">
				<i class="fa-solid fa-video"></i>
				<h1 class="skill">Video Editing</h1>
				<p>Experienced video editor, adept at enhancing footage to create compelling
					narratives and captivating visuals.</p>
			</div>

			<div id="child3">
				<i class="fa-solid fa-pen-nib"></i>
				<h1 class="skill">Web Design</h1>
				<p>Proficient in web design, blending a keen eye for aesthetics with expertise.
					Dedicated to crafting captivating visual assets and elevate brand identities.</p>
			</div>
		</div>

		<div class="box3 transition-element">
			<div id="child4">
				<i class="fa-solid fa-clapperboard"></i>
				<h1 class="skill">Content Making</h1>
				<p>Specialize in crafting engaging narratives and visuals. With a strong eye for details, entertainment
					and proficiency in industry-standard tools.</p>
			</div>

			<div id="child5">
				<i class="fa-solid fa-camera"></i>
				<h1 class="skill">Photography</h1>
				<p>Skilled in photography, I have a knack for capturing moments and telling visual stories.
					With a keen eye for detail, producing captivating imagery and creativity. </p>
			</div>

			<div id="child6">
				<i class="fa-solid fa-pen"></i>
				<h1 class="skill">Writing</h1>
				<p>Capable of skillfully incorporating words into engrossing stories. Every writing stroke
					I make gives stories life by adding a dash of creativity.</p>
			</div>
		</div>

		<div class="line1 transition-element"></div><!--forda line-->
		<h1 class="box5 transition-element" id="gallery">Highlights</h1><br>
		<div class="highlight transition-element"></div>

		<div class="line1 transition-element"></div><!--forda line-->
		<div>
			<h1 class="box5 transition-element creative-title" id="gallery">Creatives</h1><br>
			<p class="creatives-label">Welcome to my Creatives collection, which combines photography and poetry to create a harmonious visual
				storytelling experience. Each photo in this project is more than just an image; it's a canvas for emotions,
				a snapshot of moments frozen in time, embellished with a poetic verse. Explore the depths of my imagination as I intertwine
				the beauty of nature, the complexity of emotions, the uncharted stories, the euphoria and melancholy of longing and the essence of life in every frame.
			</p>

			<div class="images transition-element">
				<a href="Project.php">
					<img class="cover" src="Image/cover1.jpg">
					<?php
					$servername = "localhost";
					$username = "root";
					$password = "";
					$database = "form_user";

					$conn = new mysqli($servername, $username, $password, $database);

					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}

					$sql_project_details = "SELECT title, description FROM project WHERE id = 1";
					$result_project_details = $conn->query($sql_project_details);

					if ($result_project_details && $result_project_details->num_rows > 0) {
						$row_project_details = $result_project_details->fetch_assoc();
						echo "<h1 id='altitude'>" . htmlspecialchars($row_project_details['title']) . "</h1>";
						echo "<p id='p1'>" . htmlspecialchars($row_project_details['description']) . "</p>";
					} else {
						echo "<h1 id='altitude'>No Title</h1>";
						echo "<p id='p1'>No Description</p>";
					}

					$conn->close();
					?>
				</a>

				<div class="line2 transition-element"></div>
				<h1 class="transition-element" id="question">Any Questions?</h1>
			</div>

			<div id="button2" class="transition-element">
				<a href="mailto:theezrabazar@gmail.com" id="form_button">Contact Me</a>
			</div>
		</div>
	</div><!--end of container -->

	<div id="arrow-up" class="hidden">&lt;
	</div>

	<footer class="footer">
		<p>@ 2024 Louis. All rights reserved.</p>
	</footer>

	<script>
		/* script for transition of the elements */
		window.addEventListener('scroll', () => {
			const elements = document.querySelectorAll('.transition-element');
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

		/* script for button to home */
		document.getElementById('arrow-up').addEventListener('click', () => {
			window.scrollTo({
				top: 0,
				behavior: 'smooth'
			});
		});

		/* script for home button visibility */
		window.addEventListener('scroll', function() {
			var arrowUp = document.getElementById('arrow-up');
			var scrollThreshold = 800;

			if (window.scrollY > scrollThreshold) {
				arrowUp.classList.remove('hidden');
			} else {
				arrowUp.classList.add('hidden');
			}
		});

		/* script for functional icons */
		document.addEventListener("DOMContentLoaded", function() {
			var instagramIcon = document.getElementById("insta");
			instagramIcon.addEventListener("click", function() {
				window.open("https://www.instagram.com/juicymffruity", "_blank");
			});

			var youtubeIcon = document.getElementById("yt");
			youtubeIcon.addEventListener("click", function() {
				window.open("https://www.youtube.com/juicymffruity", "_blank");
			});

			var twitterIcon = document.getElementById("twitter");
			twitterIcon.addEventListener("click", function() {
				window.open("https://www.twitter.com/louis232003", "_blank");
			});
		});

		/* script for about me navigation */
		document.addEventListener("DOMContentLoaded", function() {
			var aboutMeLink = document.querySelector('.aboutbutton');
			var aboutMeSection = document.querySelector('.box1');
			aboutMeLink.addEventListener('click', function(event) {
				event.preventDefault();
				aboutMeSection.scrollIntoView({
					behavior: 'smooth'
				});
			});
		});

		/* script for creative navigation */
		document.addEventListener("DOMContentLoaded", function() {
			var aboutMeLink = document.querySelector('.creativebutton');
			var aboutMeSection = document.querySelector('.line1');
			aboutMeLink.addEventListener('click', function(event) {
				event.preventDefault();
				aboutMeSection.scrollIntoView({
					behavior: 'smooth'
				});
			});
		});

		/* script for sticky header */
		var header = document.querySelector('.header');
		var sticky = header.offsetTop;
		window.addEventListener('scroll', function() {
			if (window.pageYOffset > sticky) {
				header.classList.add('sticky');
			} else {
				header.classList.remove('sticky');
			}
		});


		/* script for sticky header scrolling  */
		window.addEventListener('scroll', function() {
			if (window.pageYOffset > sticky) {
				header.classList.add('sticky', 'active');
			} else {
				header.classList.remove('sticky', 'active');
			}
		});;

		/* script for site refresh */
		var h1Element = document.querySelector('.header h1');
		h1Element.addEventListener('click', function() {
			window.location.href = 'index.php';
		});

		/*download cv */
		document.addEventListener('DOMContentLoaded', (event) => {
			const cvButton = document.getElementById('cv');
			const cvUrl = 'Curriculum_Vitae.pdf';

			cvButton.addEventListener('click', () => {
				window.open(cvUrl, '_blank');
			});
		});

		/* photo highlight transition effect */
		document.addEventListener("DOMContentLoaded", function() {
			fetch('index.php?action=get_highlights')
				.then(response => response.json())
				.then(data => {
					let currentIndex = 0;
					const highlightContainer = document.querySelector('.highlight');

					function showHighlight(index) {
						const highlight = data[index];
						const newHighlight = document.createElement('div');
						newHighlight.classList.add('highlight-content', 'active');
						newHighlight.innerHTML = `
							<img src='Admin/uploads/${highlight.image}' alt='${highlight.title}' class='highlight-image' title='${highlight.title}'>
							<h2 class='highlight-title'>${highlight.title}</h2>
							<p class='highlight-description'>${highlight.description}</p>
						`;
						highlightContainer.innerHTML = '';
						highlightContainer.appendChild(newHighlight);
						setTimeout(() => {
							newHighlight.classList.add('fade-in');
						}, 50);
					}

					function cycleHighlights() {
						showHighlight(currentIndex);
						currentIndex = (currentIndex + 1) % data.length;
						setTimeout(cycleHighlights, 10000);
					}

					if (data.length > 0) {
						cycleHighlights();
					} else {
						highlightContainer.innerHTML = "<p>No highlights available.</p>";
					}
				})
				.catch(error => console.error('Error fetching highlights:', error));
		});
	</script>
</body> <!--end of the body -->

</html>