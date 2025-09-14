<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'E-Commerce' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">   <!-- Google Fonts Nunito -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
</head>
<body class="bg-gray-100 font-nunito">

    {{-- Header --}}
    @include('components.header')

    {{-- Page Content --}}
    <main class="container mx-auto p-6">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    @include('components.footer')

    @livewireScripts(['alpine' => false, 'navigate' => true])

</body>
</html>
