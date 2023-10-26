@extends('Home')

@section('content')

        <div class="row">
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Data Pegawai</h5>
                @if ($message = Session::get('success'))
                    <div class="alert alert-secondary alert-block mt-2 ms-4 mx-4 mb-4">   
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if (session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="d-grid gap-2">
                  <button type="button" class="btn btn-secondary mb-4 " onClick="create()"><i class="bx bx-add me-1"></i>Pendaftaran Pegawai</button>
                </div>  
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">No</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nama</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Email</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">NIP</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Status</h6>
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
                        @foreach($user as $pr)
                        <?php
                            $no += 1;
                        ?>
                      <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$no}}</h6></td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">{{$pr->name}}</h6>                          
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">{{$pr->email}}</h6>                          
                        </td>
                        <td class="border-bottom-0">
                        <p class="mb-0 fw-normal">{{ $pr->pegawai ? $pr->pegawai->NIP : 'N/A' }}</p>
                        </td>
                        <td class="border-bottom-0">
                          <div class="d-flex align-items-center gap-2">
                            @if($pr->is_Admin == '0')
                                <span class="badge bg-primary rounded-3 fw-semibold">Admin</span>
                            @elseif($pr->is_Admin == '1')
                                <span class="badge bg-danger rounded-3 fw-semibold">Pegawai</span>
                            @else
                                <span class="badge bg-success rounded-3 fw-semibold">SDM</span>
                            @endif
                          </div>
                        </td>
                        <td class="border-bottom-0">
                            <button type="button" class="btn btn-info" onClick="show({{ $pr->id }})">
                                <i class="ti ti-eye"></i>  Detail
                            </button>
                            <button type="button" class="btn btn-warning" onClick="">
                                <i class="ti ti-edit"></i>  Ubah
                            </button>
                            <a href="" type="button" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="ti ti-trash"></i>  Delete
                            </a>
                        </td>
                      </tr>     
                      @endforeach                 
                    </tbody>
                  </table>
                  {!! $user->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
              </div>
            </div>
          </div>
        </div>

              <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalCenterTitle">Data Pegawai</h5>
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
            $.get("{{ url('create') }}", {}, function(data, status) {
                $("#exampleModalLabel").html('Daftar Pegawai')
                $("#page").html(data);
                $("#exampleModal").modal('show');

            });
        }

        // Untuk modal halaman update
        function show(id) {
            $.get("{{ url('show') }}/"+ id, {}, function(data, status) {
                $("#exampleModalLabel").html('Detail Pegawai')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }

    </script>
        
@endsection