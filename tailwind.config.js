/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/views/**/*.blade.php"],
    theme: {
        extend: {
            colors: {
                pink: "#DB1580",
                lightPink: "#F9E7F1",
            },
            fontFamily: {
                ploniR: ["PloniRegular"],
                ploniM: ["PloniMedium"],
                ploniB: ["PloniBold"],
            },
        },
    },
    plugins: [],
    prefix: "tw-",
};
