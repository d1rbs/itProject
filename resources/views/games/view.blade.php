@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('games/view/'.request()->id)}}">{{ $team->name }}</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container">
                                <div class="form-group">  {{--form-group--}}
                                    <div class="form-group row"> {{--form-group row--}}
                                        <div class="col-md-6">
                                            <p>Число зіграні командою ігор: {{ $analytics['countGamesCommand'] }}</p>
                                            <p>ігор виграно: {{ $analytics['winGamesCommand'] }}</p>
                                            <p>ігор програно: {{ $analytics['lostGamesCommand'] }}</p>
                                            <p>ігор в нічию: {{ $analytics['drawGamesCommand'] }}</p>
                                            <p>Коефіцієнт: {{ $analytics['coefficient'] }}</p>
                                            <p>Всього очків: {{ $analytics['points'] }}</p>
                                        </div>
                                    <div>{{--close form-group row--}}
                                </div>{{-- close form-group--}}
                        </div>
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>
</div>
@endsection