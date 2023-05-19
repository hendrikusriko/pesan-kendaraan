@extends('admintemplate')

@section('content')
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="btn-group d-flex justify-content-between">
                              <div class="d-flex justify-content-start mt-2">
                                  <h5>Data pemesan kendaraan</h5>
                              </div>

                              <div class="d-flex justify-content-end mb-3">
                                  <div class="mb-n3">
                                  <a href="{{ route('admin.order.create') }}">
                                      <button class="btn btn-primary">
                                          Tambah Data
                                      </button>
                                  </a>
                                  </div>
                              </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama kendaraan</th>
                                            <th>Nama driver</th>
                                            <th>Tanggal pinjam</th>
                                            <th>Petugas acc 1</th>
                                            <th>Petugas acc 2</th>
                                            <th>Jumlah ACC</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@endsection

@push('js')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>


    <script type="text/javascript">
        $(function() {
            var table = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5', 
                        footer: true,
                        title: 'Income Report'
                    },
                ],
                ajax: "{{ route('admin.order.datatables') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'driver.name',
                        name: 'driver.name'
                    },
                    {
                        data: 'vehicle.name',
                        name: 'vehicle.name'
                    },
                    {
                        data: 'order_date',
                        name: 'order_date'
                    },
                    {
                        data: 'staf_one.name',
                        name: 'staf_one.name'
                    },
                    {
                        data: 'staf_two.name',
                        name: 'staf_two.name'
                    },
                    {
                        data: 'acc_mark',
                        name: 'acc_mark'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });
        });
    </script>
@endpush
