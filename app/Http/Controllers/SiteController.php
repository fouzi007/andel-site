<?php

namespace App\Http\Controllers;

use App\Article;
use App\Communication;
use App\Event;
use App\Http\Requests\StoreCommunicationRequest;
use App\Mail\ContactFormSubmittedMail;
use App\Notifications\EventParticipationNotification;
use App\Notifications\EventParticipationRegistredEvent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\User;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    /*
    /* Page d'accueil
    */
    public function index()
    {
      $articles = Article::publiable()->take(5)->get();
      return view('welcome',compact('articles'));
    }
    /*
    /* Page d'accueil
    */
    public function contact()
    {
      return view('contact');
    }

    public function events() {
        $events = \App\Event::orderBy('date_start','desc')->paginate(10);
        return view('events',compact('events'));

    }

    public function detailsEvent( Event $event ) {
        return view('event-details',compact('event'));
    }


    public function submitContact(Request $request)
    {
        $message = $request->except('_token');
        Mail::to('fouzi.noual@gmail.com')
            ->send(new ContactFormSubmittedMail($message));
        return redirect('/contact')->with('message','Votre message a été envoyé ! ');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function presentation() {
        return view('presentation');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function bureau() {
        return view('bureau');
    }

    /**
     * @param Event $event
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function participerEvenement( Event $event ) {
        if($event->is_active != true) {
            return back()->with('message','L\'évènement est clôturé.');
        }
        return view('events.participer',compact('event'));
    }

    public function processParticipation( Event $event , Request $request ) {
        $credentials = $request->only('email','password');
        if(\App\User::where('email',$request->email)->first()->alreadyRegistred($event->id)){
            return back()->withInput()->with('login-error','Vous êtes déjà inscrit dans cet évènement, connectez vous pour voir le statut de votre inscription . ');
        }
        if(Auth::attempt($credentials)){
            $user = Auth::user();
            $user->events()->attach($event,['is_active' => false]);
            $user->notify(new EventParticipationNotification($event));
            return redirect('home')->with('message','Vous avez été correctement pré-inscrits à l\'évènement : ' . $event->nom . ' vous serez notifiés par email une fois que celle-ci aura été validée');
        }
        else {
            return back()->withInput()->with('login-error','Les coordonées entrés ne sont pas valides.');
        }
    }

    public function processRegisterParticipation( Event $event , Request $request ) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|email:rfc,dns',
            'telephone' => 'required|unique:users',
            'password' => 'min:8|confirmed'
        ]);
        if($validator->fails()) {
         return back()->withErrors($validator, 'registerErrors')->withInput();
        }
        $attributes = $request->except('_token','password_confirmation');
        $attributes['role_id'] = 2;
        $attributes['password'] = bcrypt($request->password);

        $user = User::create($attributes);
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $user->events()->attach($event,['is_active' => false]);

        $user->notify(new EventParticipationRegistredEvent( $event , $credentials));

        Auth::login($user);

        return redirect('home')->with('message','Votre compte a été créé avec succès , et votre demande de participation à l\'évènement : ' . $event->nom . ' a été prise en charge , vous serez notifiés par email une fois que celle-ci aura été validée.');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function adhesionMaj() {
        if(auth()->user()->estAdherent()){
            return redirect('/home')->with('message','Vous êtes déjà adhérent.');
        }
        return view('adhesion.maj');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function adhesionMajSubmit(Request $request) {
        if($request->has('maj-required')) {
            auth()->user()->adhesions()->create([
                'date_start' => now(),
                'date_end' => now()->addYear(),
                'status' => false
            ]);
            return redirect('/home')->with('message','Votre demande d\'adhésion a bien été soumise, veuillez procéder au payment en espèce du montant de 4000 DA au siège du bureau . Une fois fait,  une réponse vous sera envoyé par e-mail vous confirmant l\'activation de votre adhésion');
        }
        return back();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function adhesion() {
        if(auth()->user()->adhesions->count() == 0) {
            return back()->with('message','Vous n\'avez aucune adhésion , active ou pas .');
        }
        $adhesion = auth()->user()->active_adhesion;
        return view('adhesion.index',compact('adhesion'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function annuaire() {
        return view('annuaire');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function liensUtiles() {
        return view('liens-utiles');
    }

    public function showArticle( Article $article ) {
        return view('article',compact('article'));
    }

    public function mediasIndex() {
        return view('medias.index');
    }

    public function mediasPhotos() {

        $photos = \App\Media::photos()->paginate(16);
        return view('medias.photos',compact('photos'));
    }

    public function mediasVideos() {
        $videos = \App\Media::videos()->paginate(16);

        return view('medias.videos',compact('videos'));
    }

    public function mediasPhotosEvent( Event $event ) {
        return view('medias.album-show',compact('event'));
    }

    public function myEvents() {
        return view('my-events');
    }

    public function communications() {
        return view('communications');
    }

    public function communicationsStore( StoreCommunicationRequest $request ) {
        $path = $request->file('file')->storeAs(
            '', sluggify($request->user()->name).'.pdf','appels'
        );

        $request->user()->communications()->create([
            'file_url' => $path,
            'event_id' => featured_event()->id
        ]);

        return back()->with('message','Communication envoyée avec succès .');
    }
}
