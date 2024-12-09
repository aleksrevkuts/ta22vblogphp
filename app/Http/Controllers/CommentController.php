<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with(['user', 'post'])->paginate(10); // Eager load user and post relationships
        return view('comments.index', compact('comments'));
    }

    public function create()
    {
        $posts = Post::all(); // Get all posts for dropdown selection
        return view('comments.create', compact('posts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'body' => 'required|string|max:255',
            'post_id' => 'required|exists:posts,id',
        ]);

        Comment::create([
            'body' => $validated['body'],
            'post_id' => $validated['post_id'],
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('comments.index')->with('success', 'Comment added successfully.');
    }

    public function show(Comment $comment)
    {
        return view('comments.show', compact('comment'));
    }

    public function edit(Comment $comment)
    {
        $posts = Post::all();
        return view('comments.edit', compact('comment', 'posts'));
    }

    public function update(Request $request, Comment $comment)
    {
        $validated = $request->validate([
            'body' => 'required|string|max:255',
            'post_id' => 'required|exists:posts,id',
        ]);

        $comment->update($validated);

        return redirect()->route('comments.index')->with('success', 'Comment updated successfully.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully.');
    }
}
