<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function (){
    echo "hello world";
});
*/
Route::get('greetings/{name?}', function ($name = null){
    if(empty($name)){
        echo "Jak masz na imię";
    } else{
        echo "witaj $name! super że dotarłeś";
    }
})->whereAlpha('name');

Route::get('admin-panel/{code}', function ($code) {
    if ($code != 'test123') {
        abort(401, 'Podano nieprawidłowy kod dostępu.');
    }

    echo "Dostęp przyznany.";
})->whereAlphaNumeric('code');





Route::prefix('calculator')->group(function (){

Route::get('add/{number1}/{number2}', function($number1, $number2){
$result = $number1 + $number2;
echo"$number1 + $number2 wynosi: $result";
})->whereNumber('number1', 'number2');

Route::get('subtract/{number1}/{number2}', function($number1, $number2){
$result = $number1 - $number2;
echo "$number1 - $number2 wynosi $result";
 })->whereNumber('number1','number2' );

 Route::get('multiply/{number1}/{number2}', function($number1, $number2){
    $result = $number1 * $number2;
    echo "$number1 * $number2 wynosi $result";
 })->whereNumber('number1', 'number2');


 Route::get('divide/{number1}/{number2}', function($number1, $number2){
    $result = $number1 / $number2;
    echo "$number1 / $number2 wynosi $result";

 })->whereNumber('number1', 'number2');

Route::get('power/{number1}/{number2}', function($number1, $number2){
    $result = pow($number1,$number2);
    echo"$number1 do potegi $number2 wynosi: $result";
})->whereNumber('number1', 'number2');

Route::get('sqrt/{number1}', function($number1){
 $result = sqrt($number1);
echo "$number1 spierwiastkowane do kwadratu wynosi $result";
})->whereNumber('number1');

});

Route::get('reverse/{text}', function($text){
    function Reverse($text){
        return strrev($text);
    }
    str_replace('+',' ',$text);
    echo Reverse($text);
});
/*
$quotes = [
   1 => [
            'quote' => 'I need more boulets!!!!!',
            'hero' => 'Frenchie',
        ],
        2 => [
            'quote' => 'Eeeeeeeeeeeee',
            'hero' => 'Robert Kubica',
        ],
        3 => [
            'quote' => 'Ty, to jest civic!????',
            'hero' => 'gościu od civica',
        ],
        4 => [
            'quote' => 'o to spryciarz',
            'hero' => 'operator kamery',
    ],
];
*/
$quotes = [
    1 => [
        'quote' => 'You were a boulder... I am a mountain.',
        'hero' => 'Sage',
        'role' => 'Sentinel',
        'image' => 'https://static.wikia.nocookie.net/valorant/images/7/74/Sage_icon.png',
    ],
    2 => [
        'quote' => 'Racing to the spike side!',
        'hero' => 'Jett',
        'role' => 'Duelist',
        'image' => 'https://static.wikia.nocookie.net/valorant/images/3/35/Jett_icon.png',
    ],
    3 => [
        'quote' => 'Call me tech support again.',
        'hero' => 'Killjoy',
        'role' => 'Sentinel',
        'image' => 'https://static.wikia.nocookie.net/valorant/images/1/15/Killjoy_icon.png',
    ],
    4 => [
        'quote' => "One of my cameras is broken!... oh wait... it is fine.",
        'hero' => 'Cypher',
        'role' => 'Sentinel',
        'image' => 'https://static.wikia.nocookie.net/valorant/images/8/88/Cypher_icon.png',
    ],
    5 => [
        'quote' => 'I am the beggining. I am the end.',
        'hero' => 'Omen',
        'role' => 'Controller',
        'image' => 'https://static.wikia.nocookie.net/valorant/images/b/b0/Omen_icon.png',
    ],
];
/*
Route::get('quotes/{id?}', function ($id = null) use ($quotes) {
    if ($id === null) {

        $id = array_rand($quotes);
    } elseif (!array_key_exists($id, $quotes)) {
        abort(404);
    }

    return $quotes[$id];
});

Route::get('quotes/{id}/hero', function ($id) use ($quotes) {
    if (!array_key_exists($id, $quotes)) {
        abort(404);
    }

    return ['hero' => $quotes[$id]['hero']];
});

Route::get('quotes/{id}/guess/{hero}', function ($id, $guessedHero) use ($quotes) {
    if (!array_key_exists($id, $quotes)) {
        abort(404);
    }

    $correctHero = strtolower($quotes[$id]['hero']);
    $guessedHero = strtolower($guessedHero);

    // Sprawdzenie, czy zgadnięty bohater jest poprawny
    if ($correctHero === $guessedHero) {
        return ['result' => 'Poprawna odpowiedź!'];
    } else {
        return ['result' => 'Niepoprawna odpowiedź. Spróbuj ponownie.'];
    }
});
*/
Route::get('quotes/list', function () use($quotes){
return view('quotes', ['quotes' => $quotes]);
})->name('quotes');
/*
Route::get('/', function () {
    return view('home', [
        'date' => now(),
    ]);
})->name('home');

Route::get('/about', function () {
    return view('about_us');

})->name('about');

*/
$articles = [
   1 => [
        'title' => 'Pierwsza publikacja',
        'content' => 'To jest treść pierwszej publikacji.',
        'author' => 'Autor 1',
        'date' => '2023-10-04',
    ],
    2 =>[
        'title' => 'Druga publikacja',
        'content' => 'To jest treść drugiej publikacji.',
        'author' => 'Autor 2',
        'date' => '2023-10-05',
    ],

];

