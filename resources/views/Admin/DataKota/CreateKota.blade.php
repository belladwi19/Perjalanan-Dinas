<form class="form form-horizontal mb-4" action="{{ route('storekota') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Nama Kota</label>
                          <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Kota" required />
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Provinsi</label>
                          <div class="input-group">
                            <input type="text" id="provinsi" name="provinsi" class="form-control" placeholder="Provinsi" required>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Pulau</label>
                          <div class="input-group">
                            <input type="text" id="pulau" name="pulau" class="form-control" placeholder="Pulau" required>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Latitude</label>
                          <div class="input-group">
                            <input type="text" id="latitude" name="latitude" class="form-control" placeholder="Latitude " required>
                          </div>
                        </div>
                        <div class="mb-4">
                          <label for="nameWithTitle" class="form-label">Longitude</label>
                          <div class="input-group">
                            <input type="text" id="longitude" name="longitude" class="form-control" placeholder="Longitude" required>
                          </div>
                        </div>
                        <div class="mb-2">
                            
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="luarnegeri" value="luarnegeri">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Luar Negeri
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="luarnegeri" value="dalamnegeri">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Dalam Negeri
                                </label>
                            </div>
                        </div>

                        <button class="btn btn-primary " type="submit" style="float: right;">Save</button>
                    </form>

    