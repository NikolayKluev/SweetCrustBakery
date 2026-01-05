
// Объявляем csrfToken один раз как глобальную переменную
window.csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

if (!window.csrfToken) {
    console.warn('CSRF token not found. Check <meta name="csrf-token"> in layout.');
}
