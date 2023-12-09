<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"
		content="width=device-width,
				initial-scale=1.0">
	<title>BERSERK</title>
	<link rel="stylesheet"
		href="styles.css">
	
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
		<script src="index.js"></script>
		<script src="index1.js"></script>
		

		
		
</head>

<body>
	
<div class="scroll-container">
	<!-- for header part -->
	<header class="header">
<!-- Add this inside the <body> tag of index.html -->
	<div id="profileModal" class="modal">
		<span class="close">&times;</span>
		<img class="modal-content" id="profileImage">
	  </div>
	  

		

		<div class="logosec">

			<h5>Early Bird</h5>
            
			
			<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png"
				class="icn menuicn"
				id="menuicn"
				alt="menu-icon">
		</div>

		<div class="home-button">
			<a href="dasboard.html">Home</a>
		</div>

		<div class="searchbar">
			<div class="search-container">
			  <input type="text" id="searchInput" placeholder="Search">
			  <button id="searchButton" class="searchbtn">
				<img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png" class="icn srchicn" alt="search-icon">
			  </button>
			</div>
			<div id="voiceRecognition">
			  <i id="micButton" class="fas fa-microphone"></i>
			</div>
		  </div>
		
		

		  <div class="category-container">
			<select id="categorySelect">
			  <option value="none">Pick a language</option>
			  <option value="tamil">Tamil</option>
			  <option value="english">English</option>
			  <option value="hindi">Hindi</option>
			</select>
		</select>
		<button id="goButton">Go</button>
		<div class="calendar-container" id="calendarContainer">
			<input type="text" id="datePicker" placeholder="Select a date" class="flatpickr-input active" readonly="readonly">
		</div>
		
		</div>

		  <script src="index.js"></script>
			
		
		
		
		  

		<div class="message">
			
			<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png"
					class="dpicn"
					alt="dp">

				
			</div>
		</div>

	</header>

	<div class="main-container">
		 
		<div class="navcontainer">
			<nav class="nav">
				<div class="nav-upper-options">
					<div class="nav-option option1">
						<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png"
							class="nav-img"
							alt="dashboard">
						<h3> Dashboard</h3>
					</div>

					<div class="option2 nav-option">
    <a href="../DASH/institution.html" class = "bit"> <!-- Add this line to create a link -->
        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png"
            class="nav-img" alt="Update Profile">
        <h3 > Institution</h3>
    </a>

	
</div>

<div class="nav-option option3">
    <a href="likes.html" class="bit">
        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png" class="nav-img" alt="report">
        <h3 class="nav-text">Likes</h3>
    </a>
</div>

					<div class="nav-option option4">
						<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/6.png"
							class="nav-img"
							alt="About">
						<h3>Create Shorts</h3>
					</div>

					<div class="nav-option option5">
						<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png"
							class="nav-img"
							alt="blog">
						<h3> Contact Us</h3>
					</div>

					

					<div class="nav-option logout" id="logoutOption">
						<img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png"
							class="nav-img"
							alt="logout">
						<h3>Logout</h3>
					</div>
					<div id="logoutConfirmationModal" class="modal">
						<div class="modal-content">
							<h2>Are you sure you want to logout?</h2>
							<button id="logoutConfirmButton">Yes</button>
							<button id="logoutCancelButton">No</button>
						</div>
					</div>

				</div>
			</nav>
		</div>
		
		<div class="main">
			<div class="news-container" id="newsContainer">
				
			</div>

			<div class="searchbar2">
				<input type="text"
					name=""
					id=""
					placeholder="Search">
				<div class="searchbtn">
				<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
						class="icn srchicn"
						alt="search-button">
				</div>
			</div>

			

  <!-- News articles will be displayed here -->


			

			

					</div>

					
			
				</div>
			
		</div>
	</div>

</div>


	




	<script src="index.js"></script>
	
	<script>
		
