module.exports = {
    purge: [
        './resources/views/**/*.blade.php',
        './resources/js/components/**/*.blade.php'
    ],
    darkMode: 'media', // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                'purple-exception-900': '#4b476d',
                'purple-exception-800': '#625e7f',
                'purple-exception-700': '#787592',
                'purple-exception-600': '#8f8ca4',
                'purple-exception-500': '#a5a3b6',
                'purple-exception-400': '#bcbac8',
                'purple-exception-300': '#d2d1da',
                'purple-exception-200': '#e9e8ed',
                
                  'pink-exception-900': '#a626a4',
                  'pink-exception-800': '#b141af',
                  'pink-exception-700': '#bc5cbb',
                  'pink-exception-600': '#c777c6',
                  'pink-exception-500': '#d293d1',
                  'pink-exception-400': '#deaedd',
                  'pink-exception-300': '#e9c9e8',
                  'pink-exception-200': '#f4e4f4'
            }
        },
    },
  variants: {},
  plugins: [],
}
