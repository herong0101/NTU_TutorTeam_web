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
        'seed': '#f37f65',
        'seed-gray': '#BBB3B1',
        'seed-orange': '#F3AA8F',
        'youtube-red': '#FF0033'
      },
      fontFamily: {
        'Zen-Old-Mincho': ['Zen Old Mincho', 'serif']

      }
    },
  },
  plugins: [],
}

