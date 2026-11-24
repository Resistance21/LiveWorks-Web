<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LiveWorks Archive</title>

    <link rel="preload" href="{{ Vite::asset('resources/fonts/TitilliumWeb-Regular.woff2') }}" as="font"
        type="font/woff2" crossorigin>
    <link rel="preload" href="{{ Vite::asset('resources/fonts/TitilliumWeb-Bold.woff2') }}" as="font"
        type="font/woff2" crossorigin>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{ $slot }}
</body>

</html>
