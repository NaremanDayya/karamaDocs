import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['"IBM Plex Sans Arabic"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            },
            colors: {
                karama: {
                    navy: {
                        DEFAULT: '#1e3a5f',
                        dark: '#0a1628',
                        badge: '#0f2040',
                    },
                    blue: {
                        DEFAULT: '#3b82f6',
                        dark: '#2563eb',
                    },
                    cyan: '#06b6d4',
                    surface: {
                        50: '#f8fafc',
                        100: '#f1f5f9',
                        blue: '#eff6ff',
                    },
                },
            },
            backgroundImage: {
                'karama-pattern':
                    "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='120' height='120' viewBox='0 0 120 120'%3E%3Cg fill='none' stroke='%233b82f6' stroke-opacity='0.08' stroke-width='1'%3E%3Cpath d='M60 0L120 60L60 120L0 60Z'/%3E%3Ccircle cx='60' cy='60' r='30'/%3E%3C/g%3E%3C/svg%3E\")",
            },
        },
    },

    plugins: [forms],
};
