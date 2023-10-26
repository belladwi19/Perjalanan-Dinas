@extends('Home')

@section('content')

        <div class="row">
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Data Kota</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-secondary alert-block mt-2 ms-4 mx-4 mb-4">   
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if (session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="d-grid gap-2">
                  <button type="button" class="btn btn-secondary mb-4 " onClick="create()"><i class="bx bx-add me-1"></i>Tambah Kota</button>
                </div>  
                <div class="d-grid gap-2">
                <form action="{{ route('search.datakota') }}" method="GET" class="form-inline my-2 my-lg-0">
                    <div class="d-flex justify-content-end">
                        <div class="input-group" style="width: 300px;">
                            <input class="form-control" type="search" name="search" placeholder="Cari" aria-label="Search">
                            <button class="btn btn-secondary" type="submit">Cari</button>
                        </div>
                    </div>
                </form>

                </div>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">No</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nama Kota</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Provinsi</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Pulau</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Latitude</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Longitude</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Action</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 0;
                        ?>
                        @foreach($kota as $pr)
                        <?php
                            $no += 1;
                        ?>
                      <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$no}}</h6></td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">{{$pr->namakota}}</h6>                          
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">{{$pr->provinsi}}</h6>                          
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">{{$pr->pulau}}</h6>                          
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="mb-0 fw-normal">{{$pr->latitude}}</h6>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="mb-0 fw-normal">{{$pr->longitude}}</h6>
                        </td>
                        
                        <td class="border-bottom-0">
                            <button type="button" class="btn btn-warning" onClick="show({{ $pr->id }})">
                                <i class="ti ti-edit"></i>  Ubah
                            </button>
                            <a href="{{route('deletekota', $pr->id)}}" type="button" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="ti ti-trash"></i>  Delete
                            </a>
                        </td>
                      </tr>     
                      @endforeach                 
                    </tbody>
                  </table>
                  {!! $kota->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
              </div>
            </div>
          </div>
        </div>

              <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalCenterTitle">Data Kota</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                      <div id="page" class="p-2"></div>
                    </div>
                  </div>
                </div>
              </div>

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
      <script>

        // Untuk modal halaman create
        function create() {
            $.get("{{ url('createkota') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('Daftar Kota')
                $("#page").html(data);
                $("#exampleModal").modal('show');

            });
        }

        // Untuk modal halaman update
        function show(id) {
            $.get("{{ url('showkota') }}/"+ id, {}, function(data, status) {
                $("#exampleModalLabel").html('Detail Kota')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }

    </script>
        
@endsection