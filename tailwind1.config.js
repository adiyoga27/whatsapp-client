const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    // theme: {
    //     screens: {
    //         xl: { max: "1300px" },

    //         lg: { max: "998px" },

    //         md: { max: "767px" },

    //         sm: { max: "640px" },

    //         xs: { max: "540px" },
    //     },
    //     extend: {
    //         backgroundImage: {
    //             "cover-1":
    //                 "url('../../public/wordpress/assets/img/cover-1.png')",
    //             "cover-line-1":
    //                 "url('../../public/wordpress/assets/img/cover-line-1.png')",
    //             "cover-line-2":
    //                 "url('../../public/wordpress/assets/img/cover-line-2.png')",
    //             "cover-line-3":
    //                 "url('../../public/wordpress/assets/img/cover-line-3.png')",
    //         },
    //         fontFamily: {
    //             sans: ["Nunito", ...defaultTheme.fontFamily.sans],
    //             "metro-regular-italic": "Metropolis RegularItalic",
    //             "metro-bold": "Metropolis Bold",
    //             "metro-bold-italic": "Metropolis BoldItalic",
    //         },
    //         colors: {
    //             "raisin-black": "#262626 ",
    //             "jelly-bean-blue": "#47888E",
    //             gainsboro: "#D5E4E6",
    //             "blue-sapphire": "#156269 ",
    //             "bright-gray": "#E9F2F3 ",
    //             "white-1": "rgba(255, 255, 255, 0.8)",
    //         },
    //         fontSize: {
    //             "0.5xs": ["10px", "14px"],
    //             "1.5xl": ["22px", "32px"],
    //             "2.1xl": ["25px", "32px"],
    //             "3.3xl": ["32px", "40px"],
    //             "4.3xl": ["40px", "54px"],
    //             "5xl": ["48px", "54px"],
    //             "6.2xl": ["64px", "54px"],
    //         },

    //         padding: {
    //             "5,5": "22px",
    //             "5,75": "23px",
    //             "11,5": "46px",
    //             "11,75": "47px",
    //             "12,75": "51px",
    //             13: "52px",
    //             "17,5": "70px",
    //             22: "88px",
    //             23: "92px",
    //             "20,75": "83px",
    //             "23,5": "94px",
    //             "27,5": "110px",
    //             "32,25": "129px",
    //             "32,25": "129px",
    //         },
    //         margin: {
    //             "3,75": "15px",
    //             "12,25": "49px",
    //             "12,5": "50px",
    //             "13,25": "53px",
    //             "16,75": "67px",
    //             "17,75": "71px",
    //             18: "72px",
    //             "19,25": "77px",
    //             "30,5": "122px",
    //         },
    //         gap: {
    //             "3,75": "15px",
    //             18: "72px",
    //         },
    //         borderWidth: {
    //             "0,75": "3px",
    //         },
    //         maxWidth: {
    //             "0.111xs": "64px",
    //             "0.151xs": "94px",
    //             "0.2xs": "144px",
    //             "0.3xs": "272px",
    //             "4.3xl": "931px",
    //             "4.9xl": "1022px",
    //             "5.6xl": "1069px",
    //             "6.8xl": "1240px",
    //             "6.9xl": "1271px",
    //         },
    //         width: {
    //             "75,75": "303px",
    //             "94,5": "378px",
    //             112: "448px",
    //             "128,5": "514px",
    //         },
    //         height: {
    //             128: "512px",
    //         },
    //     },
    // },

    theme: {
        fontFamily: {
            sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            "metro-regular-italic": "Metropolis RegularItalic",
            "   -bold": "Metropolis Bold",
            "metro-bold-italic": "Metropolis BoldItalic",
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/line-clamp"),
    ],
};
