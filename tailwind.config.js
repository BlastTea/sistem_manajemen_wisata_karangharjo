/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./resources/views/home.php", "./resources/views/app/**/*.php"],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
};
