@extends('layouts.app')
@section('title', $post->title)
@section('content')
<div class="max-w-4xl mx-auto px-6 py-12">
    <!-- Navigation Breadcrumb -->
    <nav class="mb-8">
        <div class="flex items-center space-x-2 text-sm text-gray-500">
            <a href="{{ route('posts.index') }}" class="hover:text-gray-700 transition-colors">
                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                All Posts
            </a>
            <span class="text-gray-300">/</span>
            <span class="text-gray-700">{{ $post->title }}</span>
        </div>
    </nav>

    <!-- Article Header -->
    <header class="mb-12 text-center">
        <div class="mb-6">
            <span class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 text-sm font-medium rounded-full">
                {{ $post->category }}
            </span>
        </div>

        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
            {{ $post->title }}
        </h1>

        <div class="flex items-center justify-center space-x-6 text-gray-600">
            <div class="flex items-center space-x-3">
                <img src="{{ $post->image }}" alt="{{ $post->user ? $post->user->name : 'Unknown Author' }}" class="w-12 h-12 rounded-full border-2 border-gray-200">
                <div class="text-left">
                    <p class="font-semibold text-gray-900">{{ $post->user ? $post->user->name : 'Unknown Author' }}</p>
                    <p class="text-sm text-gray-500">{{ $post->user ? $post->user->email : 'No email available' }}</p>
                </div>
            </div>
            <div class="h-8 w-px bg-gray-300"></div>
            <div class="text-center">
                <time datetime="{{ $post->created_at }}" class="text-sm text-gray-500">
                    Published on<br>
                    <span class="font-medium text-gray-700">{{ \Carbon\Carbon::parse($post->created_at)->format('F j, Y') }}</span>
                </time>
            </div>
        </div>
    </header>

    <!-- Article Content -->
    <article class="prose prose-lg max-w-none">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 md:p-12">
            <div class="text-gray-700 leading-relaxed text-lg whitespace-pre-line">
                {{ $post->content }}
            </div>
        </div>
    </article>

    <!-- Article Footer with Actions -->
    <footer class="mt-12 pt-8 border-t border-gray-200">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-2 text-sm text-gray-500">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Published {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center space-x-3">
                <a href="{{ route('posts.index') }}"
                   class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Posts
                </a>

                <a href="{{ route('posts.edit', ['slug' => $post->slug]) }}"
                   class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit Post
                </a>

                <a href="{{ route('posts.create') }}"
                   class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    New Post
                </a>

                <form action="{{ route('posts.destroy', $post['slug']) }}" method="POST" class="inline-block"
                      onsubmit="return confirm('Are you sure you want to delete this post? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-red-600 hover:bg-red-700 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </footer>

    <!-- Comments Section -->
    <div class="mt-12 pt-8 border-t border-gray-200">
        <div class="mb-8">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">
                Comments ({{ $post->comments->count() }})
            </h3>

            <!-- Comment Form -->
            <div class="bg-gray-50 rounded-lg p-6 mb-8">
                <h4 class="text-lg font-semibold text-gray-900 mb-4">Leave a Comment</h4>

                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('comments.store', $post->slug) }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="author_name" class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
                            <input type="text"
                                   id="author_name"
                                   name="author_name"
                                   value="{{ old('author_name') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('author_name') border-red-500 @enderror"
                                   required>
                            @error('author_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="author_email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                            <input type="email"
                                   id="author_email"
                                   name="author_email"
                                   value="{{ old('author_email') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('author_email') border-red-500 @enderror"
                                   required>
                            @error('author_email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Comment *</label>
                        <textarea id="content"
                                  name="content"
                                  rows="4"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('content') border-red-500 @enderror"
                                  placeholder="Write your comment here..."
                                  required>{{ old('content') }}</textarea>
                        @error('content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Post Comment
                        </button>
                    </div>
                </form>
            </div>

            <!-- Comments List -->
            @if($post->comments->count() > 0)
                <div class="space-y-6">
                    @foreach($post->comments as $comment)
                        <div class="bg-white rounded-lg border border-gray-200 p-6">
                            <div class="flex items-start justify-between">
                                <div class="flex items-center space-x-3 mb-3">
                                    <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                                        <span class="text-white font-semibold text-sm">
                                            {{ strtoupper(substr($comment->author_name, 0, 1)) }}
                                        </span>
                                    </div>
                                    <div>
                                        <h5 class="font-semibold text-gray-900">{{ $comment->author_name }}</h5>
                                        <p class="text-sm text-gray-500">
                                            {{ $comment->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>

                                @auth
                                    @if(Auth::id() === $comment->user_id)
                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="inline-block"
                                              onsubmit="return confirm('Are you sure you want to delete this comment?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="text-red-600 hover:text-red-800 text-sm">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                @endauth
                            </div>

                            <div class="text-gray-700 leading-relaxed whitespace-pre-line">
                                {{ $comment->content }}
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No comments yet</h3>
                    <p class="mt-1 text-sm text-gray-500">Be the first to share your thoughts!</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
