module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            colors: {
                background: '#795a44',
                primary: '#0284c7',
                secondary: '#f87171'
            },
            height: {
                '120' : '30rem',
                '128' : '32rem'
            },
            backgroundImage: {
                'everest': "url('/images/bouddha.jpg')",
            }
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
}
