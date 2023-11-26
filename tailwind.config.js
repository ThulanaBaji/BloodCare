/** @type {import('tailwindcss').Config} */
module.exports = {
	content: ["./application/views/**/*.php"],
	theme: {
		extend: {
			colors : {
				red : {
					950: "#e3344e"
				}
			}
		},
	},
	plugins: [
		require('@tailwindcss/forms')
	],
};

