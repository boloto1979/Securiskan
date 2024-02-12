<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@700&display=swap" rel="stylesheet">

    <title>Scuriskan</title>

</head>

<body>

    @include('components.layouts.header')

    <section class="px-6 py-10 bg-white">
        <div class="container mx-auto">
            <div class="max-w-6xl mx-auto">
                <h2 class="mb-6 text-3xl font-bold text-center text-gray-600">About</h2>
                <div class="p-8 text-blue-700 bg-blue-100 border-l-8 border-blue-500" role="alert">
                    <p class="mb-6 text-lg">Securiskan emerged from an initiative aimed at enhancing internet safety, offering users a powerful tool to scan files for malware and secure their digital environment.</p>
                    <p class="mb-6 text-lg">Developed as an open-source project, it enables comprehensive scanning for malicious content, providing detailed reports to help users protect their data effectively.</p>
                    <p class="mb-6 text-lg">With its user-friendly interface and real-time updates, Securiskan represents a proactive approach to cybersecurity, accessible to everyone from individuals to businesses seeking to mitigate digital threats.</p>
                    <p class="mb-6 text-lg">Contributions to the project are welcome, encouraging a community-driven effort to improve online security for users worldwide.</p>
                    <p class="mb-6 text-lg">For more details on how to contribute or utilize this tool, visit our GitHub repository.</p>
                </div>
            </div>
        </div>
    </section>

    @include('components.layouts.footer')

</body>

</html>
