/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './assets/**/.{vue,js,ts,jsx,tsx}',
    './templates/**/*.{html,twig}' // Si vous utilisez des fichiers React JSX

],
  theme: {
    extend: {},
  },
  plugins: [],
}
