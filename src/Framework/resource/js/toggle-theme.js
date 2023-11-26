/*!
 * Color mode toggler for Bootstrap's docs (https://getbootstrap.com/)
 * Copyright 2011-2023 The Bootstrap Authors
 * Licensed under the Creative Commons Attribution 3.0 Unported License.
 */
(() => {
    'use strict';

    const getStoredTheme = () => localStorage.getItem('theme');
    const setStoredTheme = (theme) => localStorage.setItem('theme', theme);

    const getPreferredTheme = () => {
        const storedTheme = getStoredTheme();

        if (storedTheme) {
            return storedTheme;
        }

        return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    };

    const setTheme = (theme) => {
        if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.documentElement.setAttribute('data-bs-theme', 'dark');
        } else {
            document.documentElement.setAttribute('data-bs-theme', theme);
        }
    };

    setTheme(getPreferredTheme());

    const showActiveTheme = (theme, focus = false) => {
        const themeSwitcher = document.querySelector('#toggle-theme');

        if (!themeSwitcher) {
            return;
        }

        const themeSwitcherText = document.querySelector('#toggle-theme-text');
        const activeThemeIcon = document.querySelector('.theme-icon-active use');
        const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`);
        const svgOfActiveBtn = btnToActive.querySelector('svg use').getAttribute('href');

        // Añade las siguientes líneas para mostrar el icono de verificación en el botón activo.
        const activeCheckIcon = btnToActive.querySelector('.check');
        activeCheckIcon.classList.remove('d-none');

        document.querySelectorAll('[data-bs-theme-value]').forEach((element) => {
            const checkIcon = element.querySelector('.check');

            if (element === btnToActive) {
                checkIcon.classList.remove('d-none');
            } else {
                checkIcon.classList.add('d-none');
            }

            element.classList.remove('active');
            element.setAttribute('aria-pressed', 'false');
        });

        btnToActive.classList.add('active');
        btnToActive.setAttribute('aria-pressed', 'true');
        activeThemeIcon.setAttribute('href', svgOfActiveBtn);
        const themeSwitcherLabel = `${themeSwitcherText.textContent} (${btnToActive.dataset.bsThemeValue})`;
        themeSwitcher.setAttribute('aria-label', themeSwitcherLabel);

        if (focus) {
            themeSwitcher.focus();
        }
    };

    const sendTheme = (theme) => {
        const languageCode = document.documentElement.getAttribute('lang').substring(0, 2);
        const baseUrl = '/api/theme';
        const url = `/${languageCode}${baseUrl}`;

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ theme }),
        })
        .then((response) => {
            if (!response.ok) {
                console.error('Failed to update theme');
            }
        })
        .catch((error) => {
            console.error('Error updating theme:', error);
        });
    };

    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
        const storedTheme = getStoredTheme();

        if (storedTheme !== 'light' && storedTheme !== 'dark') {
            setTheme(getPreferredTheme());
        }
    });

    window.addEventListener('DOMContentLoaded', () => {
        showActiveTheme(getPreferredTheme());

        document.querySelectorAll('[data-bs-theme-value]').forEach((toggle) => {
            toggle.addEventListener('click', () => {
                const theme = toggle.getAttribute('data-bs-theme-value');

                setStoredTheme(theme);
                setTheme(theme);
                showActiveTheme(theme, true);
                sendTheme(theme);
            });
        });
    });
  })();
