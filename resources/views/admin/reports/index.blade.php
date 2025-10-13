@extends('admin.layouts.app')

@section('title', 'Laporan Pemesanan - Admin')
@section('page-title', 'Laporan Pemesanan')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Ringkasan Laporan</h5>

            <div class="d-flex align-items-center">
                <form method="GET" class="me-3">
                    <label for="month" class="form-label mb-0 me-2">Bulan</label>
                    <select name="month" id="month" class="form-select form-select-sm d-inline-block" style="width:120px;">
                        <option value="">Semua</option>
                        @for($m = 1; $m <= 12; $m++)
                            <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>Bulan {{ $m }}</option>
                        @endfor
                    </select>
                    <button class="btn btn-sm btn-primary ms-2" type="submit">Terapkan</button>
                </form>

                <div>
                    @php $q = request()->only('month'); @endphp
                    <a href="{{ route('admin.reports.export', $q) }}" class="btn btn-outline-secondary btn-sm me-2">Export CSV</a>
                    <a href="{{ route('admin.reports.pdf', $q) }}" class="btn btn-outline-secondary btn-sm">Export PDF</a>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card p-3">
                    <div class="text-muted">Total Pesanan</div>
                    <h3>{{ $summary['total_orders'] }}</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3">
                    <div class="text-muted">Total Pendapatan</div>
                    <h3>Rp {{ number_format($summary['total_revenue'], 0, ',', '.') }}</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3">
                    <div class="text-muted">Sudah Bayar</div>
                    <h3>{{ $summary['paid'] }}</h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3">
                    <div class="text-muted">Belum Bayar</div>
                    <h3>{{ $summary['unpaid'] }}</h3>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">Daftar Pesanan (Dummy)</div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>No Pesanan</th>
                                <th>Pelanggan</th>
                                <th>Jasa</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reports as $r)
                                <tr>
                                    <td>{{ $r['order_no'] }}</td>
                                    <td>{{ $r['customer'] }}</td>
                                    <td>{{ $r['service'] }}</td>
                                    <td>{{ $r['date'] }}</td>
                                    <td>
                                        @if($r['status'] === 'Lunas')
                                            <span class="badge bg-success">Lunas</span>
                                        @elseif($r['status'] === 'Belum Bayar')
                                            <span class="badge bg-warning text-dark">Belum Bayar</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $r['status'] }}</span>
                                        @endif
                                    </td>
                                    <td class="text-end">Rp {{ number_format($r['total'], 0, ',', '.') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
