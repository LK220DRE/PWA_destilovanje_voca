{{-- resources/views/admin/products/index.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between mb-4">
        <h1>Upravljanje proizvodima</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Dodaj novi proizvod
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Slika</th>
                            <th>Naziv</th>
                            <th>Cena</th>
                            <th>Destilerija</th>
                            <th>Istaknuto</th>
                            <th>Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>
                                @if($product->image)
                                <img src="{{ asset('storage/'.$product->image) }}"
                                    alt="{{ $product->name }}"
                                    style="width: 80px; height: 80px; object-fit: cover">
                                @else
                                <div class="text-muted">Nema slike</div>
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ number_format($product->price, 2) }} RSD</td>
                            <td>{{ $product->distillery->name }}</td>
                            <td>
                                @if($product->is_featured)
                                <span class="badge bg-success">Da</span>
                                @else
                                <span class="badge bg-secondary">Ne</span>
                                @endif
                            </td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('admin.products.edit', $product) }}"
                                    class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Da li ste sigurni?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/sr-SP.json"
            }
        });
    });
</script>
@endsection