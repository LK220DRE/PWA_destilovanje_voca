@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Admin Dashboard</h1>
    
    <div class="card shadow">
        <div class="card-header">Poslednje narudžbine</div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Datum</th>
                        <th>Korisnik</th>
                        <th>Iznos</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->created_at->format('d.m.Y.') }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ number_format($order->total_price, 2) }} RSD</td>
                        <td>{{ $order->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection