@extends('admintemplate')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12 margin-tb">
          <div class="card">
            <div class="card-header pb-0">
              <h5>Edit data kendaraan <span class="font-weight-bolder text-uppercase"></span></h5>
            </div>
 
            <div class="card-body">
              <form action="{{ route('admin.vehicle.update', $vehicle->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Merk kendaraan</label>
                          <input type="text" name="name" value="{{ $vehicle->name }}" class="form-control">
                        </div>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Plat nomor</label>
                          <input type="text" name="police_number" value="{{ $vehicle->police_number }}" class="form-control">
                        </div>
                        @error('police_number')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Warna kendaraan</label>
                          <input type="text" name="color" value="{{ $vehicle->color }}" class="form-control">
                        </div>
                        @error('color')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Jenis kendaraan</label>
                            <select class="form-control" name="vehicle_type">
                                @if($vehicle->vehicle_type == 'freight_transport')
                                    <option disabled>-- Pilih jenis kendaraan --</option>
                                    <option selected value='freight_transport'>Angkutan barang</option>
                                    <option value='people_transport'>Angkutan orang</option>
                                @elseif($vehicle->vehicle_type == 'people_transport')
                                    <option disabled>-- Pilih jenis kendaraan --</option>
                                    <option value='freight_transport'>Angkutan barang</option>
                                    <option selected value='people_transport'>Angkutan orang</option>
                                @endif
                            </select>
                        </div>
                        @error('vehicle_type')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Kepemilikan</label>
                            <select class="form-control" name="ownership">
                                @if($vehicle->ownership == 'company')
                                    <option disabled>-- Pilih kepemilikan kendaraan --</option>
                                    <option selected value='company'>Kendaraan perusahaan</option>
                                    <option value='rental'>Kendaraan rental</option>
                                @elseif($vehicle->ownership == 'rental')
                                    <option disabled>-- Pilih kepemilikan kendaraan --</option>
                                    <option value='company'>Kendaraan perusahaan</option>
                                    <option selected value='rental'>Kendaraan rental</option>
                                @endif
                                
                            </select>
                        </div>
                        @error('ownership')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <label>Konsumsi BBM (KM/Liter)</label>
                        <div class="input-group mb-2">
                          <input type="number" class="form-control" value="{{ $vehicle->fuel_consum }}" name="fuel_consum">
                          <div class="input-group-prepend">
                            <div class="input-group-text">KM</div>
                          </div>
                        </div>
                        @error('fuel_consum')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Tanggal service</label>
                          <input type="date" name="service_date" value="{{ $vehicle->service_date }}" class="form-control">
                        </div>
                        @error('service_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>

                  <div class="mt-5 mb-n4">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">
                        Submit
                      </button>
                    </div>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection