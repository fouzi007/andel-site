<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::name('site.')->group(function(){
    Route::get('/','SiteController@index')->name('index');
    Route::get('/medias','SiteController@mediasIndex')->name('medias');
    Route::get('/medias/photos','SiteController@mediasPhotos')->name('medias.photos');
    Route::get('/medias/photos/{event}','SiteController@mediasPhotosEvent')->name('medias.events.photos');
    Route::get('/medias/videos','SiteController@mediasVideos')->name('medias.videos');
    Route::get('/contact','SiteController@contact')->name('contact');
    Route::get('/liens-utiles','SiteController@liensUtiles')->name('liens-utiles');
    Route::post('/contact','SiteController@submitContact')->name('contact.send');
    Route::get('/presentation','SiteController@presentation')->name('association.presentation');
    Route::get('/bureau','SiteController@bureau')->name('association.bureau');
    Route::get('/evenements','SiteController@events')->name('events.index');
    Route::get('/articles/{article}','SiteController@showArticle')->name('articles.show');
    Route::get('/evenements/{event}','SiteController@detailsEvent')->name('events.show');
    Route::middleware('guest')->get('/evenements/{event}/participer','SiteController@participerEvenement')->name('events.participer');
    Route::post('/evenements/{event}/participer','SiteController@processParticipation')->name('events.login');
    Route::post('/evenements/{event}/register','SiteController@processRegisterParticipation')->name('events.register');
    Route::middleware('auth')->group(function(){
        Route::get('/adhesion','SiteController@adhesion')->name('adhesion');
        Route::get('/adhesion/maj','SiteController@adhesionMaj')->name('adhesion.maj');
        Route::post('/adhesion/maj','SiteController@adhesionMajSubmit')->name('adhesion.maj.submit');
        Route::get('/home/events','SiteController@myEvents')->name('user.evenements');
        Route::get('/annuaire','SiteController@annuaire')->name('annuaire');
        Route::get('/communications','SiteController@communications')->name('user.communications');
        Route::post('/communications','SiteController@communicationsStore')->name('user.communications.store');
    });

});

Route::name('admin.')->prefix('admin')->group(function(){
    Route::get('/','AdminController@index')->name('index');
    Route::get('/events','AdminController@eventsList')->name('events.index');
    Route::get('/events/create','AdminController@eventCreate')->name('events.create');
    Route::get('/events/calendrier','AdminController@eventCalendar')->name('events.calendar');
    Route::get('/events/{event}','AdminController@eventShow')->name('events.show');
    Route::post('/events','AdminController@eventStore')->name('events.store');
    Route::get('/articles','AdminController@articlesList')->name('articles.liste');
    Route::get('/articles/creer','AdminController@articlesCreate')->name('articles.create');
    Route::get('/articles/{id}/modifier','AdminController@articlesEdit')->name('articles.edit');
    Route::post('/articles/{article}/update','AdminController@articlesUpdate')->name('articles.update');
    Route::post('/articles','AdminController@articlesStore')->name('articles.store');
    Route::get('/users','AdminController@usersList')->name('users.liste');
    Route::get('/users/{user}/delete','AdminController@usersDelete')->name('users.delete');
    Route::get('/users/creer','AdminController@usersCreate')->name('users.create');
    Route::get('/adhesions','AdminController@adhesions')->name('adhesions.liste');
    Route::get('/communications','AdminController@communications')->name('communications.liste');
    Route::post('/communications/valider','AdminController@communicationsValider')->name('communications.valider');
});

Route::prefix('hotesse')->group(function(){
    Route::get('/',function(){
        return view('hotesse.desk');
    })->middleware('auth');
});

Route::get('/email',function (){
    return view('emails.template',[
        'event' => \App\Event::find(1),
        'credentials' => [
            'email' => 'fouzi.noual@gmail.com',
            'password' => 'fnoual123'
        ]
    ]);
});


Route::get('/home', 'HomeController@index')->name('home');


Route::get('/log',function(){
    return \DB::getQueryLog();
});
