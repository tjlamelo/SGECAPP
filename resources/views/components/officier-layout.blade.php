<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    {{-- @vite(['resources/css/layout.css', "resources/css/{$style}.css"]) --}}

</head>
<body>

    <main>
        {{ $slot }}
    </main>

    {{-- <script src="js/{{ $script }}.js"></script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script>
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true,
        'albumLabel': "Document %1 sur %2",
        'positionFromTop': 100,
        'fadeDuration': 300
    });
</script>
</body>
</html>
