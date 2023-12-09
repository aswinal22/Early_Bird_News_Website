// Wait for the DOM to load
document.addEventListener("DOMContentLoaded", function () {
    // Get the menu icon and navigation container elements
    const menuIcon = document.getElementById("menuIcon");
    const navContainer = document.querySelector(".navcontainer");

    // Add a click event listener to the menu icon
    menuIcon.addEventListener("click", function () {
        // Toggle the 'hidden' class on the navigation container
        navContainer.classList.toggle("hidden");
    });
});
