@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-16">
    <div class="mb-16 text-center">
    <h1 class="text-3xl font-light tracking-wide text-gray-800 mb-4">Aplikasi Blog</h1>
    <p class="text-gray-500 text-sm">
        Platform Pembelajaran Pengaturcaraan</p>
    </div>

    <div class="mb-12">
    <h2 class="text-2xl font-light text-gray-800 mb-2">Dari Blog Kami</h2>
    <p class="text-gray-600 text-sm">
        Belajar cara membangunkan kemahiran pengaturcaraan dan teknologi dengan panduan kami.</p>
    </div>

    @if($posts->count() > 0)
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach($posts as $post)
                <article class="bg-gray-50 rounded-lg p-6 hover:shadow-sm transition-shadow duration-200">
                    <div class="flex items-center gap-x-3 text-xs mb-4">
                        <time datetime="{{ $post->created_at->format('Y-m-d') }}" class="text-gray-400">
                            {{ $post->created_at->format('j M Y') }}
                        </time>
                        <span class="px-2 py-1 bg-blue-50 text-blue-600 rounded text-xs">{{ $post->category }}</span>
                    </div>
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-3 leading-snug">
                            <a href="{{ route('posts.show', $post->slug) }}" class="hover:text-gray-600 transition-colors">
                                {{ $post->title }}
                            </a>
                        </h3>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            {{ Str::limit($post->content, 120) }}
                        </p>
                    </div>
                    <div class="flex items-center gap-x-3 pt-4 border-t border-gray-100">
                        <img src="{{ $post->image ?? 'https://ui-avatars.com/api/?name=' . urlencode($post->user->name ?? 'Unknown') . '&background=3B82F6&color=ffffff' }}"
                             alt="{{ $post->user->name ?? 'Unknown Author' }}"
                             class="w-8 h-8 rounded-full" />
                        <div class="text-xs">
                            <p class="font-medium text-gray-900">{{ $post->user->name ?? 'Unknown Author' }}</p>
                            <p class="text-gray-500">{{ $post->user->email ?? 'No email available' }}</p>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-12 text-center">
            <a href="{{ route('posts.index') }}"
               class="inline-flex items-center px-6 py-3 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
                Lihat Semua Artikel
            </a>
        </div>
    @else
        <div class="text-center py-16">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">Tiada artikel tersedia</h3>
            <p class="mt-1 text-sm text-gray-500">Mulakan dengan mencipta artikel pertama anda!</p>
            <div class="mt-6">
                <a href="{{ route('posts.create') }}"
                   class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Cipta Artikel Baru
                </a>
            </div>
        </div>
    @endif
</div>
@endsection
