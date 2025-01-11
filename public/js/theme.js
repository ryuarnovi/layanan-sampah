document.addEventListener('DOMContentLoaded', function() {
    const themeSettingItems = document.querySelectorAll('.dropdown-item[data-type="theme"]');
    const body = document.body;

    // Set initial theme based on session
    const currentTheme = "{{ session('theme', 'light') }}";
    body.classList.add(currentTheme + '-theme');

    themeSettingItems.forEach(item => {
        item.addEventListener('click', function() {
            const selectedTheme = this.getAttribute('data-value');

            // Update body class
            body.classList.remove('light-theme', 'dark-theme');
            body.classList.add(selectedTheme + '-theme');

            // Save selected theme to session via AJAX or form submission
            // Example: Update theme via form submission
            document.getElementById('theme-form').submit();
        });
    });
});