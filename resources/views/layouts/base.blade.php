<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Animal Shelter')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @yield('body')

    <script>
        // Locks a form after the first submit so a second click cannot send it again.
        document.addEventListener('submit', function (e) {
            var form = e.target;
            if (form.dataset.sent) { e.preventDefault(); return; }
            form.dataset.sent = '1';
            form.querySelectorAll('button[type=submit]').forEach(function (b) {
                b.disabled = true;
                if (b.dataset.busy) b.textContent = b.dataset.busy;
            });
        });
        // Coming back with the Back button must not show a frozen, disabled form.
        window.addEventListener('pageshow', function (e) { if (e.persisted) location.reload(); });
    </script>
</body>
</html>
