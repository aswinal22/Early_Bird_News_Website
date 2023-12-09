document.addEventListener("DOMContentLoaded", function () {
    const searchButton = document.getElementById("searchButton");
    const searchInput = document.getElementById("searchInput");
    const newsContainer = document.getElementById("newsContainer");

    const apiKey = "0a5f023df7c04e57a0d815387d621fd3";
    
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
      

    // Function to display news articles
    function displayNews(articles) {
        newsContainer.innerHTML = "";
        articles.forEach(article => {
            if (article.urlToImage) {
                const articleHTML = `
                    <div class="article">
                        <div class="thumbnail">
                            <img src="${article.urlToImage.replace(/^http:\/\//i, 'https://')}" alt="Thumbnail">
                        </div>
                        <div class="article-content">
                            <h2>${article.title}</h2>
                            <p>${article.description}</p>
                            <a href="${article.url}" target="_blank">Read more</a>
                        </div>
                    </div>
                `;
                newsContainer.innerHTML += articleHTML;
            }
        });
    }

    // Event listener for search button click
    searchButton.addEventListener("click", searchArticles);

    // Event listener for Enter key press in search input
    searchInput.addEventListener("keyup", event => {
        if (event.key === "Enter") {
            searchArticles();
        }
    });

    function searchArticles() {
        const searchTerm = searchInput.value.trim();
        if (searchTerm === "") {
            alert("Please enter a search term.");
            return;
        }

        const apiUrl = `https://newsapi.org/v2/everything?q=${searchTerm}&apiKey=${apiKey}`;

        // Fetch news data from the API and display
        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                if (data.articles && data.articles.length > 0) {
                    displayNews(data.articles);
                } else {
                    newsContainer.innerHTML = "No articles found.";
                }
            })
            .catch(error => {
                console.error("Error fetching news data:", error);
                newsContainer.innerHTML = "An error occurred while fetching news data.";
            });
    }
    
    // Voice recognition
    const voiceButton = document.getElementById("voiceButton");
    const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition || window.mozSpeechRecognition || window.msSpeechRecognition)();
    
    voiceButton.addEventListener("click", () => {
        recognition.start();
    });
    
    recognition.onresult = event => {
        const transcript = event.results[0][0].transcript;
        searchInput.value = transcript;
        searchArticles();
    };
});
