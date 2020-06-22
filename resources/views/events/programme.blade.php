<h3>Programme de l'èvenement </h3>

@forelse($event->activite->groupBy('jour') as $journee)
    <h4 class="my-2">{{ $journee->first()->journee  }} Jour</h4>
    @foreach($journee as $activite)
        <i class="fal fa-clock"></i> <strong>{{ $activite->debut }}</strong> - <strong>{{ $activite->fin }}</strong> :
        {{ $activite->description }} <br>
    @endforeach
@empty
@endforelse


<a href="#" class="btn btn-primary btn-sm rounded-0 mt-2"><i class="fal fa-calendar-plus"></i> Ajouter à mon agenda Google </a>
