document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('input[type="checkbox"][name="student_ids[]"]'); // Asegúrate de que el atributo name coincida con el de tus checkboxes
    const selectedCountSpan = document.getElementById('selectedCount');

    function updateSelectedCount() {
        const selectedCount = document.querySelectorAll('input[type="checkbox"][name="student_ids[]"]:checked').length;
        selectedCountSpan.textContent = selectedCount;
    }

    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', updateSelectedCount);
    });

    // Llama a updateSelectedCount inmediatamente para establecer el conteo inicial
    updateSelectedCount();
});