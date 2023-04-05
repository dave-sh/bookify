/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{js,jsx,ts,tsxm html, css, php}",
  ],
  daisyui: {
    themes: [
      {
        mytheme: {
          
          "primary": "#1a6b89",
                   
          "secondary": "#a7d2f2",
                   
          "accent": "#0c559e",
                   
          "neutral": "#20222C",
                   
          "base-100": "#F7F5F9",
                   
          "info": "#9AC7E4",
                   
          "success": "#0F5C2D",
                   
          "warning": "#F7B55E",
                   
          "error": "#DD2C5E",
        },
      },
    ],
  },
  plugins: [require('@tailwindcss/typography'), require("daisyui")],
}

