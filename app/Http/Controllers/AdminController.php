<?php

namespace App\Http\Controllers;

use App\Adhesion;
use App\Article;
use App\Communication;
use App\Event;
use App\Http\Requests\EventCreateRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        return view('admin.dashboard');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adhesions() {
        $adhesions = Adhesion::paginate(15);
        return view('admin.adhesions.index',compact('adhesions'));
    }

    public function articlesList (  ) {
        $articles = Article::paginate(15);
        return view('admin.articles.index',compact('articles'));
    }

    public function articlesEdit( $id ) {
        $article = Article::find($id);
        return view('admin.articles.edit',compact('article'));

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function usersList() {
        $users = User::paginate(15);
        return view('admin.users.index',compact('users'));
    }

    public function usersDelete( User $user ) {
        $this->authorize('delete', $user);
        $user->delete();
        return back()->with('mesage','Utilisateur supprimé avec succès');
    }

    public function usersCreate() {
        return back()->with('message','Cette fonctionalité est en cours de développement .');
    }

    public function eventsList() {
        $events = Event::all();
        return view('admin.events.index',compact('events'));
    }

    public function eventCreate() {
        return view('admin.events.create');
    }

    public function eventStore( EventCreateRequest $request ) {
        $attributes = $request->except('_token','latitude','longitude');
        $attributes['coordonnes'] = json_encode(['lat' => $request->latitude, 'long' => $request->longitude]);
        $attributes['created_by_id'] = auth()->id();
        $attributes['date_start'] = Carbon::parse($attributes['date_start']);
        $attributes['date_end'] = Carbon::parse($attributes['date_end']);
        $attributes['slug'] = sluggify($attributes['nom']);
        $attributes['is_active'] = $request->has('is_active');
        $event = Event::create($attributes);
        return redirect(route('admin.events.show',$event));
    }

    public function eventShow( Event $event ) {
        return view('admin.events.show',compact('event'));
    }

    public function eventCalendar() {
        $events = Event::all();
        $data = $events->map(function($event){
            return [
                'title' => $event->nom,
                'start' => $event->date_start->format('Y-m-d'),
                'end' => $event->date_end->format('Y-m-d')
            ];
        });
        return view('admin.events.calendar',compact('data'));
    }

    public function articlesCreate () {
        return view('admin.articles.create');
    }

    public function articlesStore( Request $request ) {
        $article = new Article();
        $article->titre = $request->titre;
        $article->slug = Str::slug(now()->format('m-Y-').$request->titre);
        $article->article = $request->article;
        $article->type = $request->type;
        $article->created_by_id = auth()->id();
        $article->is_published = $request->has('is_published');
        $article->save();

        return redirect('/admin/articles')->with('message','Article créé : ' . $request->titre);
    }

    public function communications() {
        $communications = Communication::paginate(15);
        return view('admin.communications.index',compact('communications'));
    }

    public function communicationsValider( Request $request ) {
        $communication = Communication::find($request->id);

        $communication->is_active = true;

        $communication->save();

        return back()->with('message','La communication a été validée.');
    }
}
