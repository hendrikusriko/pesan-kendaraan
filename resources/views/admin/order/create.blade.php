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
              <h5>Tambah data pemesan kendaraan <span class="font-weight-bolder text-uppercase"></span></h5>
            </div>
 
            <div class="card-body">
              <form action="{{ route('admin.order.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Tanggal pesan</label>
                          <input type="date" name="order_date" class="form-control">
                        </div>
                        @error('order_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Nama kendaraan</label>
                            <select class="form-control" name="vehicle_id">
                              <option selected disabled>-- Pilih nama kendaraan --</option>
                              @foreach ($vehicle as $vehicle)
                                  @if (old('vehicle_id') == $vehicle->id)
                                      <option value='{{ $vehicle->id }}' selected>{{ $vehicle->name }}</option>
                                  @else
                                      <option value='{{ $vehicle->id }}'>{{ $vehicle->name }}</option>
                                  @endif
                              @endforeach
                            </select>
                        </div>
                        @error('vehicle_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Nama driver</label>
                            <select class="form-control" name="driver_id">
                              <option selected disabled>-- Pilih nama kendaraan --</option>
                              @foreach ($driver as $driver)
                                  @if (old('driver_id') == $driver->id)
                                      <option value='{{ $driver->id }}' selected>{{ $driver->name }}</option>
                                  @else
                                      <option value='{{ $driver->id }}'>{{ $driver->name }}</option>
                                  @endif
                              @endforeach
                            </select>
                        </div>
                        @error('driver_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Nama staf yang menyetujui (1)</label>
                            <select class="form-control" name="staf_one">
                              <option selected disabled>-- Pilih nama staf --</option>
                              @foreach ($user as $item)
                                  @if (old('staf_one') == $item->id)
                                      <option value='{{ $item->id }}' selected>{{ $item->name }}</option>
                                  @else
                                      <option value='{{ $item->id }}'>{{ $item->name }}</option>
                                  @endif
                              @endforeach
                            </select>
                        </div>
                        @error('staf_one')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Nama staf yang menyetujui (2)</label>
                            <select class="form-control" name="staf_two">
                              <option selected disabled>-- Pilih nama staf --</option>
                              @foreach ($user as $item2)
                                  @if (old('staf_two') == $item2->id)
                                      <option value='{{ $item2->id }}' selected>{{ $item2->name }}</option>
                                  @else
                                      <option value='{{ $item2->id }}'>{{ $item2->name }}</option>
                                  @endif
                              @endforeach
                            </select>
                        </div>
                        @error('staf_two')
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