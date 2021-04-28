 module.exports = {
   purge: [],
   purge: [
     './resources/**/*.blade.php',
     './resources/**/*.js',
     './resources/**/*.vue',
   ],
    darkMode: false, // or 'media' or 'class'
    theme: {
      extend: {},
      fill: {
        current: 'currentColor',
      },
      fill: theme => ({
        'red': theme('colors.red.500'),
        'green': theme('colors.green.500'),
        'blue': theme('colors.blue.500'),
      })

    },
    
    variants: {
      extend: {},
    },
    plugins: [],
  }