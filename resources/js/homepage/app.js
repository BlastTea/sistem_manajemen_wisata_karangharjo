// Import Alpine.js
import Alpine from "alpinejs";

// DOM Elements and icons
let switchToggle;
let isDarkmode;
const darkIcon = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
</svg>`;

const lightIcon = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
</svg>`;

// Function to toggle theme
function toggleTheme() {
  isDarkmode = !isDarkmode;
  localStorage.setItem("isDarkmode", isDarkmode.toString());
  switchTheme(); // Call switchTheme function when theme is toggled
}

// Function to switch theme based on isDarkmode
function switchTheme() {
  if (isDarkmode) {
    switchToggle.classList.remove("bg-yellow-500", "-translate-x-4");
    switchToggle.classList.add("bg-gray-700", "translate-x-4");
    setTimeout(() => {
      switchToggle.innerHTML = darkIcon;
    }, 250);
  } else {
    switchToggle.classList.add("bg-yellow-500", "-translate-x-4");
    switchToggle.classList.remove("bg-gray-700", "translate-x-4");
    setTimeout(() => {
      switchToggle.innerHTML = lightIcon;
    }, 250);
  }
}

// Function to initialize Alpine.js and define $store
function initApp() {
  switchToggle = document.querySelector("#switch-toggle");
  isDarkmode = localStorage.getItem("isDarkmode") === "true";

  return {
    $store: Alpine.store("navbar", {
      navbarOpen: true,
      mobileMenuOpen: true,
      isDarkmode: isDarkmode,
      lastScrollY: 0,
      init() {
        window.addEventListener("scroll", this.handleScroll.bind(this));
      },
      handleScroll() {
        this.navbarOpen = window.scrollY <= this.lastScrollY;
        this.lastScrollY = window.scrollY;
      },
      toggleMobileMenu() {
        this.mobileMenuOpen = !this.mobileMenuOpen;
      },
      toggleTheme() {
        this.isDarkmode = !this.isDarkmode;
        localStorage.setItem("isDarkmode", this.isDarkmode.toString());
        switchTheme(); // Call switchTheme function when theme is toggled
      },
    }),
  };
}

// Initialize Alpine.js components and start Alpine.js
initApp();
Alpine.start();
