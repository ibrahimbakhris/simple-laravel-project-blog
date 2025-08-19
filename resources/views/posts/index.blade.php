@extends('layouts.app')
@section('title', 'Blog Posts')
@section('content')
<div class="max-w-6xl mx-auto px-6 py-16">
    <div class="mb-16">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-light tracking-wide text-gray-800 mb-4">Blog Posts</h1>
            <p class="text-gray-500 text-sm">
                Platform Pembelajaran Pengaturcaraan</p>
        </div>

        <!-- Create Blog Button -->
        <div class="flex justify-center">
            <a href="{{ route('posts.create') }}"
               class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Create New Post
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-8 md:grid-cols-1 lg:grid-cols-1">
    @foreach($posts as $post)
        <article class="bg-gray-50 rounded-lg p-6 hover:shadow-sm transition-shadow duration-200">
            <div class="flex items-center gap-x-3 text-xs mb-4">
            <time datetime="2024-12-15" class="text-gray-400">{{ \Carbon\Carbon::parse($post['created_at'])->format('j M Y') }}</time>
            <span class="px-2 py-1 bg-blue-50 text-blue-600 rounded text-xs">{{ $post['category'] }}</span>
            <a href="{{ route('posts.edit', $post['id']) }}" class="px-6 py-3 text-blue-100 no-underline bg-blue-500 rounded hover:bg-blue-600 hover:underline hover:text-blue-200">Edit</a>
            </div>
            <div class="mb-6">
            <h3 class="text-lg font-medium text-gray-900 mb-3 leading-snug">
                <a href="{{ route('posts.show', ['slug' => $post['slug']]) }}" class="hover:text-gray-600 transition-colors">
                    {{ $post['title'] }}
                </a>
            </h3>
            <p class="text-sm text-gray-600 leading-relaxed">{{ $post['content'] }}</p>
            </div>
            <div class="flex items-center gap-x-3 pt-4 border-t border-gray-100">
            <img src="{{ $post['image'] }}" alt="" class="w-8 h-8 rounded-full" />
            <div class="text-xs">
                <p class="font-medium text-gray-900">{{ $post['author'] }}</p>
                <p class="text-gray-500">{{ $post['author_info'] }}</p>
            </div>
            </div>
        </article>
    @endforeach
    </div>
</div>
@endsection
