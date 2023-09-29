<script>
'use strict';

(function() {
    const deleteUser = document.querySelector('#delete{{ $tm->id }}');

    // Basic Alerts
    // -------------------------------------------------------------------
    // Alert With Functional Confirm Button
    if (deleteUser) {
        deleteUser.onclick = function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "Delete The User Named {{ $tm->name }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                customClass: {
                    confirmButton: 'btn btn-label-danger me-3',
                    cancelButton: 'btn btn-label-secondary'
                },
                buttonsStyling: false
            }).then(function(result) {
                if (result.value) {
                    Swal.fire({

                        icon: 'success',
                        title: 'Deleted!',
                        text: 'User has been deleted.',
                        showConfirmButton: false,
                        timer: 1500,
                        customClass: {
                            confirmButton: 'btn btn-success'
                        }
                    });
                }
            }).then(function() {
                document.location.href = "{{ route('deleteuser', $tm->id) }}",
            });
        };
    }
})();
</script>