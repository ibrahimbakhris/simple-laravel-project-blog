@extends('layouts.admin')

@push('styles')
<style>
    .fade-in {
        animation: fadeIn 0.6s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .counter {
        animation: countUp 1s ease-out forwards;
    }

    @keyframes countUp {
        from { transform: scale(0.8); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }

    .progress-bar {
        animation: fillProgress 1.5s ease-out forwards;
        width: 0%;
    }

    @keyframes fillProgress {
        to { width: var(--progress-width); }
    }

    .hover-lift:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
</style>
@endpush

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold text-gray-800 mb-2 flex items-center">
                        <svg class="w-10 h-10 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        Admin Dashboard
                    </h1>
                    <p class="text-gray-600 text-lg">Blog statistics and analytics using Eloquent Collections</p>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="bg-white rounded-lg px-4 py-2 shadow-sm border">
                        <span class="text-sm text-gray-500">Last updated</span>
                        <p class="font-medium text-gray-800">{{ now()->format('M d, Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Overview Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-6 rounded-xl shadow-lg hover-lift transition-all duration-300 fade-in">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold mb-2 opacity-90">Total Posts</h3>
                        <p class="text-3xl font-bold counter">{{ $statistics['overview']['total_posts'] }}</p>
                        <p class="text-sm opacity-75 mt-1">All published content</p>
                    </div>
                    <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2v1a1 1 0 102 0V3h3v1a1 1 0 102 0V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-6 rounded-xl shadow-lg hover-lift transition-all duration-300 fade-in" style="animation-delay: 0.1s;">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold mb-2 opacity-90">Total Comments</h3>
                        <p class="text-3xl font-bold counter">{{ $statistics['overview']['total_comments'] }}</p>
                        <p class="text-sm opacity-75 mt-1">Community engagement</p>
                    </div>
                    <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-6 rounded-xl shadow-lg hover-lift transition-all duration-300 fade-in" style="animation-delay: 0.2s;">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold mb-2 opacity-90">Total Users</h3>
                        <p class="text-3xl font-bold counter">{{ $statistics['overview']['total_users'] }}</p>
                        <p class="text-sm opacity-75 mt-1">Registered members</p>
                    </div>
                    <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white p-6 rounded-xl shadow-lg hover-lift transition-all duration-300 fade-in" style="animation-delay: 0.3s;">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold mb-2 opacity-90">Posts This Month</h3>
                        <p class="text-3xl font-bold counter">{{ $statistics['overview']['posts_this_month'] }}</p>
                        <p class="text-sm opacity-75 mt-1">Recent activity</p>
                    </div>
                    <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Dashboard Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <!-- Posts by Category -->
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                        <div class="w-2 h-6 bg-blue-500 rounded-full mr-3"></div>
                        Posts by Category
                    </h2>
                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                        {{ $statistics['posts']['by_category']->count() }} categories
                    </span>
                </div>
                @if($statistics['posts']['by_category']->count() > 0)
                    <div class="space-y-4">
                        @foreach($statistics['posts']['by_category'] as $category => $count)
                        <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-blue-500 rounded-full mr-3"></div>
                                <span class="text-gray-700 font-medium">{{ $category }}</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-medium">{{ $count }}</span>
                                <div class="w-32 bg-gray-200 rounded-full h-2">
                                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-2 rounded-full transition-all duration-500" style="width: {{ ($count / $statistics['posts']['total']) * 100 }}%"></div>
                                </div>
                                <span class="text-gray-500 text-sm">{{ round(($count / $statistics['posts']['total']) * 100, 1) }}%</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <svg class="w-12 h-12 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        <p class="text-gray-500">No categories found.</p>
                    </div>
                @endif
            </div>

            <!-- Monthly Posts -->
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                        <div class="w-2 h-6 bg-green-500 rounded-full mr-3"></div>
                        Monthly Posts Trend
                    </h2>
                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                        Last 6 months
                    </span>
                </div>
                @if($statistics['posts']['monthly_posts']->count() > 0)
                    <div class="space-y-4">
                        @foreach($statistics['posts']['monthly_posts'] as $month => $count)
                        <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-green-500 rounded-full mr-3"></div>
                                <span class="text-gray-700 font-medium">{{ \Carbon\Carbon::createFromFormat('Y-m', $month)->format('F Y') }}</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">{{ $count }}</span>
                                <div class="w-32 bg-gray-200 rounded-full h-2">
                                    <div class="bg-gradient-to-r from-green-500 to-green-600 h-2 rounded-full transition-all duration-500" style="width: {{ ($count / $statistics['posts']['monthly_posts']->max()) * 100 }}%"></div>
                                </div>
                                <span class="text-gray-500 text-sm">{{ round(($count / $statistics['posts']['monthly_posts']->sum()) * 100, 1) }}%</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <svg class="w-12 h-12 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        <p class="text-gray-500">No monthly data found.</p>
                    </div>
                @endif
            </div>

        <!-- Content Analysis -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Content Analysis</h2>
            <div class="space-y-4">
                <div class="border-b pb-2">
                    <span class="text-gray-600">Average Word Count:</span>
                    <span class="font-semibold text-gray-800">{{ $statistics['content_analysis']['average_word_count'] }} words</span>
                </div>

                <div>
                    <h4 class="font-medium text-gray-700 mb-2">Longest Posts:</h4>
                    <div class="space-y-2">
                        @foreach($statistics['content_analysis']['longest_posts'] as $post)
                        <div class="text-sm">
                            <a href="{{ route('posts.show', ['slug' => $post['slug']]) }}" class="text-blue-600 hover:underline">
                                {{ \Str::limit($post['title'], 40) }}
                            </a>
                            <span class="text-gray-500">({{ $post['word_count'] }} words)</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Engagement Stats -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Engagement Statistics</h2>
            <div class="space-y-4">
                <div class="flex justify-between items-center border-b pb-2">
                    <span class="text-gray-600">Comments This Month:</span>
                    <span class="font-semibold text-gray-800">{{ $statistics['engagement']['comments_this_month'] }}</span>
                </div>

                <div class="flex justify-between items-center border-b pb-2">
                    <span class="text-gray-600">Avg Comments per Post:</span>
                    <span class="font-semibold text-gray-800">{{ $statistics['engagement']['average_comments_per_post'] }}</span>
                </div>

                <div>
                    <h4 class="font-medium text-gray-700 mb-2">Most Commented Posts:</h4>
                    <div class="space-y-2">
                        @foreach($statistics['engagement']['posts_with_most_comments'] as $post)
                        <div class="text-sm flex justify-between">
                            <a href="{{ route('posts.show', $post['slug']) }}" class="text-blue-600 hover:underline">
                                {{ \Str::limit($post['title'], 30) }}
                            </a>
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">
                                {{ $post['comments_count'] }} comments
                            </span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Posts -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Recent Posts</h2>
            @if($statistics['posts']['recent_posts']->count() > 0)
                <div class="space-y-3">
                    @foreach($statistics['posts']['recent_posts'] as $post)
                    <div class="border-b pb-3 last:border-b-0">
                        <a href="{{ route('posts.show', $post->slug) }}" class="text-blue-600 hover:underline font-medium">
                            {{ \Str::limit($post->title, 50) }}
                        </a>
                        <div class="text-sm text-gray-500 mt-1">
                            <span>by {{ $post->user->name ?? 'Unknown' }}</span>
                            <span class="mx-2">•</span>
                            <span>{{ $post->created_at->diffForHumans() }}</span>
                            <span class="mx-2">•</span>
                            <span>{{ $post->comments->count() }} comments</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">No recent posts found.</p>
            @endif
        </div>

        <!-- Recent Comments -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Recent Comments</h2>
            @if($statistics['engagement']['recent_comments']->count() > 0)
                <div class="space-y-3 max-h-64 overflow-y-auto">
                    @foreach($statistics['engagement']['recent_comments'] as $comment)
                    <div class="border-b pb-3 last:border-b-0">
                        <div class="text-sm">
                            <span class="font-medium text-gray-700">{{ $comment['author'] }}</span>
                            <span class="text-gray-500">commented on</span>
                            <a href="{{ route('posts.show', $comment['post_slug']) }}" class="text-blue-600 hover:underline">
                                {{ \Str::limit($comment['post_title'], 30) }}
                            </a>
                        </div>
                        <p class="text-sm text-gray-600 mt-1">{{ $comment['content'] }}</p>
                        <div class="text-xs text-gray-500 mt-1">{{ $comment['created_at'] }}</div>
                    </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">No recent comments found.</p>
            @endif
        </div>
    </div>

    <!-- Top Contributors -->
    <div class="mt-8 bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                <div class="w-2 h-6 bg-purple-500 rounded-full mr-3"></div>
                Most Active Authors
            </h2>
            <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm font-medium">
                Top Contributors
            </span>
        </div>
        @if($statistics['activity']['most_active_authors']->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4">
                @foreach($statistics['activity']['most_active_authors'] as $index => $author)
                <div class="text-center p-6 border-2 border-gray-100 rounded-xl hover:border-purple-300 hover:bg-purple-50 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                    <div class="relative">
                        @if($index === 0)
                            <div class="absolute -top-3 -right-3 bg-gradient-to-r from-yellow-400 to-yellow-500 text-white w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold">
                                🏆
                            </div>
                        @elseif($index === 1)
                            <div class="absolute -top-3 -right-3 bg-gradient-to-r from-gray-400 to-gray-500 text-white w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold">
                                2
                            </div>
                        @elseif($index === 2)
                            <div class="absolute -top-3 -right-3 bg-gradient-to-r from-amber-600 to-amber-700 text-white w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold">
                                3
                            </div>
                        @endif

                        <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-full mx-auto mb-3 flex items-center justify-center text-white text-xl font-bold">
                            {{ substr($author['name'], 0, 1) }}
                        </div>
                    </div>
                    <h3 class="font-semibold text-gray-800 mb-2">{{ $author['name'] }}</h3>
                    <p class="text-3xl font-bold text-purple-600 mb-1">{{ $author['posts_count'] }}</p>
                    <p class="text-sm text-gray-500 mb-3">posts published</p>
                    @if($author['latest_post'])
                        <div class="bg-gray-100 rounded-lg p-2">
                            <p class="text-xs text-gray-600 font-medium">Latest:</p>
                            <p class="text-xs text-gray-500">{{ \Str::limit($author['latest_post'], 25) }}</p>
                        </div>
                    @endif
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <p class="text-gray-500 text-lg">No active authors found.</p>
            </div>
        @endif
    </div>
</div>
@endsection
