tailwind.config = {
  darkMode: "class",
  theme: {
    extend: {
      colors: {
        primary: "#74512D",
        secondary: "#543310",
        tertiary: "#AF8F6F",
        "background-light": "#F8F4E1",
        "background-dark": "#211911"
      },
      fontFamily: {
        display: ["Nunito Sans", "sans-serif"],
        heading: ["Playfair Display", "serif"]
      },
      borderRadius: {
        DEFAULT: "0.25rem",
        lg: "0.5rem",
        xl: "0.75rem",
        full: "9999px"
      }
    }
  }
};
