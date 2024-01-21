/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.{html,js,php}"],
  mode: 'jit',
   // These paths are just examples, customize them to match your project structure
   purge: [
     "./**/*.{html,js,php}",
   ],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
}

