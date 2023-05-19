@extends('admintemplate')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="btn-group d-flex justify-content-between">
              <div class="d-flex justify-content-start mt-2">
                  <h5>Detail kendaraan</h5>
              </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <h6>Nama kendaraan : {{ $vehicle->name }}</h6>
                </div>

                <div class="col-3">
                    <h6>Plat nomor : {{ $vehicle->police_number }}</h6>
                </div>

                <div class="col-3">
                    <h6>Warna kendaraan : {{ $vehicle->color }}</h6>
                </div>
                <div class="col-3">
                    @if($vehicle->vehicle_type == 'freight_transport')
                        <h6>Tipe kendaraan : Muatan barang</h6>
                    @elseif($vehicle->vehicle_type == 'people_transport')
                        <h6>Tipe kendaraan : Muatan orang</h6>
                    @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-3">
                    @if($vehicle->ownership == 'company')
                        <h6>Kepemilikan : Milik perusahaan</h6>
                    @elseif($vehicle->ownership == 'rental')
                        <h6>Kepemilikan : Rental</h6>
                    @endif
                </div>
                <div class="col-3">
                    <h6>Konsumsi BBM : 1 : {{ $vehicle->fuel_consum }} KM</h6>
                </div>
                <div class="col-3">
                    <h6>Tanggal service : {{ $vehicle->service_date }}</h6>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="btn-group d-flex justify-content-between">
                              <div class="d-flex justify-content-start mt-2">
                                  <h5>Riwayat pemakaian kendaraan</h5>
                              </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama kendaraan</th>
                                            <th>Nama driver</th>
                                            <th>Tanggal pinjam</th>
                                            <th>Petugas acc 1</th>
                                            <th>Petugas acc 2</th>
                                            <th>Acc 1</th>
                                            <th>Acc 2</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($history as $item)
                                            <tr>
                                                <td>{{ $item->vehicle->name }}</td>
                                                <td>{{ $item->driver->name }}</td>
                                                <td>{{ $item->order_date }}</td>
                                                <td>{{ $item->staf_one }}</td>
                                                <td>{{ $item->staf_two }}</td>
                                                @if($item->acc_staf_one == 0)
                                                    <td>
                                                        <i class="fas fa-fw fa-times"></i>
                                                    </td>
                                                @elseif($item->acc_staf_one == 1)
                                                    <td>
                                                        <i class="fas fa-fw fa-check"></i>
                                                    </td>
                                                @endif
                                                
                                                @if($item->acc_staf_two == 0)
                                                    <td>
                                                        <i class="fas fa-fw fa-times"></i>
                                                    </td>
                                                @elseif($item->acc_staf_two == 1)
                                                    <td>
                                                        <i class="fas fa-fw fa-check"></i>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@endsection
