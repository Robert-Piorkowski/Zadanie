@extends('layouts.app')
@if(Auth::check())
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('DODAJ OPIS') }}</div>
                <div class="card-body">
                    <form method="GET" action="{{ route('addDescription') }}">
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Wpisz opis') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description">
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Dodaj') }}
                                </button><br><br>
                            </div>
                        </div>
                    </form><hr>
                    <form method="GET" action="{{ route('editDescription') }}">
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Edytuj opis') }}</label>
                            <div class="col-md-6">
                                <input id="descriptionNew" type="text" class="form-control @error('descriptionNew') is-invalid @enderror" name="descriptionNew">
                                @error('descriptionNew')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Który opis chcesz edytować?') }}</label>
                            <div class="col-md-6">
                                <select class="@error('descriptionOld') is-invalid @enderror" name="descriptionOld" id="descriptionOld">
                                    @foreach ($descriptions as $key => $description)
                                        <option value="{{ $description->id }}"> {{ $description->description }} </option>
                                    @endforeach
                                </select>
                                @error('descriptionOld')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edytuj') }}
                                </button><br><br>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('DODAJ CENĘ') }}</div>
                <div class="card-body">
                    <form method="GET" action="{{ route('addPrice') }}">
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Wpisz cenę') }}</label>
                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price">
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Dodaj') }}
                                </button><br><br>
                            </div>
                        </div>
                    </form><hr>
                    <form method="GET" action="{{ route('editPrice') }}">
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Edytuj opis') }}</label>
                            <div class="col-md-6">
                                <input id="priceNew" type="text" class="form-control @error('priceNew') is-invalid @enderror" name="priceNew">
                                @error('priceNew')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Którą cenę chcesz edytować?') }}</label>
                            <div class="col-md-6">
                                <select class="@error('priceOld') is-invalid @enderror" name="priceOld" id="priceOld">
                                    @foreach ($prices as $key => $price)
                                        <option value="{{ $price->id }}"> {{ $price->price }} </option>
                                    @endforeach
                                </select>
                                @error('priceOld')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edytuj') }}
                                </button><br><br>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('DODAJ PRODUKT') }}</div>
                <div class="card-body">
                    <form method="GET" action="{{ route('addProducts') }}">
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Wpisz nazwę produktu') }}</label>
                            <div class="col-md-6">
                                <input id="productName" type="text" class="form-control @error('productName') is-invalid @enderror" name="productName">
                                @error('productName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Wybierz opis') }}</label>
                            <div class="col-md-6">
                                <select class="@error('description') is-invalid @enderror" name="description" id="description">
                                    @foreach ($descriptions as $key => $description)
                                        <option value="{{ $description->id }}"> {{ $description->description }} </option>
                                    @endforeach
                                </select>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Wybierz cenę') }}</label>
                            <div class="col-md-6">
                                <select class="@error('price') is-invalid @enderror" name="price" id="price">
                                    @foreach ($prices as $key => $price)
                                        <option value="{{ $price->id }}"> {{ $price->price }} </option>
                                    @endforeach
                                </select>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Dodaj') }}
                                </button><br><br>
                            </div>
                        </div>
                    </form><hr>
                    <form method="GET" action="{{ route('editProducts') }}">
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Który produkt chcesz edytować?') }}</label>
                            <div class="col-md-6">
                                <select class="@error('productNameOld') is-invalid @enderror" name="productNameOld" id="productNameOld">
                                    @foreach ($products as $key => $product)
                                        <option value="{{ $product->id }}"> {{ $product->name }} </option>
                                    @endforeach
                                </select>
                                @error('productNameOld')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Wpisz nazwę produktu') }}</label>

                            <div class="col-md-6">
                                <input id="productNameNew" type="text" class="form-control @error('productNameNew') is-invalid @enderror" name="productNameNew">
                                @error('productNameNew')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Wybierz opis') }}</label>
                            <div class="col-md-6">
                                <select class="@error('descriptionNew') is-invalid @enderror" name="descriptionNew" id="descriptionNew">
                                    @foreach ($descriptions as $key => $description)
                                        <option value="{{ $description->id }}"> {{ $description->description }} </option>
                                    @endforeach
                                </select>
                                @error('descriptionNew')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Wybierz cenę') }}</label>
                            <div class="col-md-6">
                                <select class="@error('priceNew') is-invalid @enderror" name="priceNew" id="priceNew">
                                    @foreach ($prices as $key => $price)
                                        <option value="{{ $price->id }}"> {{ $price->price }} </option>
                                    @endforeach
                                </select>
                                @error('priceNew')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edytuj') }}
                                </button><br><br>
                            </div>
                        </div>
                    </form><hr>
                    <form method="GET" action="{{ route('deleteProducts') }}">
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Który produkt chcesz usunąć?') }}</label>
                            <div class="col-md-6">
                                <select class="@error('productNameOldDelete') is-invalid @enderror" name="productNameOldDelete" id="productNameOldDelete">
                                    @foreach ($products as $key => $product)
                                        <option value="{{ $product->id }}"> {{ $product->name }} </option>
                                    @endforeach
                                </select>
                                @error('productNameOldDelete')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Usuń') }}
                                </button><br><br>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@else
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Błąd') }}</div>
                <div class="card-body">
                    <h3> Zaloguj się, aby mieć możliwość edycji </h3>
                </div>
            </div>
        </div>
    </div>
</div><br>
@endsection
@endif