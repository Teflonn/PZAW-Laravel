<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublicationRequest;
use Illuminate\Http\Request;
use App\Models\Publication;
use App\Models\Comment;
use App\Models\User;
use App\Http\Requests\UpdatePublicationRequest;

class PublicationController extends Controller
{


 

    public function index()
    {
        $publication = Publication::all();

        $publication->each(function ($publication) {
            $publication->formatted_created_at = $publication->forhumans();
        });

        return view('index', [
            'publications' => $publication
        ]);
    }
    public function show(int $id)
    {

        $publication = Publication::where('id', $id)->firstOrFail();

        // Jak model jest null lub nie ustawiony to rzuć błędem
        if (empty($publication)) {
            abort(404);
        }
        if ($publication) {
            $publication->formatted_created_at = $publication->forhumans();
        }

        return view('show', [

            'publication' => $publication,
            'comments' => $publication->comments
        ]);
    }

    public function create()
    {

        $users = User::all();
        return view('form', ['users' => $users]);

    }
   /* public function __construct()
    {
        $this->authorizeResource(Publication::class, 'publication');
    }*/

    public function edit(Publication $publication){
        $users = User::all();
        $this->authorize('update', $publication);

        return view('form',['publication' =>$publication, 'users' => $users] );

    }

    public function update(UpdatePublicationRequest $request, Publication $publication)
    {
        
        $this->authorize('update', $publication);

        $users = User::all();
        $data = $request->validated();
        
        $publication->fill($data);
        $publication->save();
        
        return redirect()->route('publications.show', ['id' => $publication->id])->with('success', 'Akcja pomyślnie wykonana');
    }

    
    public function store(StorePublicationRequest $request)
    {


        $data = $request->validated();


        $newPublication = new Publication($data);


        $newPublication->save();


        return redirect()->route('publications.show', ['id' => $newPublication->id])->with('success', 'Akcja pomyślnie wykonana');
    }

    public function destroy(Publication $publication){
        $this->authorize('update', $publication);

        Comment::where('publication_id', $publication->id)->delete();
        $publication->delete();
        return redirect()->route('publications.index')->with('success', 'Publikacja została usunięta');
    }
}
