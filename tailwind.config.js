/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js}"],
  theme: {
    extend: {
      backgroundColor : {
        'biru-tua' : '#103F77',
        'cari'   : '#D9D9D9',
      }
    },
      variants : {
        extends : {
        display :['group-focus'],
        opacity :['group-focus'],
        insert :['group-focus'],
        }
      },
    },
  plugins: [],
}



