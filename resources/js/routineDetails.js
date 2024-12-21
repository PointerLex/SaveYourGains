document.getElementById('routine_id').addEventListener('change', function() {
    var selectedRoutine = this.value;
    var routineDetails = document.getElementById('routine-details');
    var allRoutines = document.querySelectorAll('.routine-exercises');

    routineDetails.classList.add('hidden');
    allRoutines.forEach(function(routine) {
        routine.classList.add('hidden');
    });

    if (selectedRoutine) {
        routineDetails.classList.remove('hidden');
        document.querySelector('.routine-exercises[data-routine-id="' + selectedRoutine + '"]').classList
            .remove('hidden');
    }
});
