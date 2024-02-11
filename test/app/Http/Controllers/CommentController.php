<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Models\Publication;
use App\Models\Comment;
use App\Models\User;

class CommentController extends Controller
{
    public function create($publicationId)
    {
        $publication = Publication::findOrFail($publicationId);

        return view('publications.show', compact('publication'));
    }


    public function store(CommentRequest $request, $publicationId)
    {
       

        $publication = Publication::findOrFail($publicationId);
       

       //dd(auth()->user()->id);
        $publication->comments()->create([
            'content' => $request->validated()['content'],
            'author_id' => auth()->user()->id, 
        ]);
        
        
        return redirect()->back()->with('success', 'Komentarz został dodany pomyślnie.');
    }
    public function destroy(Comment $comment)
    {
        


        $comment->delete();

        return redirect()->back()->with('success', 'Komentarz został usunięty pomyślnie.');
    }



}
