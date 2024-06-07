const { addDynamicIconSelectors } = require('@iconify/tailwind');
/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        'poppins': 'Poppins, Arial, sans-serif'
      },
      fontSize: {
        'fs-xlarge': '1.625rem', //26px
        'fs-large': '1.5rem', //24px
        'fs-med': '1.25rem', //20px
        'fs-normal': '1rem', //16px
        'fs-small': '0.875rem', //14px
        'fs-xsmall': '0.75rem' //12px
      },
      colors:{
        //Light Mode
        'clr-white': 'hsla(264, 94%, 100%, 1)',
        'clr-blue': 'hsla(230, 37%, 33%, 1)',
        'clr-dark-blue': 'hsla(230, 27%, 22%, 1)',

        'clr-light-gray': 'hsla(240, 11%, 66%, 1)',
        'clr-dark-gray': 'hsla(245, 11%, 43%, 1)',

        'clr-mint-green': 'hsla(173, 68%, 54%, 1)',
        'clr-light-green': 'hsla(172, 100%, 86%, 1) ',
        'clr-dark-green': 'hsla(173, 63%, 28%, 1)',

        'clr-light-pink': 'hsla(328, 100%, 94%, 1)',
        'clr-dark-pink': 'hsla(331, 48%, 44%, 1)',
        
        'clr-light-bg': 'hsla(253, 22%, 92%, 1)',
        'clr-light-secondary-bg': 'hsla(245, 38%, 87%, 1)',

        //Dark Mode
        'clr-dark-bg': 'hsla(210, 11%, 15%, 1)',
        'clr-dark-secondary-bg': 'hsla(210, 9%, 17%, 1)',
        'clr-dark-third': 'hsla(210, 9%, 18%, 1)'
      },
      gridTemplateColumns: {
        'auto-150': 'repeat(auto-fit, minmax(150px, 1fr))',
        'auto-250': 'repeat(auto-fit, minmax(250px, 1fr))',
        'auto-300': 'repeat(auto-fit, minmax(300px, 1fr))',
        'auto-350': 'repeat(auto-fit, minmax(350px, 1fr))',
      },
      screens: {
        '2xl': {'max': '1535px'},
        'xl': {'max': '1279px'},
        'lg': {'max': '1023px'},
        'md': {'max': '768px'},
        'sm': {'max': '639px'},

        'tablet': {'min': '1024px', 'max': '1200px'},
      },
    },
  },
  plugins: [
    addDynamicIconSelectors(),
  ],
}

