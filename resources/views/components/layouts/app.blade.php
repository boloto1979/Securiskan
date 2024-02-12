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

    <style>
    .pb-2.text-center {
        font-family: 'Source Code Pro', monospace;
    }

    @keyframes blinkCursor {
        from { border-right-color: transparent; }
        to { border-right-color: black; }
    }

    .typing {
        display: inline;
        white-space: nowrap;
        overflow: hidden;
        border-right: 3px solid black;
        animation: blinkCursor .75s step-end infinite;
    }

    </style>

</head>

<body>

    @include('components.layouts.header')

    <div class="flex flex-col w-full bg-gray-200 p-14 ">
        <p class="pb-2 text-center">Shielding your digital world from unseen
            threats, <br>ensuring every click is a safe step through the vast cyberspace.</p>
    </div>
    <section class="px-6 py-16 bg-white">
        <div class="container mx-auto">
            <div class="max-w-6xl mx-auto">
                <h2 class="mb-6 text-3xl font-bold text-center text-gray-600">Navigating Safely in the Digital Age</h2>
                <div class="p-8 text-blue-700 bg-blue-100 border-l-8 border-blue-500" role="alert">
                    <p class="mb-6 text-lg">As we traverse the vast digital landscapes that connect our world, the importance of cybersecurity can't be overstated. With the digital domain so deeply ingrained in every aspect of our lives, the exchange of information is ceaseless. And where there is data, there are also data predators.</p>
                    <p class="mb-6 text-lg">The reality is stark: every file you download, every app you install, and every link you click could be a potential gateway for cyber threats. It's not about fear; it's about being aware and prepared.</p>
                    <p class="mb-6 text-lg">Securiskan stands as a beacon of defense in this ever-shifting online world. Our advanced file analysis system is the fruit of relentless innovation, designed to shine a light on the hidden risks within your downloads and to armor you against the unseen dangers.</p>
                    <p class="mb-6 text-lg">But the strongest shield is built on the foundation of knowledge and the power of action. Awareness is your sentinel, vigilance your guardian. Here are essential practices every netizen should adopt:</p>
                    <ul class="mb-6 text-lg list-disc list-inside">
                        <li><strong>Trust, but verify:</strong> Not all that appears safe is secure. Downloads, even from well-known sites, can be a facade for malware.</li>
                        <li><strong>Question the unexpected:</strong> Treat emails with attachments or links with a healthy dose of suspicion, especially if they originate from unfamiliar sources or arrive without context.</li>
                        <li><strong>Update relentlessly:</strong> Your digital armor—operating systems, applications, antivirus—needs to evolve with the threats it's designed to combat. Stay current to stay secure.</li>
                    </ul>
                    <p class="mb-6 text-lg">Embrace these practices with discipline, and you'll not only shield yourself but also fortify the digital ecosystem at large. Together, we can thwart the spread of malware and forge a safer future for all who venture into cyberspace.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-gray-200 ">
        <div class="container px-6 mx-auto">
            @include('components.update')
        </div>
    </section>


    <section id="contact" class="bg-white py-14">
        <div class="container px-6 mx-auto">
            @include('components.layouts.contact')
        </div>
    </section>

    @include('components.layouts.footer')

    <script>
        function scrollToFooter() {
            const footer = document.getElementById('contact');
            footer.scrollIntoView({ behavior: 'smooth' });
        }
        </script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
