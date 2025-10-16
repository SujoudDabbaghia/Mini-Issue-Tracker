<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Issue;

class CommentController extends Controller
{
    public function store(Request $request, Issue $issue)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'content' => 'required|string'
        ]);

        $issue->comments()->create($validated);

        return redirect()->route('issues.show',$issue->id)->with('success','Comment added.');
    }
}
