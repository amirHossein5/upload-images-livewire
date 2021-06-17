module.exports = {
  purge: {
    enabled:true,
    content:[
    './resources/**/*.blade.php',
     './resources/**/*.js',
     './resources/**/*.vue',
     ]
  },
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
