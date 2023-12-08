<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title }}</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/2bc7483296.js" crossorigin="anonymous"></script>
        <script>
            // Set the initial value from Laravel
            let theme = '{{ $theme }}';

            // Function to update the shared variable and display it
            function updateTheme() {
                // Update the variable on the client side
                theme = 'new_theme_value';

                // Send an AJAX request to update the variable on the server side
                // (You may need to define a route and a controller method for this)
                // Example using Axios:
                axios.post('/update-theme', { theme: theme })
                    .then(response => {
                        // Do something if needed
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        </script>
    </head>

    <body class="antialiased">
        <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom d-flex align-items-center justify-content-space-between">
            @include('partial/navbar')
        </nav>
        <main>
            @include('partial/left-navbar')
            <div class="container text-left my-4">
                <div class="row d-flex align-items-center">
                    <div class="col d-flex align-items-center flex-column">
                        <h1 style="color:#542302; font-weight: bold; width: max-content;">{{ $h1 }}</h1>
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        </footer>
    </body>
</html>
