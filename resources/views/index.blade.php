@extends('layouts.app')

@section('content')
    <main class="px-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2>Búsqueda Global del Clima</h2>
                    <form action="{{ route('search') }}" method="get">
                        @csrf
                        <div class="form-group">
                            <label for="city">
                                Introduce el nombre de la ciudad
                            </label>
                            <input type="text" class="form-control mt-2" name="city" id="city"
                                placeholder="Nombre de la ciudad">
                            @error('city')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        @isset($notFound)
                            <div class="alert alert-danger mt-3" role="alert">
                                Ciudad no encontrada, intente de nuevo!
                            </div>
                        @endisset

                        <button type="submit" class="btn btn-success mt-3">Consultar</button>
                    </form>
                </div>

                <div class="col-md-4">
                    @isset($ok)
                        <div class="col-md-12">
                            <h5>{{ $main }}</h5>
                            <h1>{{ intval($temp) }}&deg;C</h1>
                        </div>

                        <div class="col-md-12">
                            <h3>{{ $name }}, {{ $country }}</h3>
                        </div>

                        <div class="col-md-12">
                            <h4>{{ $weather }}</h4>
                        </div>
                    @endisset

                </div>
            </div>
        </div>

    </main>
@endsection