Route::get('/publications', function () use ($articles){

    return view('publications', ['articles'=>$articles]);
})-> name('publications');


Route::get('/', function () {
    return view('welcome');
});



use App\Models\Publication;
/*
$publication = ([
    new Publication ([
    'title' => 'Sensacja! Riot usunął popularną postać Yumi z gry League of Legends!',
    'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus suscipit doloremque delectus sunt totam impedit eveniet quisquam amet est repudiandae, magni ipsum, itaque rerum similique. Odit veritatis laborum eaque maxime?',
    'author' => 'Jan Kowalski'
]),
new Publication([
    'title' => 'Druga publikacja',
    'content' => 'Zawartosc drugiej publikacji',
    'author' => 'Autor Publikacji 2',
]),
new Publication([

    'title' => 'Steam bankrutuje - czyżby to koniec naszej ulubionej platformy gamingowej?',

    'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et eos quaerat, dolor maiores ipsum accusantium. Laboriosam non maiores nesciunt obcaecati neque esse dolore! Ipsam enim labore quis, consequuntur omnis mollitia.',

    'author' => 'Tadeusz Moniuszko'

])
]);

*/

use App\Http\Controllers\PublicationController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;

$publication = Publication::orderBy('created_at', 'desc')->get();
Route::get('dd', function() use($publication){
    return view('test',['publication' =>$publication]);
});

/*Route::get('publication', function() use($publication){
    return view('index', ['publications' =>$publication]);

})-> name('publication.index');*/




/*Route::get('publication/{id}', function($id) use($publication){

    return view('show', ['publication' =>$publication[$id]]);
})-> name('publication.show');*/





//nowe route'y przy uzyciu controllera
Route::get('publication', [PublicationController::class, 'index'])->name('publications.index');
Route::get('publication/{id}', [PublicationController::class, 'show'])->name('publications.show')->whereNumber('id');
Route::get('/',[SiteController::class, 'home'])->name('home');
Route::get('about',[SiteController::class,'about'])->name('about_us');
Route::middleware('auth')->group(function () {
    Route::get('publication/create', [PublicationController::class, 'create'])
        ->name('publication.form')
        ->whereNumber('id');
});
Route::post('publication/store', [PublicationController::class, 'store'])->name('publication.store');
Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register/store', [UserController::class, 'store'])->name('register.store');
Route::get('login', [AuthController::class, 'form'])->name('login.form');
Route::post('login', [AuthController::class, "login"])->name("login.auth");
Route::post('logout', [AuthController::class,'logout'])->name('logout.auth');
Route::post('comments/store/{id}', [CommentController::class,'store'])->name('comments.store');
Route::delete('comments/{comment}' ,[CommentController::class,'destroy'])->name('comments.delete');
//Route::resource('comments', CommentController::class)->only(['store']);
use App\Models\User;

Route::get('/users/{id}', function ($id) {
    $user = User::find($id);

    if (!$user) {
        abort(404);
    }

    return view('user_profile', compact('user'));
});
Route::get('post/{publication}/edit', [PublicationController::class, 'edit'])->name('publications.edit');
Route::put('post/{publication}', [PublicationController::class, 'update'])->name('publications.update');
Route::delete('publication/{publication}', [PublicationController::class, 'destroy'])->name('publications.destroy');
