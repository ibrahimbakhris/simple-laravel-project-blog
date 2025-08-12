@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-16">
    <div class="mb-12 text-center">
        <h1 class="text-3xl font-light tracking-wide text-gray-800 mb-4">Hubungi Kami</h1>
        <p class="text-gray-500 text-sm">
            Ada soalan atau maklum balas? Kami sedia membantu anda.
        </p>
    </div>

    {{-- Contact Info --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 text-center">
        <div>
            <div class="text-blue-600 text-xl mb-2">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <p class="font-semibold text-gray-800">Alamat</p>
            <p class="text-sm text-gray-500">123 Jalan Teknologi, 50480 Kuala Lumpur, Malaysia</p>
        </div>
        <div>
            <div class="text-blue-600 text-xl mb-2">
                <i class="fas fa-envelope"></i>
            </div>
            <p class="font-semibold text-gray-800">E-mel</p>
            <p class="text-sm text-gray-500">support@platformpengaturcaraan.my</p>
        </div>
        <div>
            <div class="text-blue-600 text-xl mb-2">
                <i class="fas fa-phone-alt"></i>
            </div>
            <p class="font-semibold text-gray-800">Telefon</p>
            <p class="text-sm text-gray-500">+60 12-345 6789</p>
        </div>
    </div>

    {{-- Contact Form --}}
    <div class="bg-gray-50 p-8 rounded-lg shadow-md">
        <h2 class="text-xl font-medium text-gray-800 mb-6">Hantar Mesej</h2>
        <form action="{{-- route('contact.submit') --}}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                <div>
                    <label class="block text-sm text-gray-700 mb-1">Nama Penuh</label>
                    <input type="text" name="name" class="w-full px-4 py-2 border border-gray-300 rounded" required>
                </div>
                <div>
                    <label class="block text-sm text-gray-700 mb-1">E-mel</label>
                    <input type="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded" required>
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-sm text-gray-700 mb-1">Subjek</label>
                <input type="text" name="subject" class="w-full px-4 py-2 border border-gray-300 rounded" required>
            </div>
            <div class="mb-6">
                <label class="block text-sm text-gray-700 mb-1">Mesej</label>
                <textarea name="message" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded" required></textarea>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                Hantar
            </button>
        </form>
    </div>
</div>
@endsection
