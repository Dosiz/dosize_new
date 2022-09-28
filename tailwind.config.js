/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/views/**/*.blade.php"],
    theme: {
        extend: {
            colors: {
                pink: "#DB1580",
            },
        },
    },
    plugins: [],
    prefix: "tw-",
};
