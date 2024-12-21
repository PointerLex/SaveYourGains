/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            colors: {

            },
            animation: {
                'fade-in': 'fade-in 0.5s ease-out',
                'slide-down': 'slide-down 1s ease-out',
                'slide-right': 'slide-right 1s ease-out',
                'slide-left': 'slide-left 1s ease-out',
            },
            keyframes: {

                'fade-in': {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                'slide-down': {
                    '0%': { transform: 'translateY(-60%)' },
                    '100%': { transform: 'translateY(0)' },
                },
                'slide-right': {
                    '0%': { transform: 'translateX(-20%)' },
                    '100%': { transform: 'translateX(0)' },
                },
                'slide-left': {
                    '0%': { transform: 'translateX(20%)' },
                    '100%': { transform: 'translateX(0)' },
                },
            },
        },
    },
    plugins: [require('flowbite/plugin')],
}
