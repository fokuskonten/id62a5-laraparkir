@extends('master_layout.master')

@section('title','Data Parkiran Keluar')

@section('content')
<div class="row">
    <div class="col-md-12">
        <br>
        <div class="card card-default">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0 font-weight-bold"><span class="fa fa-car mr-2"></span> Data Riwayat Parkiran Keluar</h4>
                <form action="{{ url('/transaksi/searchKeluar') }}" method="get" class="form-inline">
                    <input type="text" name="cari" placeholder="Cari Plat Nomor..." class="form-control form-control-sm mr-2" required>
                    <button type="submit" class="btn btn-sm btn-primary"><span class="fa fa-search"></span> Cari</button>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Kode Karcis</th>
                                <th class="text-center">Plat Nomor</th>
                                <th class="text-center">Jenis Kendaraan</th>
                                <th class="text-center">Jam Keluar</th>
                                <th class="text-center">Tanggal Keluar</th>
                                <th class="text-center">Total Biaya</th>
                                <th class="text-center">Nominal Bayar</th>
                                <th class="text-center">Kembalian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @forelse ($data as $item)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td class="text-center"><span class="badge badge-info">{{ $item->code }}</span></td>
                                <td class="text-center font-weight-bold">{{ $item->plat_nomor }}</td>
                                <td class="text-center">{{ $item->jenis_kendaraan }}</td>
                                <td class="text-center">{{ $item->jam_keluar }}</td>
                                <td class="text-center">{{ $item->tgl_keluar }}</td>
                                <td class="text-right font-weight-bold text-success">Rp {{ number_format($item->total) }}</td>
                                <td class="text-right">Rp {{ number_format($item->bayar) }}</td>
                                <td class="text-right">Rp {{ number_format($item->kembalian) }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted py-4">Belum ada riwayat kendaraan keluar.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    {{ $data->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
