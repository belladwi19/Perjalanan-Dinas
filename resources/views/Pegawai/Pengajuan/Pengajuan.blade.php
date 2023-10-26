@extends('Home')

@section('content')
        <div class="col-lg-12">
            <div class="row">
                <div class="card overflow-hidden">
                    <form class="form form-horizontal mb-4" action="{{ route('store.perdin') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="card-body p-4">
                            <h5 class="card-title mb-9 fw-semibold">Pengajuan Perjalanan Dinas</h5>
                            <div class="row">
                                <div class="col">
                                    <label for="inputEmail4" class="form-label">Kota Asal</label>
                                    <select name="kotaasal" id="kotaasal" class="form-control">
                                        <option value="">== Select Kota ==</option>
                                        @foreach ($kota as $koti )
                                            <option value="{{ $koti->id }}">{{ $koti->namakota }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="inputEmail4" class="form-label">Kota Tujuan</label>
                                    <select name="kotatujuan" id="kotatujuan" class="form-control">
                                        <option value="">== Select Kota ==</option>
                                        @foreach ($kota as $koti )
                                            <option value="{{ $koti->id }}">{{ $koti->namakota }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="inputEmail4" class="form-label">Tanggal Berangkat</label>
                                    <input type="date" class="form-control" id="tanggalberangkat" name="tanggalberangkat">
                                </div>
                                <div class="col">
                                    <label for="inputEmail4" class="form-label">Tanggal Pulang</label>
                                    <input type="date" class="form-control" id="tanggalpulang" name="tanggalpulang">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="inputEmail4" class="form-label">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="d-grid gap-2 mt-4">
                                <button class="btn btn-primary " type="submit" >Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
@endsection