/*!
 * Color mode toggler for Bootstrap's docs (https://getbootstrap.com/)
 * Copyright 2011-2025 The Bootstrap Authors
 * Licensed under the Creative Commons Attribution 3.0 Unported License.
 */

(() => {
  'use strict'

  const getStoredTheme = () => localStorage.getItem('theme')
  const setStoredTheme = theme => localStorage.setItem('theme', theme)

  const getPreferredTheme = () => {
    const storedTheme = getStoredTheme()
    if (storedTheme) {
      return storedTheme
    }

    return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
  }

  const setTheme = theme => {
    if (theme === 'auto') {
      document.documentElement.setAttribute('data-bs-theme', (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'))
    } else {
      document.documentElement.setAttribute('data-bs-theme', theme)
    }
  }

  setTheme(getPreferredTheme())

  const showActiveTheme = (theme, focus = false) => {
    // Original Bootstrap theme switcher logic
    const themeSwitcher = document.querySelector('#bd-theme')

    if (themeSwitcher) {
      const themeSwitcherText = document.querySelector('#bd-theme-text')
      const activeThemeIcon = document.querySelector('.theme-icon-active use')
      const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)

      if (btnToActive) {
        const svgOfActiveBtn = btnToActive.querySelector('svg use').getAttribute('href')

        document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
          element.classList.remove('active')
          element.setAttribute('aria-pressed', 'false')
        })

        btnToActive.classList.add('active')
        btnToActive.setAttribute('aria-pressed', 'true')
        activeThemeIcon.setAttribute('href', svgOfActiveBtn)
        const themeSwitcherLabel = `${themeSwitcherText.textContent} (${btnToActive.dataset.bsThemeValue})`
        themeSwitcher.setAttribute('aria-label', themeSwitcherLabel)

        if (focus) {
          themeSwitcher.focus()
        }
      }
    }

    // Custom theme toggle icons logic
    const themeToggle = document.querySelector('#theme-toggle')
    if (themeToggle) {
      const moonIcon = themeToggle.querySelector('#theme-dark-icon')
      const sunIcon = themeToggle.querySelector('#theme-light-icon')

      if (moonIcon && sunIcon) {
        // Determine effective theme (handle 'auto' case)
        const effectiveTheme = theme === 'auto'
          ? (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light')
          : theme

        if (effectiveTheme === 'dark') {
          moonIcon.classList.remove('d-none')
          sunIcon.classList.add('d-none')
        } else {
          moonIcon.classList.add('d-none')
          sunIcon.classList.remove('d-none')
        }
      }
    }
  }

  window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
    const storedTheme = getStoredTheme()
    if (storedTheme !== 'light' && storedTheme !== 'dark') {
      setTheme(getPreferredTheme())
      // Update icons when system preference changes
      showActiveTheme(getPreferredTheme())
    }
  })

  window.addEventListener('DOMContentLoaded', () => {
    showActiveTheme(getPreferredTheme())

    document.querySelectorAll('[data-bs-theme-value]')
      .forEach(toggle => {
        toggle.addEventListener('click', () => {
          const theme = toggle.getAttribute('data-bs-theme-value')
          setStoredTheme(theme)
          setTheme(theme)
          showActiveTheme(theme, true)
        })
      })

    // Add event listener for custom theme toggle button
    const customThemeToggle = document.querySelector('#theme-toggle')
    if (customThemeToggle) {
      customThemeToggle.addEventListener('click', () => {
        const currentTheme = getStoredTheme() || getPreferredTheme()
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark'

        setStoredTheme(newTheme)
        setTheme(newTheme)
        showActiveTheme(newTheme, true)
      })
    }
  })
})()
