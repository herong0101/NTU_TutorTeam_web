/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.php",
    "./classes/*.php",
    "./inc/*.php",
    "./template-parts/**/*.php",
  ],
  theme: {
    extend: {
      colors: {
        'seed': '#f37f65' 
      },
      fontFamily: {
        'Zen-Old-Mincho': ['Zen Old Mincho', 'serif']

      }
    },
  },
  plugins: [],
}

