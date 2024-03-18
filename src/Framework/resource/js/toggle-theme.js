(() => {
    'use strict';

    const getStoredTheme = () => localStorage.getItem('theme');
    const setStoredTheme = theme => localStorage.setItem('theme', theme);

    const setTheme = theme => {
        document.documentElement.setAttribute('data-bs-theme', theme);
    };

    const showActiveTheme = (theme, focus = false) => {
        const themeToggle = document.querySelector('#theme-toggle');
        const moonIcon = themeToggle.querySelector('#theme-dark-icon');
        const sunIcon = themeToggle.querySelector('#theme-light-icon');

        if (!themeToggle || !moonIcon || !sunIcon) {
            return;
        }

        if (theme === 'dark') {
            moonIcon.classList.remove('d-none');
            sunIcon.classList.add('d-none');
        } else {
            moonIcon.classList.add('d-none');
            sunIcon.classList.remove('d-none');
        }
    };

    window.addEventListener('DOMContentLoaded', () => {
        const storedTheme = getStoredTheme() || 'auto';
        setTheme(storedTheme);
        showActiveTheme(storedTheme);

        document.getElementById('theme-toggle').addEventListener('click', () => {
            const currentTheme = getStoredTheme();
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            setStoredTheme(newTheme);
            setTheme(newTheme);
            showActiveTheme(newTheme);
        });
    });
})();
