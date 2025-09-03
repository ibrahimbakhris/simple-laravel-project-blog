@extends('layouts.app')
@section('title', 'Edit Profile - ')
@section('content')
<div class="max-w-4xl mx-auto px-6 py-16">
    <!-- Header Section -->
    <div class="mb-12 text-center">
        <h1 class="text-3xl font-light tracking-wide text-gray-800 mb-4">Edit Profile</h1>
        <p class="text-gray-500 text-sm">Update your profile information</p>
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
        <form action="{{ route('profile.update') }}" method="POST" class="p-8 space-y-8">
            @csrf
            @method('PUT')

            <!-- Post Information Section -->
            <div class="space-y-6">
                <div class="border-b border-gray-100 pb-4">
                    <h2 class="text-lg font-medium text-gray-900">Profile Information</h2>
                    <p class="text-sm text-gray-500 mt-1">Basic details about your profile</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                    <div class="md:col-span-2">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Name <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors text-sm @error('name') border-red-300 @enderror"
                            value="{{ old('name', $user->name) }}"
                            placeholder=""
                        >
                        @error('name')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>





                    <div class="md:col-span-2">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors text-sm @error('email') border-red-300 @enderror"
                            value="{{ old('email', $user->email) }}"
                            placeholder=""
                        >
                        @error('email')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>





                    <div class="md:col-span-2">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            Password
                        </label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors text-sm @error('password') border-red-300 @enderror"
                            value=""
                            placeholder=""
                        >
                        @error('password')
                            <p class="text-red-500 text-sm mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>






                </div>

            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                <a
                    href="{{ route('profile.edit') }}"
                    class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium"
                >
                    Cancel
                </a>
                <button
                    type="submit"
                    class="px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors text-sm font-medium"
                >
                    Update Profile
                </button>
            </div>

        </form>
    </div>
</div>

@endsection
