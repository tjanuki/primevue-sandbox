const colors = require("tailwindcss/colors");

module.exports = {
    theme: {
        colors: {
            primary: colors.sky,
            secondary: colors.gray,
            stone: {
                100: "#0F111D",
                200: "#16192A",
                300: "#282C44",
                700: "#424450",
            },
            gray: "#86889A",
            rose: "#FF5D7C",
            indigo: "#6C72FA",
            white: "#FFFFFF",
            black: "#000000",
            customRed: "#FF0000",
        },
        spacing: {
            4.5: "1.125rem",
            7.5: "1.875rem",
            15: "3.75rem",
            24: "6rem",
            30: "7.5rem",
            39: "9.75rem",
            50: "12.5rem",
            100: "25rem",
        },
        lineHeight: {
            4.5: "1.125rem",
            5.5: "1.375rem",
        },
        maxWidth: {
            custom: "927px",
        },
        fontFamily: {
            "sans-jp": ['"Noto Sans JP"', "sans"],
            sans: ['"Noto Sans"', "sans"],
            jost: ["Jost", "sans-serif"],
        },
    },
};
