import forms from '@tailwindcss/forms';

export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './app/**/*.php',
  ],
  theme: {
    extend: {
      colors: {
        paper: {
          50: '#fffdf9',
          100: '#fbf5ee',
          200: '#f0e3d4',
          300: '#e4ccb4',
        },
        blush: {
          50: '#fff6f7',
          100: '#feecee',
          200: '#fbd8de',
          300: '#f5b8c2',
          400: '#eb8ea0',
          500: '#d86a7a',
        },
        rosewood: '#8f4956',
        ink: '#2b2321',
      },
      boxShadow: {
        soft: '0 20px 60px rgba(72, 41, 36, 0.10)',
        glow: '0 0 0 1px rgba(255,255,255,0.45), 0 28px 80px rgba(216,106,122,0.16)',
      },
      backgroundImage: {
        'grain': "radial-gradient(circle at 20% 20%, rgba(255,255,255,0.8) 0, rgba(255,255,255,0) 20%), radial-gradient(circle at 80% 0%, rgba(255,255,255,0.45) 0, rgba(255,255,255,0) 18%)",
      },
      fontFamily: {
        display: ['Inter', 'ui-sans-serif', 'system-ui'],
        serif: ['Iowan Old Style', 'Palatino Linotype', 'Times New Roman', 'serif'],
      },
      keyframes: {
        fadeUp: {
          '0%': { opacity: 0, transform: 'translateY(24px)' },
          '100%': { opacity: 1, transform: 'translateY(0)' },
        },
        floatSlow: {
          '0%, 100%': { transform: 'translate3d(0, 0, 0)' },
          '50%': { transform: 'translate3d(0, -10px, 0)' },
        },
      },
      animation: {
        fadeUp: 'fadeUp .9s ease both',
        floatSlow: 'floatSlow 8s ease-in-out infinite',
      },
    },
  },
  plugins: [forms],
};
