
<div class="row">
    
    <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <div class="row g-0">
                <div class="col-md-4">
                    <img class="card-img-top" src="{{ asset('images/datapegawai/' . $pegawai->pegawai->Foto) }}" alt="Card image cap"/>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                    <h4 class="card-title mb-4" style="text-transform: uppercase;">{{$pegawai->name}}</h4>
                    <div class="row">
                        <div class="col-lg-4">
                            <p><b>Email</b></p>
                        </div>
                        <div class="col-lg-8">
                        <p>: {{$pegawai->email}} </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <p><b>NIK</b></p>
                        </div>
                        <div class="col-lg-8">
                        <p>: {{$pegawai->pegawai->NIK}} </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <p><b>NIP</b></p>
                        </div>
                        <div class="col-lg-8">
                        <p>: {{$pegawai->pegawai->NIP}} </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <p><b>No Telepon</b></p>
                        </div>
                        <div class="col-lg-8">
                        <p>: {{$pegawai->pegawai->NomorTelepon}} </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <p><b>Alamat Domisili</b></p>
                        </div>
                        <div class="col-lg-8">
                        <p>: {{$pegawai->pegawai->Alamat}} </p>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

