@extends('layouts.app')
@section('title', 'Create New Post')
@section('content')
<div class="max-w-4xl mx-auto px-6 py-16">
    <!-- Header Section -->
    <div class="mb-12 text-center">
        <h1 class="text-3xl font-light tracking-wide text-gray-800 mb-4">Create New Post</h1>
        <p class="text-gray-500 text-sm">Share your thoughts and ideas with the world</p>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-8 p-4 bg-green-50 border border-green-200 rounded-lg">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-green-700 font-medium">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <!-- Form Container -->
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm">
        <form action="{{ route('posts.store') }}" method="POST" class="p-8 space-y-8">
            @csrf

            <!-- Post Information Section -->
            <div class="space-y-6">
                <div class="border-b border-gray-100 pb-4">
                    <h2 class="text-lg font-medium text-gray-900">Post Information</h2>
                    <p class="text-sm text-gray-500 mt-1">Basic details about your blog post</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                            Post Title <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            name="title"
                            id="title"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors text-sm @error('title') border-red-300 @enderror"
                            value="{{ old('title') }}"
                            placeholder="Enter an engaging title for your post"
                        >
                        @error('title')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                            URL Slug <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            name="slug"
                            id="slug"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors text-sm @error('slug') border-red-300 @enderror"
                            value="{{ old('slug') }}"
                            placeholder="url-friendly-slug"
                        >
                        @error('slug')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                            Category <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            name="category"
                            id="category"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors text-sm @error('category') border-red-300 @enderror"
                            value="{{ old('category') }}"
                            placeholder="e.g., Programming, Technology"
                        >
                        @error('category')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                        Content <span class="text-red-500">*</span>
                    </label>
                    <textarea
                        name="content"
                        id="content"
                        rows="8"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors text-sm @error('content') border-red-300 @enderror"
                        placeholder="Write your post content here..."
                    >{{ old('content') }}</textarea>
                    @error('content')
                        <p class="text-red-500 text-sm mt-2 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <!-- Author Information Section -->
            <div class="space-y-6">
                <div class="border-b border-gray-100 pb-4">
                    <h2 class="text-lg font-medium text-gray-900">Author Information</h2>
                    <p class="text-sm text-gray-500 mt-1">Details about the post author</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="author" class="block text-sm font-medium text-gray-700 mb-2">
                            Author Name <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            name="author"
                            id="author"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors text-sm @error('author') border-red-300 @enderror"
                            value="{{ old('author') }}"
                            placeholder="Your full name"
                        >
                        @error('author')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="author_info" class="block text-sm font-medium text-gray-700 mb-2">
                            Author Bio
                        </label>
                        <input
                            type="text"
                            name="author_info"
                            id="author_info"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors text-sm @error('author_info') border-red-300 @enderror"
                            value="{{ old('author_info') }}"
                            placeholder="Brief description about the author"
                        >
                        @error('author_info')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                        Author Image URL
                    </label>
                    <input
                        type="url"
                        name="image"
                        id="image"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors text-sm @error('image') border-red-300 @enderror"
                        value="{{ old('image') }}"
                        placeholder="https://example.com/author-photo.jpg"
                    >
                    <p class="text-xs text-gray-500 mt-1">Provide a URL to the author's profile picture</p>
                    @error('image')
                        <p class="text-red-500 text-sm mt-2 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                <a
                    href="{{ route('posts.index') }}"
                    class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium"
                >
                    Cancel
                </a>
                <button
                    type="submit"
                    class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors text-sm font-medium"
                >
                    Create Post
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Auto-generate slug from title
document.getElementById('title').addEventListener('input', function() {
    const title = this.value;
    const slug = title
        .toLowerCase()
        .replace(/[^a-z0-9 -]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-')
        .trim('-');
    document.getElementById('slug').value = slug;
});
</script>
@endsection
