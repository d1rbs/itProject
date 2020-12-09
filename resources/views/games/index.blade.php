@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Команди</h1>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container">
                            <form method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="form-group row">
                                        <div>
                                            @foreach($teams as $team)
                                                <a href="{{ url('games/view/'.$team->id)}}">{{ $team->name }}</a> <br>
                                            @endforeach
                                        </div>
                                    </div>  {{--close form-group row--}}
                                </div>  {{-- close form-group--}}
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection