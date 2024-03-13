/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
	theme: {
		container: {
			padding: {
				DEFAULT: "1rem",
				sm: "2rem",
				lg: "4rem",
				xl: "5rem",
				"2xl": "5rem"
			}
		},

		extend: {
			colors: {
				primary: '#8075E8',
				secondary: '',
				banner:'#E1DEFA',
				body:'#F5F6FB',
			  },
			fontFamily: {
				Urbanist: "'Urbanist', sans-serif"
			}
		}
	},
	daisyui: {
		themes: ["light"],
	  },
	plugins: ["tailwindcss"],
	plugins: [require("daisyui")],
}