<?php
namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }

    public function show(Comment $comment)
    {
        return view('posts.show', compact('comments'));
    }
    //public function Postshow($id)
    //{
    //    $post = Post::findOrFail($id); // Or any other method to fetch the post
    //    $comments = $post->comments; // Assuming you have a relationship defined
    //    return view('post.show', compact('post', 'comments'));
    //}

    public function create()
    {
        
    }

    public function edit(Comment $comment)
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
            'post_id' => 'required|exists:posts,id',
        ]);

        Comment::create([
            'post_id' => $request->post_id,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'status' => true, // assuming you want to set a default status
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }

    public function approve(Comment $comment)
    {
        $comment->status = true;
        $comment->save();

        return redirect()->back()->with('success', 'Comment approved!');
    }

    public function disapprove(Comment $comment)
    {
        $comment->status = false;
        $comment->save();

        return redirect()->back()->with('success', 'Comment disapproved!');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted!');
    }

    public function __construct()
    {
        $this->middleware('auth')->only(['store']);
    }

}
