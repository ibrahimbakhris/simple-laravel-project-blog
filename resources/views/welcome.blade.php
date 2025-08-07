@extends('layouts.app')
@section('title', 'Laman Utama')
@section('content')
    <div class="mb-16 text-center">
        <h1 class="text-4xl font-semibold tracking-tight text-indigo-700 mb-3">Aplikasi Blog</h1>
        <p class="text-gray-600 text-base">
            Platform Pembelajaran Pengaturcaraan</p>
    </div>

    <div class="mb-12">
        <h2 class="text-3xl font-semibold text-indigo-800 mb-2">Dari Blog Kami</h2>
        <p class="text-gray-500 text-base">
            Belajar cara membangunkan kemahiran pengaturcaraan dan teknologi dengan panduan kami.</p>
    </div>

    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
        @foreach($posts as $post)
            <article class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition-shadow duration-300 border border-gray-100">
                <div class="flex items-center gap-x-3 text-xs mb-4">
                    <time datetime="2024-12-05" class="text-gray-500 italic">{{ \Carbon\Carbon::parse($post['created_at'])->format('j M Y') }}</time>
                    <span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-xs font-medium">{{ $post['category'] }}</span>
                </div>
                <div class="mb-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2 leading-snug">
                        <a href="#" class="hover:text-indigo-600 transition-colors">
                            {{ $post['title'] }}
                        </a>
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">{{ $post['content'] }}</p>
                </div>
                <div class="flex items-center gap-x-3 pt-4 border-t border-gray-200">
                    <img src="{{ $post['author_avatar'] }}" alt="" class="w-10 h-10 rounded-full border border-gray-300" />
                    <div class="text-xs">
                        <p class="font-medium text-gray-800">{{ $post['author'] }}</p>
                        <p class="text-gray-500">{{ $post['author_job_title'] }}</p>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
@endsection
