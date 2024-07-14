/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./resources/views/home.php"],
  darkMode: "class",
  theme: {
    extend: {
      colors: {
        primary: "#263238",
        secondary: "#00b7eb",
        accent: "#00ced1",
        neutral: "#334155",
        "base-light": "#ffff",
        "base-dark": "#37474F",
        info: "#77b5fe",
        success: "#4ade80",
        warning: "#facc15",
        error: "#f87171",
      },
      fontFamily: {
        nunito: ["Nunito", "sans-serif"],
        montserrat: ["Montserrat", "sans-serif"],
        playfairDisplay: ["'Playfair Display'", "serif"],
        lora: ["Lora", "serif"],
        cormorant: ["Cormorant", "serif"],
        merriweather: ["Merriweather", "serif"],
        openSans: ["'Open Sans'", "sans-serif"],
        poppins: ["Poppins", "sans-serif"],
        lato: ["Lato", "sans-serif"],
        pacifico: ["Pacifico", "cursive"],
        dancingScript: ["'Dancing Script'", "cursive"],
        lobster: ["Lobster", "cursive"],
        greatVibes: ["'Great Vibes'", "cursive"],
      },
      animation: {
        fadeInUp: "fadeInUp 0.5s ease-out",
        fadeInDown: "fadeInDown 0.5s ease-out",
        slideInRight: "slideInRight 0.5s ease-out",
        slideInLeft: "slideInLeft 0.5s ease-out",
        scaleIn: "scaleIn 0.3s ease-out",
        blob: "blob 1s ease-in-out infinite",
        subtleHover: "subtleHover 0.3s ease-in-out forwards",
      },
      keyframes: {
        fadeInUp: {
          "0%": { opacity: "0", transform: "translateY(10px)" },
          "100%": { opacity: "1", transform: "translateY(0)" },
        },
        fadeInDown: {
          "0%": { opacity: "0", transform: "translateY(-10px)" },
          "100%": { opacity: "1", transform: "translateY(0)" },
        },
        slideInRight: {
          "0%": { transform: "translateX(100%)" },
          "100%": { transform: "translateX(0)" },
        },
        slideInLeft: {
          "0%": { transform: "translateX(-100%)" },
          "100%": { transform: "translateX(0)" },
        },
        scaleIn: {
          "0%": { transform: "scale(0.95)" },
          "100%": { transform: "scale(1)" },
        },
        blob: {
          "0%": { transform: "translate(0, 0) scale(1)" },
          "33%": { transform: "translate(30px, -50px) scale(1.1)" },
          "66%": { transform: "translate(-20px, 20px) scale(0.9)" },
          "100%": { transform: "translate(0, 0) scale(1)" },
        },
        subtleHover: {
          "0%": { transform: "translateY(0)" },
          "100%": { transform: "translateY(-5px)" },
        },
      },
      boxShadow: {
        card: "0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)",
        button: "0 2px 4px 0 rgba(0, 0, 0, 0.2)",
      },
    },
    container: {
      center: true,
      padding: {
        DEFAULT: "1rem",
        sm: "2rem",
        lg: "4rem",
        xl: "5rem",
        "2xl": "6rem",
      },
    },
    screens: {
      xs: "480px",
      sm: "640px",
      md: "768px",
      lg: "1024px",
      xl: "1280px",
      "2xl": "1536px",
      "3xl": "1920px",
    },
  },
  plugins: [
    require("daisyui"),
    require("@tailwindcss/forms"),
    require("@tailwindcss/typography"),
    require("@tailwindcss/aspect-ratio"),
    // Tambahkan plugin lain yang ingin Anda gunakan:
    // require('tailwindcss-animate'),
    // require('tailwindcss-scroll-snap'),
    // require('tailwindcss-gradients'),
    // require('tailwindcss-heropatterns'),
    // require('tailwindcss-text-decoration-thickness'),
    // require('tailwindcss-box-shadow'),
  ],
  daisyui: {
    themes: ["light", "dark"],
  },
};
