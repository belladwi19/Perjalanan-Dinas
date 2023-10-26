@extends('Home')

@section('content')
        <div class="col-lg-12">
            <div class="row">
                <div class="card overflow-hidden">
                  <div class="card-body p-4">
                    <h5 class="card-title  fw-semibold">Perjalanan Dinas</h5>
                    <div class="d-grid gap-2">
                  <form action="{{ route('searchperdin.dataperdin') }}" method="GET" class="form-inline my-2 my-lg-0">
                    <div class="d-flex justify-content-end">
                      <div class="input-group " style="width: 300px;">
                          <input class="form-control" type="search" name="searchperdin" placeholder="Cari perjalanan dinas" aria-label="Search">
                          <button class="btn btn-secondary" type="submit">Cari</button>
                      </div>
                    </div>
                  </form>
                  
                </div>
                    <div class="table-responsive">
                  <table class="table text-nowrap mb-4 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">No</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nama Pegawai</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Kota Asal</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Kota Tujuan</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Tanggal</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Durasi</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Keterangan</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Status</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 0;
                        ?>
                        @foreach($perjalanan as $pr)
                        <?php
                            $no += 1;
                        ?>
                      <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$no}}</h6></td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">{{$pr->user->name}}</h6>                          
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">{{$pr->kotaasal}}</h6>                          
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">{{$pr->kotatujuan}}</h6>                          
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="mb-0 fw-normal">{{$pr->tanggalberangkat}} - {{$pr->tanggalpulang}}</h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">{{$pr->durasi}} Hari</h6>                          
                        </td>
                        <td class="border-bottom-0">
                            <div class="d-flex align-items-center gap-2">
                                @if($pr->Status == 'Pending')
                                    <span class="badge bg-primary rounded-3 fw-semibold">{{$pr->Status}}</span>
                                @elseif($pr->Status == 'Reject')
                                    <span class="badge bg-danger rounded-3 fw-semibold">{{$pr->Status}}</span>
                                @else
                                    <span class="badge bg-success rounded-3 fw-semibold">{{$pr->Status}}</span>
                                @endif
                            </div>
                        </td>
                        <td class="border-bottom-0">
                            <a type="button" class="btn btn-info" href="{{route('detailperdin', $pr->id)}}">
                                <i class="ti ti-eye"></i>  Detail
                            </a>
                        </td>
                      </tr>     
                      
                      @endforeach                 
                    </tbody>
                    
                  </table>
                  {!! $perjalanan->withQueryString()->links('pagination::bootstrap-5') !!}
                </div>
                  </div>
                </div>
            </div>
        </div>

        
@endsection