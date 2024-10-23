const selectedDays = [];

document.getElementById('day').addEventListener('change', function() {
    const selectedValue = this.value;
    if (selectedValue) {
        selectedDays.push(selectedValue);
        updateDayOptions();
    }
});

function updateDayOptions() {
    const options = document.querySelectorAll('#day option');

    options.forEach(option => {
        if (selectedDays.includes(option.value) && option.value !== "") {
            option.disabled = true;
        } else {
            option.disabled = false;
        }
    });
}