async function fetchNews() {
    const apiKey = 'c9a0a130f49844e78381f85cbd6b2413';
    const apiUrl = `https://newsapi.org/v2/everything?q=today&language=en&apiKey=${apiKey}`;

    try {
        const response = await fetch(apiUrl);
        const data = await response.json();
        const articles = data.articles;

        const newsContainer = document.getElementById('newsContainer');
        newsContainer.innerHTML = ''; // Clear existing articles

        articles.forEach(article => {
            const articleElement = createArticleElement(article);
            newsContainer.appendChild(articleElement);
        });
    } catch (error) {
        console.error('Error fetching data:', error);
    }
}

// Function to create an article element
function createArticleElement(article) {
    const articleElement = document.createElement('div');
    articleElement.classList.add('article');

    // Thumbnail
    if (article.urlToImage) {
        const thumbnail = document.createElement('div');
        thumbnail.classList.add('thumbnail');
        const thumbnailImage = document.createElement('img');
        thumbnailImage.src = article.urlToImage;
        thumbnailImage.alt = 'Thumbnail';
        thumbnail.appendChild(thumbnailImage);
        articleElement.appendChild(thumbnail);
    }

    // Article Content
    const articleContent = document.createElement('div');
    articleContent.classList.add('article-content');
    articleContent.innerHTML = `
        <h2>${article.title}</h2>
        <p>${article.description}</p>
        <a href="${article.url}" target="_blank">Read more</a>
    `;
    articleElement.appendChild(articleContent);

    // Like Icon
    const likeIcon = document.createElement('span');
    likeIcon.classList.add('like-icon');
    likeIcon.innerHTML = '&#x2665;'; // Heart symbol
    articleElement.appendChild(likeIcon);

    // Check if article is liked and set the clicked class accordingly
    const isLiked = localStorage.getItem(article.title);
    if (isLiked === 'true') {
        likeIcon.classList.add('clicked');
    }

    likeIcon.addEventListener('click', function () {
        likeIcon.classList.toggle('clicked');
        const liked = likeIcon.classList.contains('clicked');
        localStorage.setItem(article.title, liked.toString());
        return false;
    });

    return articleElement;
}

// Async function to fetch and display news articles by selected date
async function fetchNewsByDate(selectedDate) {
    const apiKey = 'c9a0a130f49844e78381f85cbd6b2413';
    const apiUrl = `https://newsapi.org/v2/everything?q=today&language=en&from=${selectedDate}&to=${selectedDate}&apiKey=${apiKey}`;

    try {
        const response = await fetch(apiUrl);
        const data = await response.json();
        const articles = data.articles;

        const newsContainer = document.getElementById('newsContainer');
        newsContainer.innerHTML = ''; // Clear existing articles

        articles.forEach(article => {
            const articleElement = createArticleElement(article);
            newsContainer.appendChild(articleElement);
        });
    } catch (error) {
        console.error('Error fetching data:', error);
    }
}

// Initialize flatpickr for the date picker input
const datePicker = document.getElementById("datePicker");
const calendar = flatpickr(datePicker, {
    dateFormat: "Y-m-d",
    onClose: () => {
        datePicker.blur();
        fetchNewsByDate(datePicker.value);
    }
});

// Event listener to show calendar when clicking on the main container
const mainContainer = document.querySelector(".main");
mainContainer.addEventListener("click", (event) => {
    const cardRect = event.target.closest(".article");
    if (cardRect) {
        const rect = cardRect.getBoundingClientRect();
        showCalendar(rect.left, rect.bottom);
    }
});

// Fetch news when the page loads
window.addEventListener('load', fetchNews);






	  </script>

<script>

document.addEventListener("DOMContentLoaded", function () {
	const categorySelect = document.getElementById("categorySelect");
	const goButton = document.getElementById("goButton");
  
	// Event listener for Go button click
	goButton.addEventListener("click", redirectToCategory);
  
	function redirectToCategory() {
	  const selectedCategory = categorySelect.value;
	  if (selectedCategory === "none") {
		alert("Please select a category.");
		return;
	  }
  
	  switch (selectedCategory) {
		case "tamil":
		  window.location.href = "tamil.html";
		  break;
		case "english":
		  window.location.href = "english.html";
		  break;
		case "hindi":
		  window.location.href = "hindi.html";
		  break;
		default:
		  break;
	  }
	}
  });

  


  </script>

