<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <title>Scuriskan</title>
</head>
    <body>
        <header class="w-full containe h-fullr mx-auto bg-gray-100">
            <div class="flex flex-col items-center py-6">
                <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="/">
                    Securiskan
                </a>
                <p class="text-lg text-gray-600">
                    Security Code Analysis
                </p>
            </div>
            <nav class="w-full py-2 border-t border-b bg-gray-100" x-data="{ open: false }">
                <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
                    <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
                        <a href="/contact" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Contact</a>
                        <a href="https://github.com/boloto1979/Securiskan/tree/main" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Repository</a>
                    </div>
                </div>
            </nav>
        </header>
    </body>
</html>
