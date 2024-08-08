import * as tailwindColorPalette from './tailwind.colors.json';
import * as tailwindBgColorsSafeList from './tailwind.bg-colors-safelist.json';

module.exports = {
	content: [
		'./src/**/*.{php,twig}',
		'./templates/**/*.twig',
		'./assets/**/*.js',
	],
	theme: {
		container: {
			center: true,
			screens: {
				sm: '640px',
				md: '768px',
				lg: '1024px',
				xl: '1280px',
			},
			padding: {
				DEFAULT: '1rem',
				'2xl': '0',
			},
		},
		extend: {
			fontFamily: {
				ebgaramond: ['EBGaramond', 'Times New Roman', 'serif'],
        urbanist: ['Urbanist', 'Helvetica Neue', 'Arial', 'sans-serif'],
			},
			colors: tailwindColorPalette,
      backgroundImage: {
        'hero-image': "url('/wp-content/themes/eee-theme/assets/images/hero-image.png')",
      }
		},
	},
	plugins: [],
	safelist: [
    'appearence-none',
    ...tailwindBgColorsSafeList.colors
  ],
};
