/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		"./application/views/**/*.php",
		"./application/helpers/**/*.php",
		"./node_modules/flowbite/**/*.js",
		"./node_modules/apexcharts/**/*.js"
	],
	theme: {
		extend: {
			colors: {
				red: {
					950: "#e3344e",
				},
			},
		},
	},
	plugins: [
		require("@tailwindcss/forms"),
		require("flowbite/plugin")({
			charts: true,
		}),
	],
};

