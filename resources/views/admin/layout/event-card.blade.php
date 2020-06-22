<div class="col-md-4">
    <div class="card shadow">
        <div class="card-img-top">
            <img src="{{ asset($event->image) }}" alt="" class=" img-fluid">
        </div>
        <div class="card-body pt-2">
            <div class="media mb-3">
                <div class="media-body">
                    <h3 class="card-title mb-2 text-truncate">
                        <a href="{{ route('admin.events.show',$event) }}">{{ $event->nom }}</a>
                    </h3>
                    <h6 class="card-subtitle text-muted "><i
                            class="fa fa-calendar-alt"></i> {{ $event->date_start->format('d-m') }}
                        au {{ $event->date_end->format('d-m-Y') }} <i class="fa fa-map-marker"></i> {{ $event->lieu }}
                    </h6>
                </div>
                <button class="btn btn-sm btn-secondary"
                        {{ featured_event()->id == $event->id ? 'disabled' : '' }} onclick="makeFeatured()">
                    <i class="fa fa-fw fa-check"></i> À la une
                </button>
            </div>
            <div class="row text-center">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="metric">
                        <h6 class="metric-value"> {{ $event->participants->count() }} </h6>
                        <p class="metric-label"> Inscrits </p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="metric">
                        <h6 class="metric-value"> 0 </h6>
                        <p class="metric-label"> Activités </p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="metric">
                        <h6 class="metric-value"> 0 </h6>
                        <p class="metric-label"> Orateurs </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
