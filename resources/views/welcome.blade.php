<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FixItNow - A Government Initiative</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-800">
    <!-- Header Section -->
    <header class="bg-green-600 text-white py-6">
        <div class="container mx-auto flex items-center justify-between">
            <h1 class="text-3xl font-bold">FixItNow</h1>
            <nav class="space-x-6">
                <a href="#about" class="hover:underline">About</a>
                <a href="#services" class="hover:underline">Services</a>
                <a href="#contact" class="hover:underline">Contact</a>
            </nav>
            <a href="/app" class="bg-white text-green-600 px-4 py-2 rounded-lg hover:bg-gray-200">
                Access Portal
            </a>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-gray-100 py-20">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-6">Supporting Communities Through Action</h2>
            <p class="text-lg text-gray-700 mb-8">
                FixItNow is a government-backed initiative dedicated to providing fast and efficient repair and maintenance services to improve public welfare and infrastructure.
            </p>
            <a href="/get-started" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700">
                Learn More
            </a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-white">
        <div class="container mx-auto text-center">
            <h3 class="text-3xl font-bold mb-6">About FixItNow</h3>
            <p class="text-gray-700 max-w-2xl mx-auto">
                FixItNow is a government application designed to assist society by offering accessible and reliable repair solutions for public infrastructure and individual needs. Our goal is to ensure prompt action and foster a better quality of life for all citizens.
            </p>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-gray-100">
        <div class="container mx-auto text-center">
            <h3 class="text-3xl font-bold mb-10">Our Services</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Service 1 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="text-green-600 mb-4">
                        <svg class="w-12 h-12 mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2a10 10 0 100 20 10 10 0 000-20zm5 11H7a1 1 0 110-2h10a1 1 0 110 2z"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold">Public Infrastructure Repairs</h4>
                    <p class="text-gray-600 mt-4">Addressing issues like road repairs, water pipelines, and electricity outages swiftly and efficiently.</p>
                </div>
                <!-- Service 2 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="text-green-600 mb-4">
                        <svg class="w-12 h-12 mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2a10 10 0 100 20 10 10 0 000-20zm-2 10h4a2 2 0 11-4 0zm8 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold">Emergency Services</h4>
                    <p class="text-gray-600 mt-4">Providing immediate assistance for urgent repair needs, ensuring safety and reliability for all.</p>
                </div>
                <!-- Service 3 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="text-green-600 mb-4">
                        <svg class="w-12 h-12 mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M11 2a9 9 0 100 18 9 9 0 000-18zm.707 4.707a1 1 0 00-1.414 1.414L11.586 10H7a1 1 0 000 2h4.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414l-3-3z"/>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold">Community Support</h4>
                    <p class="text-gray-600 mt-4">Ensuring transparency and empowering citizens to report and track repairs in their locality.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-white">
        <div class="container mx-auto text-center">
            <h3 class="text-3xl font-bold mb-6">Contact Us</h3>
            <p class="text-gray-600 mb-6">For inquiries, complaints, or support, feel free to reach out to us.</p>
            <a href="/contact" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700">
                Get in Touch
         
