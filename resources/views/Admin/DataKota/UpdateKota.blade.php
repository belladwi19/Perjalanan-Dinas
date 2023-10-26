<form class="form form-horizontal mb-4" action="{{ route('updatekota', $kota->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Nama Kota</label>
                          <input type="text" id="nama" name="nama" value="{{$kota->namakota}}" class="form-control" placeholder="Nama Kota" required />
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Provinsi</label>
                          <div class="input-group">
                            <input type="text" id="provinsi" name="provinsi" value="{{$kota->provinsi}}" class="form-control" placeholder="Provinsi" required>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Pulau</label>
                          <div class="input-group">
                            <input type="text" id="pulau" name="pulau" value="{{$kota->pulau}}" class="form-control" placeholder="Provinsi" required>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Latitude</label>
                          <div class="input-group">
                            <input type="text" id="latitude" name="latitude" value="{{$kota->latitude}}" class="form-control" placeholder="Latitude " required>
                          </div>
                        </div>
                        <div class="mb-4">
                          <label for="nameWithTitle" class="form-label">Longitude</label>
                          <div class="input-group">
                            <input type="text" id="longitude" name="longitude" value="{{$kota->longitude}}" class="form-control" placeholder="Longitude" required>
                          </div>
                        </div>

                        <button class="btn btn-primary " type="submit" style="float: right;">Save</button>
                    </form>

    