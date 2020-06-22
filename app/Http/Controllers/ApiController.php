<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\ApiStoreMedecinRequest;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller {
    public function saveActivite() {
        $event = Event::find( request()->event_id );
        $event->addActivite( request()->debut, request()->fin, request()->description, request()->jour );

        return response()->json();
    }


    public function affectSubscription( Request $request ) {
        $entry = \DB::table( 'user_events' )
                    ->where( 'event_id', $request->event_id )
                    ->where( 'user_id', $request->user_id )
                    ->update( [ 'is_active' => $request->update ] );

        return response()->json();
    }

    public function allMedecins( $id, Request $request ) {
        $event = Event::find( $id );
        if ( $request->search !== null ) {
            return $event->participants()
                         ->where('nom','like','%'.$request->search.'%')
                          ->orWhere('prenom','like','%'.$request->search.'%')
                         ->paginate(15);
        } else {
            return \App\User::whereHas( 'events', function ( Builder $query ) use ( $id ) {
                $query->where( 'event_id', $id );
            } )->paginate( 15 );
        }

    }

  public function storeMedecin( Request $request /*ApiStoreMedecinRequest*/ ) {

        $user = User::create([
            'nom' => strtoupper($request->medecin['nom']),
            'prenom' => strtoupper($request->medecin['prenom']),
            'email' => $request->medecin['email'],
            'statut' => $request->medecin['statut'],
            'specialite' => $request->medecin['specialite'],
            'wilaya_id' => $request->medecin['wilaya_id'],
            'password' => bcrypt('fnoual123'),
            'role_id' => 2,
            'is_active' => true
        ]);

        $user->events()->attach(featured_event(),['is_active' => true]);
        if($request->has('medecin.adhesion')){
          $user->adhesions()->create([
            'date_start' => now(),
            'date_end' => now()->addYear(),
            'status' => true
          ]);
        }
        return response()->json();
    }

    public function checkRegistration(Request $request) {
        $user = User::find($request->id);

        return $user->events()->find(featured_event())->pivot->is_active;
    }
}
