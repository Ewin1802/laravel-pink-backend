@extends('layouts.app')

@section('title', 'Products')
{{-- Favicon - Logo web disamping title --}}
<link rel="icon" href="{{ asset('img/logo_arch_web.png') }}" type="image/png">
@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Produk Donat Cinta</h1>
                <div class="section-header-button">
                    <a href="{{ route('products.create') }}" class="btn btn-primary">Tambah Produk</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Produk</a></div>
                    <div class="breadcrumb-item">Produk Donat Cinta</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Semua Produk</h4>
                            </div>
                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET" action="{{ route('products.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="name">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>
                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Nama Produk</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Dibuat tanggal</th>
                                            <th>Aksi</th>
                                        </tr>

                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if ($product->image)
                                                        <img src="{{ asset($product->image) }}" width="50" height="50" alt="{{ $product->name }}">
                                                    @else
                                                        <span>Tidak ada gambar</span>
                                                    @endif
                                                </td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->category_name }}</td>
                                                <td>{{ number_format($product->price, 0, ',', '.') }}</td>
                                                <td>{{ $product->status == 1 ? 'Active' : 'Inactive' }}</td>
                                                <td>{{ $product->created_at }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('products.edit', $product->id) }}' class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>

                                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="ml-2">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>


                                <div class="float-right">
                                    {{ $products->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
    <script>
        function formatPrice(input) {
            // Hilangkan semua karakter non-digit (kecuali angka)
            let value = input.value.replace(/[^,\d]/g, '');

            // Gunakan regex untuk menambahkan pemisah ribuan
            let formatted = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

            // Perbarui nilai input
            input.value = formatted;
        }

        document.addEventListener('DOMContentLoaded', function () {
            const priceInput = document.getElementById('price_input');

            // Format ulang saat halaman dimuat ulang, jika sudah ada value
            if (priceInput.value) {
                priceInput.value = priceInput.value.replace(/[^,\d]/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            }
        });
    </script>

@endpush
