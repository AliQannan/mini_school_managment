@extends('layouts/masterLayout')

@section('mainContent')

<div class="relative bg-cover bg-center h-screen" style="background-image: url('{{ asset('assets/welcome.jpg') }}'); height: 700px;">
    <!-- Hidden overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-50 w-auto hidden">
        <img src="{{ asset('assets/welcome.jpg') }}" alt="pic image">
    </div> 

    <!-- Main content -->
    <div class="relative z-10 flex flex-col items-center justify-center h-full text-white text-center">
       
     
        <h1 class="text-4xl md:text-6xl font-bold mb-4">Welcome to Our School</h1>
        <p class="text-lg md:text-2xl mb-6">A place where knowledge and dreams come to life.</p>
        <a href="programs" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow">
            Learn More
        </a>
    </div>
</div>


<!-- About Section -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-6">About Our School</h2>
        <p class="text-gray-700 text-lg mb-8">
            Our school is dedicated to nurturing creativity, critical thinking, and academic excellence. With a long-standing tradition of quality education, we empower students to achieve their full potential in a supportive and innovative environment.
        </p>
        <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg">
            Read More About Us
        </a>
    </div>
</section>

<!-- Programs Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-6">Our Programs</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Program 1 -->
            <div class="bg-gray-100 rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-4">Science Program</h3>
                <p class="text-gray-700">
                    Fostering curiosity and innovation through hands-on experiments and research opportunities.
                </p>
            </div>
            <!-- Program 2 -->
            <div class="bg-gray-100 rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-4">Arts Program</h3>
                <p class="text-gray-700">
                    Encouraging creativity and self-expression with courses in visual and performing arts.
                </p>
            </div>
            <!-- Program 3 -->
            <div class="bg-gray-100 rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-4">Sports Program</h3>
                <p class="text-gray-700">
                    Promoting teamwork and physical fitness through various sports and activities.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
