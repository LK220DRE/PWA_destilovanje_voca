@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="display-4">Dobrodošli u Destilaciju Voća</h1>
            <p class="lead">Premium destilovani proizvodi od najkvalitetnijeg domaćeg voća</p>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-12">
            <h2 class="mb-4">Istaknuti proizvodi</h2>
            <div class="row">
                @forelse($featuredProducts as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow">
                        <img src="{{ $product->image_url }}"
                            class="card-img-top"
                            alt="{{ $product->name }}"
                            style="height: 250px; object-fit: cover">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="text-muted">{{ $product->distillery->name }}</p>
                            <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h5 text-primary">
                                    {{ number_format($product->price, 2) }} RSD
                                </span>
                                <a href="{{ route('products.show', $product) }}"
                                    class="btn btn-outline-primary">
                                    Detaljnije
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="alert alert-info">Trenutno nema istaknutih proizvoda</div>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h3>O nama</h3>
                    <p>Sa preko 50 godina tradicije, specijalizovali smo se za proizvodnju vrhunskih destilata od savršenog domaćeg voća. Naša posvećenost kvalitetu i tradicionalnim metodama rada čini nas liderom u regionu.</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h3>Najnovije u ponudi</h3>
                    <ul class="list-group">
                        @foreach($newProducts as $product)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $product->name }}
                            <span class="badge bg-primary rounded-pill">
                                {{ number_format($product->price, 2) }} RSD
                            </span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection