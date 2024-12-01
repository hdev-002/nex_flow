<script>
    $(document).ready(function() {

        // Page route mappings
        const pageMappings = {
            '/users/list': '{{ route('users.create') }}',
            '/unistudentmanagement/major-registration': '{{ route('major-registration.create') }}',
        };

        // Detect the current page
        const currentPage = window.location.pathname;

        // Handle the keydown event for opening create forms with Ctrl + N
        $(document).on('keydown', function(event) {
            if (event.ctrlKey && event.key === 'n') {
                event.preventDefault();  // Prevent default browser action

                const createRoute = pageMappings[currentPage];

                if (createRoute) {
                    window.location.href = createRoute;  // Redirect to create form page
                } else {
                    toastr.warning('No create route mapped for this page');  // Show warning if no route is found
                }
            }
        });



    });
</script>

