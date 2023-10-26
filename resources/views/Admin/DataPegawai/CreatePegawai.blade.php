                    <form class="form form-horizontal mb-4" action="{{ route('storekota') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Nama Pegawai</label>
                          <input type="text" id="nama" name="nama" class="form-control" placeholder="Enter Name" required />
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Email</label>
                          <div class="input-group">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email" required>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Password</label>
                          <div class="input-group">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password " required>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">No Telepon</label>
                          <div class="input-group">
                            <input type="number" id="telepon" name="telepon" class="form-control" placeholder="Enter Telepon" required>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Alamat Domisili</label>
                          <div class="input-group">
                            <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Enter Address" required>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Jenis Kelamin</label>
                          <div class="input-group">
                            <input type="text" id="jeniskelamin" name="jeniskelamin" class="form-control" placeholder="Enter Address" required>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">NIK</label>
                          <div class="input-group">
                            <input type="text" id="NIK" name="NIK" class="form-control" placeholder="Enter Username" required>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">NIP</label>
                          <div class="input-group">
                            <input type="text" id="NIP" name="NIP" class="form-control" placeholder="Enter Username" required>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Divisi</label>
                          <div class="input-group">
                            <input type="text" id="divisi" name="divisi" class="form-control" placeholder="Enter Username" required>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Status</label>
                          <div class="input-group">
                            <input type="text" id="status" name="status" class="form-control" placeholder="Enter Username" required>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="nameWithTitle" class="form-label">Foto Pegawai</label>
                          <div class="input-group">
                          <label for="upload" class="btn btn-primary me-2 mb-2" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="upload" name="foto"
                              class="account-file-input"
                              hidden
                              accept="image/png, image/jpeg"
                            />
                          </label>
                          </div>
                        </div>

                        <button class="btn btn-primary " type="submit" style="float: right;">Save</button>
                    </form>

    