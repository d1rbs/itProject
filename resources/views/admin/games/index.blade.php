@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Update Game</h1>
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
                                        <div class="col-md-6">
                                        <h5>Відкриті ігри:</h5>
                                        </div>
                                            <div>
                                             @foreach($objects as $object)
                                              <a href="{{ url('admin/games/update/'.$object->id)}}">{{ $object->relationK1->name }} vs {{ $object->relationK2->name }}</a> <br>
                                                @endforeach
                                              </div>
                                    </div> {{--close form-group row--}}
                                </div> {{-- close form-group--}}
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection