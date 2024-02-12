<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <title>Scuriskan</title>
    <style>
    .bg-gif {
        background-image: url('{{ asset('imgs/cs-an.gif') }}');
        background-size:30%;
        background-position: center;

    }

    .bg-gif p {
        font-family: 'Bebas Neue', sans-serif;
        font-size: 35px;
        background-color: rgba(135, 135, 135, 0);
        backdrop-filter: blur(3px);
    }
    </style>
</head>
    <body>
        <header class="w-full mx-auto bg-gray-100 containe h-fullr">
            <div class="flex flex-col items-center py-2">
                <a class="text-3xl font-bold text-gray-800 uppercase hover:text-gray-700" href="/">
                    Securiskan
                </a>
                <p class="text-gray-600 text-1xl ">
                    Security File Analysis
                </p>
            </div>
            <nav class="w-full py-2 bg-gray-100 border-t border-b" x-data="{ open: false }">
                    <div class="container flex flex-col items-center justify-center w-full px-6 py-0 mx-auto mt-0 text-sm font-bold uppercase sm:flex-row">
                        <a href="/contact" class="px-4 py-1 mx-2 rounded hover:bg-gray-400">Contact</a>
                        <a href="https://github.com/boloto1979/Securiskan/tree/main" class="px-4 py-1 mx-2 rounded hover:bg-gray-400">Repository</a>
                    </div>
            </nav>
        </header>
            <div class="flex flex-col w-full p-40 bg-gif ">
                <p class="pb-2 text-center font-family: 'Bebas Neue', sans-serif;">Shielding your digital world from unseen threats, <br>ensuring every click is a safe step through the vast cyberspace.</p>
            </div>
    </body>
</html>
