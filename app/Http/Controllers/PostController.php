<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with('user')->orderBy('created_at', 'desc');

        // Handle search function
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            // title, content, category, user
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('content', 'like', '%' . $searchTerm . '%')
                    ->orWhere('category', 'like', '%' . $searchTerm . '%')
                    ->orWhereHas('user', function($q) use ($searchTerm) {
                        $q->where('name', 'like', '%' . $searchTerm . '%');
                    });
            });
        }

        return view('posts.index', [
            'posts' => $query->get()
        ]);
    }

    public function show($slug)
    {
        $post = Post::with(['user', 'comments'])->where('slug', $slug)->firstOrFail();

        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        Gate::authorize('update', $post);

        $users = User::all();
        return view('posts.edit', [
            'post' => $post,
            'users' => $users
        ]);
    }

    public function create()
    {
        Gate::authorize('create', Post::class);
        $users = User::all();
        return view('posts.create', compact('users'));
    }

    public function store(Request $request)
    {
        Gate::authorize('create', Post::class);
        // Input Validation.
        $validatedData = $request->validate([
            'slug' => 'required|string|max:255|unique:posts,slug',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'nullable|exists:users,id',
            'image' => 'nullable|string|max:2048',
            'category' => 'required|string|max:255',
        ]);
        // Store data ke database.
        Post::create($validatedData);
        // Return back dengan message.
        return back()->with('success', 'Post created successfully!');
    }

    public function update(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        Gate::authorize('update', $post);

        // Input Validation.
        $validatedData = $request->validate([
            'slug' => 'required|string|max:255|unique:posts,slug,' . $post->id,
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'nullable|exists:users,id',
            'image' => 'nullable|string|max:2048',
            'category' => 'required|string|max:255',
        ]);

        if (Gate::check('is-author')) {
            $validatedData['user_id'] = auth()->user()->id;
        }

        $post->update($validatedData);

        return redirect()->route('posts.edit', $post->slug)
            ->with('success', 'Post updated successfully!');
    }

    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        Gate::authorize('delete', $post);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
