<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
/*
$publications = Publication::all();
foreach ($publications as $publication) {
    echo "Tytuł: " . $publication->title . "\n";
    echo "Treść: " . $publication->content . "\n";
    echo "Autor: " . $publication->author . "\n";
};
$publications = Publication::orderBy('created_at', 'desc')->get();*/

/**
 * @property int $id
 * @property string $content
 * @property int $author_id
 *
 * @property-read User $author
 */

class Publication extends Model

{
   

    protected $fillable = [

        'title',

        'content',

        'author_id',

        'created_at'

    ];
    protected function zajawka() : Attribute{
       
        return Attribute::make(
            get: fn () => substr($this->attributes['content'], 0, 50) ,
        ) ;


       

    }

    public function forhumans()
    {
        return $this->created_at->diffForHumans();
    }
   

public function author()
{
    return $this->belongsTo(User::class, 'author_id')->withTrashed();

}
/*
    public function index()
    {
        // Pobranie wszystkich publikacji posortowanych malejąco po dacie utworzenia
        $publications = Publication::orderBy('created_at', 'desc')->get();

        return view('publication.index', compact('publications'));
    }
*/
public function comments()
    {
        return $this->hasMany(Comment::class,'publication_id');
    }

}

   
