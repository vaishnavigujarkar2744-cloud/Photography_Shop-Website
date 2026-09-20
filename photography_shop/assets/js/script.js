document.addEventListener("DOMContentLoaded", function () {
    const forms = document.querySelectorAll(".confirm-form");
    forms.forEach(form => {
        form.addEventListener("submit", function (e) {
            if (!confirm("Are you sure?")) e.preventDefault();
        });
    });
});