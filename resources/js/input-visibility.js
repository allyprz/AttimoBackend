document.addEventListener('DOMContentLoaded', function() {
    const categorySelect = document.getElementById('category-select');
    const groupSelectContainer = document.getElementById('group-select-container');
    const majorSelectContainer = document.getElementById('major-select-container');
    const labelSelect = document.getElementById('label-select');
    const percentContainer = document.getElementById('percent-container');

    function handleCategoryChange() {
        let selectedCategory = categorySelect.value;
        switch (selectedCategory) {
            case '1': // 1 == category course
                groupSelectContainer.style.display = 'block';
                majorSelectContainer.style.display = 'none';
                break;
            case '4': // 4 == category major
                majorSelectContainer.style.display = 'block';
                groupSelectContainer.style.display = 'none';
                break;
            default:
                groupSelectContainer.style.display = 'none';
                majorSelectContainer.style.display = 'none';
        }
    }

    function handleLabelChange() {
        const selectedLabel = labelSelect.value;
        const percentInput = document.querySelector('input[name="percent"]');
        if (selectedLabel == '2') { // 2 == label homework
            percentContainer.style.display = 'block';
            percentInput.required = true; // Add required attribute
        } else {
            percentContainer.style.display = 'none';
            percentInput.required = false; // Remove required attribute
        }
    }

    categorySelect.addEventListener('change', handleCategoryChange);
    labelSelect.addEventListener('change', handleLabelChange);

    // Initial check
    handleCategoryChange();
    handleLabelChange();
});
