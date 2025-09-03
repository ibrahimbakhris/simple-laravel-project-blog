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

        <!-- Search component -->
        <div class="max-w-md mx-auto mb-8">
            <form method="GET" action="{{ route('posts.index') }}" class="relative flex gap-2">
                <div class="relative flex-grow">
                    <input type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search posts..."
                        class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all duration-200">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    @if(request('search'))
                        <button type="button"
                                onclick="document.querySelector('input[name=search]').value=''; this.closest('form').submit();"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <svg class="h-5 w-5 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    @endif
                </div>
                <button type="submit"
                class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </form>
        </div>
        <!-- End -->

        @can('create', App\Models\Post::class)
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
        @endcan
    </div>

    <!-- Search Results Info -->
    @if(request('search'))
        <div class="mb-6 text-center">
            <p class="text-gray-600 text-sm">
                Showing results for "<span class="font-medium">{{ request('search') }}</span>"
                @if($posts->count() > 0)
                    - {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }} found
                @else
                    - No posts found
                @endif
            </p>
        </div>
    @endif
    <!-- End -->

    <div class="grid grid-cols-1 gap-8 md:grid-cols-1 lg:grid-cols-1">
    @foreach($posts as $post)
        <article class="bg-gray-50 rounded-lg p-6 hover:shadow-sm transition-shadow duration-200">
            <div class="flex items-center gap-x-3 text-xs mb-4">
            <time datetime="2024-12-15" class="text-gray-400">{{ \Carbon\Carbon::parse($post->created_at)->format('j M Y') }}</time>
            <span class="px-2 py-1 bg-blue-50 text-blue-600 rounded text-xs">{{ $post->category }}</span>
            </div>
            <div class="mb-6">
            <h3 class="text-lg font-medium text-gray-900 mb-3 leading-snug">
                <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="hover:text-gray-600 transition-colors">
                    {{ $post->title }}
                </a>
            </h3>
            <p class="text-sm text-gray-600 leading-relaxed">{{ $post->content }}</p>
            </div>
            <div class="flex items-center gap-x-3 pt-4 border-t border-gray-100">
            <img src="{{ $post->image }}" alt="{{ $post->user ? $post->user->name : 'Unknown Author' }}" class="w-8 h-8 rounded-full" />
            <div class="text-xs">
                <p class="font-medium text-gray-900">{{ $post->user ? $post->user->name : 'Unknown Author' }}</p>
                <p class="text-gray-500">{{ $post->user ? $post->user->email : 'No email available' }}</p>
            </div>
            </div>
        </article>
    @endforeach
    </div>
</div>
@endsection
