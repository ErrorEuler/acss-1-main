document.addEventListener('DOMContentLoaded', () => {
    const generateBtn = document.getElementById('generate-schedules-btn');
    const form = document.getElementById('generate-form');
    generateBtn.addEventListener('click', () => {
        fetch('/chair/schedule_management', {
            method: 'POST',
            body: new FormData(form),
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message + ' Unassigned courses: ' + (data.unassigned ? data.unassigned.join(', ') : 'None'));
            } else {
                alert('Failed: ' + data.message);
            }
        })
        .catch(error => alert('Error: ' + error));
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const curriculumSelect = document.getElementById('generate_curriculum_id');
    if (curriculumSelect.value) {
        updateYearLevels();
    }
    curriculumSelect.onchange = updateYearLevels;
});