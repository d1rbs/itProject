@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Created new Game</h1>
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
                                        <label for="k1" class="col-md-4 col-form-label text-md-right">{{ __('k1:') }}</label>
                                        <div  class="col-md-6">
                                            <select name="k1" class="col-md-8 col-form-label text-md-right">
                                                @foreach($teams as $team)
                                                    <option value="{{ $team->id}}" name="team[]">{{ $team->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                            <label for="k2" class="col-md-4 col-form-label text-md-right">{{ __('k2:') }}</label>
                                            <div  class="col-md-6">
                                                <select name="k2" class="col-md-8 col-form-label text-md-right">
                                                    @foreach($teams as $team)
                                                        <option value="{{ $team->id}}" name="team[]">{{ $team->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        <label for="g1" class="col-md-4 col-form-label text-md-right">{{ __('g1:') }}</label>
                                        <div class="col-md-6">
                                            <input type="number" name="g1" id="g1" class="col-md-4 form-control{{ $errors->has('g1') ? ' is-invalid' : '' }}" value="{{ old('g1') }}" autofocus>
                                            @if(!empty($errors) && $errors->has('g1'))
                                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('g1') }}</strong></span>
                                            @endif
                                        </div>

                                        <label for="g2" class="col-md-4 col-form-label text-md-right">{{ __('g2:') }}</label>
                                        <div class="col-md-6">
                                            <input type="number" name="g2" id="g2" class="col-md-4 form-control{{ $errors->has('g2') ? ' is-invalid' : '' }}" value="{{ old('g2') }}" autofocus>
                                            @if(!empty($errors) && $errors->has('g2'))
                                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('g2') }}</strong></span>
                                            @endif
                                        </div>

                                    <label for="done" class="col-md-4 col-form-label text-md-right">{{ __('Статус матча:') }}</label>
                                    <div class="col-md-6">
                                        <input type="number" name="done" id="done" class="col-md-2 form-control{{ $errors->has('height') ? ' is-invalid' : '' }}" value="{{ old('done') }}" autofocus>
                                        @if(!empty($errors) && $errors->has('done'))
                                            <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('done') }}</strong></span>
                                        @endif
                                    </div>

                                    </div>
                                    {{--close form-group row--}}
                                </div>
                               {{-- close form-group--}}

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Відправити') }}
                                        </button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection