/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./resources/views/home.php"],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
};
