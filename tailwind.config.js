/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        // You will probably also need these lines
        "./resources/**/**/*.blade.php",
        "./resources/**/**/*.js",
        "./app/View/Components/**/**/*.php",
        "./app/Livewire/**/**/*.php",

        // Add mary
        "./vendor/robsontenorio/mary/src/View/Components/**/*.php",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php'
    ],
    theme: {
        extend: {
            container: {
                center: true
            },
        },
    },

    // Add daisyUI
    plugins: [require("daisyui")],
}
