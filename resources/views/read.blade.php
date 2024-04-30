@extends('layouts.app')

@section('content')
        <div class="tab-content">
            <div class="tab-pane fade active show" id="tabPaneOne" role="tabpanel">
                <div class="row listAlias">
                    <div class="col-12 col-md-6 col-xl-4">
                        <!-- Card -->
                        <div class="card">
                            <img src="{{asset($image->path)}}" alt="{{$image->name}}" class="card-img-top" height="400">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">

                                        <!-- Name -->
                                        <h4 class="card-title mb-2 name">
                                            {{$image->name}}
                                        </h4>

                                        <!-- Location -->
                                        <p class="card-text small text-muted">
                                            @foreach($locations as $location)
                                                @if($location->id == $image->location_id)
                                                    {{$location->name}}
                                                @endif
                                            @endforeach
                                        </p>

                                        <!-- Date -->
                                        <p class="card-text small text-muted">
                                            {{$image->date}}
                                        </p>

                                        <!-- Description -->
                                        <p class="card-text mb-2">
                                            {{$image->description}}
                                        </p>

                                        <a class="btn btn-primary" href="/read/{{$image->id}}" role="button">Читать</a>
                                    </div>
                                </div> <!-- / .row -->
                            </div> <!-- / .card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
