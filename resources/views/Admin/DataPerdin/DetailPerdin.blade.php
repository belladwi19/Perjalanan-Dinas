@extends('Home')


@section('content')

        <div class="col-lg-12">
            <div class="row">
                <div class="card overflow-hidden">
                        <div class="card-body p-4">
                            <h6 class="card-title mb-9 fw-semibold">Detail Perjalanan Dinas</h6>
                            <a href="" class="btn btn-primary">Download PDF</a>

                            <div class="row">
                                <div class="col">
                                    <label for="inputEmail4" class="form-label">Nama Pegawai</label>
                                    <h6>{{$perjalanan->user->name}}</h6>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="inputEmail4" class="form-label">Kota Asal</label>
                                    <h6>{{$perjalanan->kotaasal}}</h6>
                                </div>
                                <div class="col">
                                    <label for="inputEmail4" class="form-label">Kota Tujuan</label>
                                    <h6>{{$perjalanan->kotatujuan}}</h6>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="inputEmail4" class="form-label">Tanggal Berangkat</label>
                                    <h6>{{$perjalanan->tanggalberangkat}}</h6>
                                </div>
                                <div class="col">
                                    <label for="inputEmail4" class="form-label">Tanggal Pulang</label>
                                    <h6>{{$perjalanan->tanggalpulang}}</h6>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="inputEmail4" class="form-label">Keterangan</label>
                                    <h6>{{$perjalanan->keterangan}}</h6>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="inputEmail4" class="form-label">Total Hari</label>
                                    <h6>{{$perjalanan->durasi}} Hari</h6>
                                </div>
                                <div class="col">
                                    <label for="inputEmail4" class="form-label">Jarak Tempuh</label>
                                    <h6>{{$perjalanan->jarak}} KM</h6>
                                </div>
                                <div class="col">
                                    <label for="inputEmail4" class="form-label">Total Uang Perjalanan Dinas</label>
                                    <h6>@currency($perjalanan->uangsaku)</h6>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection