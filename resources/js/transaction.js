tailwind.config = {
  darkMode: "class",
  theme: {
    extend: {
      colors: {
        // Palet utama yang dipakai di home.html
        "primary": "#543310",
        "primary-secondary": "#74512D",
        "accent": "#AF8F6F",
        "background-light": "#F8F4E1",
        "background-dark": "#211911",

        // Palet brand yang dipakai di transaksi
        "brand-dark-coffee": "#543310",
        "brand-medium-brown": "#74512D",
        "brand-tan": "#AF8F6F",
        "brand-cream": "#F8F4E1"
      },
      fontFamily: {
        "display": ["Plus Jakarta Sans", "Noto Sans", "sans-serif"]
      },
      borderRadius: {
        "DEFAULT": "0.25rem",
        "lg": "0.5rem",
        "xl": "0.75rem",
        "full": "9999px"
      }
    }
  }
};
