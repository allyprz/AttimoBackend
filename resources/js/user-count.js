document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('input[type="checkbox"][name="student_ids[]"]'); 
    const selectedCountSpan = document.getElementById('selectedCount');

    function updateSelectedCount() {
        const selectedCount = document.querySelectorAll('input[type="checkbox"][name="student_ids[]"]:checked').length;
        selectedCountSpan.textContent = selectedCount;
    }

    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', updateSelectedCount);
    });

    // Initial count
    updateSelectedCount();
});