<script>
    const tamilButton = document.getElementById('tamilButton');

    tamilButton.addEventListener('click', function () {
        window.location.href = 'tamil.html';
    });

    const buttons = document.querySelectorAll('.news-button');

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            if (button.textContent === 'Cancel') {
                button.textContent = button.dataset.originalLabel;
                button.classList.remove('cancel');
            } else {
                button.dataset.originalLabel = button.textContent;
                button.textContent = 'Cancel';
                button.classList.add('cancel');
            }
        });
    });

	// Function to handle voice recognition


// Call the voice recognition function when the page loads
document.addEventListener("DOMContentLoaded", handleVoiceRecognition);



</script>



<script>
	
	// Add this inside your <script> tag in index.html
const profileIcon = document.querySelector('.dpicn');
const profileModal = document.getElementById('profileModal');
const profileImage = document.getElementById('profileImage');
const closeModal = document.getElementsByClassName('close')[0];

profileIcon.addEventListener('click', function() {
  profileModal.style.display = 'block';
  profileImage.src = this.src;
  window.location.href = '../profile/profile.html';
});

closeModal.addEventListener('click', function() {
  profileModal.style.display = 'none';
});

window.addEventListener('click', function(event) {
  if (event.target === profileModal) {
    profileModal.style.display = 'none';
  }
});

function handleVoiceRecognition() {
			const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition || window.mozSpeechRecognition || window.msSpeechRecognition)();
			recognition.lang = "en-US";

			const micButton = document.getElementById("micButton");
			let recognizing = false;

			micButton.addEventListener("click", () => {
				if (!recognizing) {
					recognition.start();
					micButton.classList.add("recognizing");
				} else {
					recognition.stop();
					micButton.classList.remove("recognizing");
				}
				recognizing = !recognizing;
			});

			recognition.onresult = event => {
				const result = event.results[0][0].transcript;
				const searchInput = document.getElementById("searchInput");
				searchInput.value = result;
				recognizing = false; // Set recognizing to false when recognition is complete
				micButton.classList.remove("recognizing"); // Remove the "recognizing" class
			};

			recognition.onerror = event => {
				console.error("Voice recognition error:", event.error);
				recognizing = false; // Handle error by setting recognizing to false
				micButton.classList.remove("recognizing"); // Remove the "recognizing" class
			};
		}

		document.addEventListener("DOMContentLoaded", handleVoiceRecognition);

		document.addEventListener("DOMContentLoaded", function () {
    const logoutOption = document.getElementById("logoutOption");
    const logoutConfirmationModal = document.getElementById("logoutConfirmationModal");
    const logoutConfirmButton = document.getElementById("logoutConfirmButton");
    const logoutCancelButton = document.getElementById("logoutCancelButton");

    // Show the confirmation modal when logout option is clicked
    logoutOption.addEventListener("click", function () {
        logoutConfirmationModal.style.display = "block";
    });

    // Hide the confirmation modal when cancel button is clicked
    logoutCancelButton.addEventListener("click", function () {
        logoutConfirmationModal.style.display = "none";
    });

    // Handle logout when confirm button is clicked
    logoutConfirmButton.addEventListener("click", function () {
        // Redirect to index.php
        window.location.href = "../BERSERK/index.php";
    });
});




// Get references to the necessary elements
// Get references to the necessary elements
const menuIcon = document.querySelector('.menuicn');
const nav = document.querySelector('.nav');
const newsContainer = document.querySelector('.news-container');

// Add event listener to the menu icon
menuIcon.addEventListener('click', () => {
  // Toggle the show-nav class on the navigation and news container
  nav.classList.toggle('show-nav');
  newsContainer.classList.toggle('show-nav');
});




</script>
<script>
	
// Async function to fetch and display news articles

// Fetch news when the page loads


</script>






	  <script src="index1.js"></script>
	</div>


	  
	  
</body>
</html>
