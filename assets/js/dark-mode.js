document.addEventListener("DOMContentLoaded", function () {
    const themeToggle = document.getElementById("theme-toggle");
    const body = document.body;
    const currentTheme = localStorage.getItem("theme") || "light";

    if (currentTheme === "dark") {
        body.classList.add("dark-mode");
    }

    themeToggle.addEventListener("click", function () {
        body.classList.toggle("dark-mode");
        localStorage.setItem("theme", body.classList.contains("dark-mode") ? "dark" : "light");
    });
});
