<div id="content">
    <div class="col-md-12" style="padding:20px;">
        <div class="col-md-12 padding-0">
            <div class="col-md-12 padding-0">
                <div class="panel-body form-element-padding">
                    <div class="col-md-12 panel-heading">
                        <h3 class="animated fadeInLeft">Master Profil Sekolah</h3>
                        <p class="animated fadeInDown">
                            Dashboard <span class="fa-angle-right fa"></span> Profil Sekolah
                        </p>
                    </div>
                </div>

                <!-- Form Pertama -->
                <div class="form-element">
                    <div class="col-md-12 padding-0">
                        <div class="col-md-12">
                            <div class="panel form-element-padding">
                                <div class="panel-heading">
                                    <h4>Form Master Identitas Sekolah</h4>
                                </div>
                                <form method="POST" action="<?=base_url() . "dashboard/insert_identitas";?>">
                                    <div class="panel-body" style="padding-bottom:30px;">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label text-right">Upload Gambar</label>
                                                <div class="col-sm-10">
                                                    <input type="file" class="form-control" name="file_gambar">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label text-right">Sejarah Sekolah</label>
                                                <div class="col-sm-10">
                                                    <textarea name="sejarah" rows="10" cols="30"
                                                        class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label text-right">Visi</label>
                                                <div class="col-sm-10">
                                                    <br>
                                                    <textarea name="visi" rows="10" cols="30"
                                                        class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label text-right">Misi</label>
                                                <div class="col-sm-10">
                                                    <br>
                                                    <textarea name="misi" rows="10" cols="30"
                                                        class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <br>
                                                <button type="submit" name="btnSubmit" value="Simpan"
                                                    class="btn ripple btn-3d btn-primary form-control">
                                                    <div>
                                                        <span>Submit</span>
                                                    </div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form Pertama -->

                <!-- Form Kedua -->
                <div class="form-element">
                    <div class="col-md-12 padding-0">
                        <div class="col-md-12">
                            <div class="panel form-element-padding">
                                <div class="panel-heading">
                                    <h4>Form Master Struktur Organisasi</h4>
                                </div>
                                <div class="panel-body" style="padding-bottom:30px;">
                                    <div class="col-md-12">
                                        <div class="col-md-12 top-20 padding-0">
                                            <div class="col-md-12">
                                                <div class="panel">
                                                    <div class="panel-body">
                                                        <div class="responsive-table">
                                                            <table id="datatables-example"
                                                                class="table table-striped table-bordered" width="100%"
                                                                cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">No</th>
                                                                        <th class="text-center">Nama</th>
                                                                        <th class="text-center">Tempat Lahir</th>
                                                                        <th class="text-center">Tanggal Lahir</th>
                                                                        <th class="text-center">Jenis Kelamin</th>
                                                                        <th class="text-center">NIP</th>
                                                                        <th class="text-center">Jabatan</th>
                                                                        <th class="text-center">AKSI</th>
                                                                    </tr>
                                                                    </th>
                                                                <tbody class="text-center">
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Untung Waluyo, S.Pd.Kn., M.Si</td>
                                                                        <td>Bandung</td>
                                                                        <td>06 September 1963</td>
                                                                        <td>Laki-laki</td>
                                                                        <td>196309061988031007</td>
                                                                        <td>Kepala Sekolah</td>
                                                                        <td>
                                                                            <div class="col-md-12">
                                                                                <input class="submit btn btn-success"
                                                                                    type="submit" value="Edit">
                                                                                <input class="submit btn btn-danger"
                                                                                    type="submit" value="Hapus">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tabel Input Struktur -->
                                    <form method="POST" action="<?=base_url() . "dashboard/insert_struktur";?>">
                                    <div class="form-element">
                                        <div class="col-md-12 padding-0">
                                            <div class="col-md-12">
                                                <div class=" form-element-padding">
                                                    <div class="panel-body" style="padding-bottom:30px;">
                                                        <div class="col-md-12">
                                                        <div class="form-group">
                                                                <label
                                                                    class="col-sm-2 control-label text-right">NIP</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name="nipStruktur">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    class="col-sm-2 control-label text-right">Nama</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name="namaStruktur">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label text-right">Tempat Lahir</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name="tempatLahirStruktur">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label text-right">Tanggal Lahir</label>
                                                                <div class="col-sm-10">
                                                                    <input type="date" class="form-control" name="tanggalLahirStruktur">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label text-right">Jenis
                                                                    Kelamin</label>
                                                                <div class="col-sm-10">
                                                                    <div class="col-sm-12 padding-0">
                                                                        <input type="radio" name="jenis_kelamin" value="L" <?php if (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin']=="L") echo "checked";?>> Laki - laki
                                                                    </div>
                                                                    <div class="col-sm-12 padding-0">
                                                                        <input type="radio" name="jenis_kelamin" value="P" <?php if (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin']=="P") echo "checked";?>> Perempuan
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    class="col-sm-2 control-label text-right">Jabatan</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name="jabatanStruktur">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="col-md-12">
                                                                <br>
                                                                <button
                                                                    class="btn ripple btn-3d btn-primary form-control">
                                                                    <div>
                                                                        <span>Submit</span>
                                                                    </div>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                    <!-- Tabel Input Struktur -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form Kedua -->

                <!-- Form Ketiga -->
                <div class="form-element">
                    <div class="col-md-12 padding-0">
                        <div class="col-md-12">
                            <div class="panel form-element-padding">
                                <div class="panel-heading">
                                    <h4>Form Master Tenaga Pendidik</h4>
                                </div>
                                <div class="panel-body" style="padding-bottom:30px;">
                                    <div class="col-md-12">
                                        <div class="col-md-12 top-20 padding-0">
                                            <div class="col-md-12">
                                                <div class="panel">
                                                    <div class="panel-body">
                                                        <div class="responsive-table">
                                                            <table id="datatables-example"
                                                                class="table table-striped table-bordered" width="100%"
                                                                cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">No</th>
                                                                        <th class="text-center">Nama</th>
                                                                        <th class="text-center">Tempat Lahir</th>
                                                                        <th class="text-center">Tanggal Lahir</th>
                                                                        <th class="text-center">Jenis Kelamin</th>
                                                                        <th class="text-center">NIP</th>
                                                                        <th class="text-center">Jabatan</th>
                                                                        <th class="text-center">AKSI</th>
                                                                    </tr>
                                                                    </th>
                                                                <tbody class="text-center">
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Untung Waluyo, S.Pd.Kn., M.Si</td>
                                                                        <td>Bandung</td>
                                                                        <td>06 September 1963</td>
                                                                        <td>Laki-laki</td>
                                                                        <td>196309061988031007</td>
                                                                        <td>Kepala Sekolah</td>
                                                                        <td>
                                                                            <div class="col-md-12">
                                                                                <input class="submit btn btn-success"
                                                                                    type="submit" value="Edit">
                                                                                <input class="submit btn btn-danger"
                                                                                    type="submit" value="Hapus">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tabel Input Pendidik -->
                                    <form method="POST" action="<?=base_url() . "dashboard/insert_pendidik";?>">
                                    <div class="form-element">
                                        <div class="col-md-12 padding-0">
                                            <div class="col-md-12">
                                                <div class=" form-element-padding">
                                                    <div class="panel-body" style="padding-bottom:30px;">
                                                        <div class="col-md-12">
                                                        <div class="form-group">
                                                                <label
                                                                    class="col-sm-2 control-label text-right">NIP</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name="nipPendidik">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    class="col-sm-2 control-label text-right">Nama</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name="namaPendidik">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label text-right">Tempat
                                                                    Lahir</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name="tempatLahirPendidik">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label text-right">Tanggal
                                                                    Lahir</label>
                                                                <div class="col-sm-10">
                                                                    <input type="date" class="form-control" name="tanggalLahirPendidik">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label text-right">Jenis
                                                                    Kelamin</label>
                                                                <div class="col-sm-10">
                                                                    <div class="col-sm-12 padding-0">
                                                                        <input type="radio" name="jenisKelamin" value="L" <?php if (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin']=="L") echo "checked";?>> Laki - laki
                                                                    </div>
                                                                    <div class="col-sm-12 padding-0">
                                                                        <input type="radio" name="jenisKelamin" value="P" <?php if (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin']=="P") echo "checked";?>> Perempuan
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    class="col-sm-2 control-label text-right">Jabatan</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name="jabatanPendidik">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="col-md-12">
                                                                <br>
                                                                <button
                                                                    class="btn ripple btn-3d btn-primary form-control">
                                                                    <div>
                                                                        <span>Submit</span>
                                                                    </div>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                    <!-- Tabel Input Pendidik -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form Ketiga -->

                <!-- Form Keempat -->
                <div class="form-element">
                    <div class="col-md-12 padding-0">
                        <div class="col-md-12">
                            <div class="panel form-element-padding">
                                <div class="panel-heading">
                                    <h4>Form Master Tenaga Kependidikan</h4>
                                </div>
                                <div class="panel-body" style="padding-bottom:30px;">
                                    <div class="col-md-12">
                                        <div class="col-md-12 top-20 padding-0">
                                            <div class="col-md-12">
                                                <div class="panel">
                                                    <div class="panel-body">
                                                        <div class="responsive-table">
                                                            <table id="datatables-example"
                                                                class="table table-striped table-bordered" width="100%"
                                                                cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">No</th>
                                                                        <th class="text-center">Nama</th>
                                                                        <th class="text-center">Tempat Lahir</th>
                                                                        <th class="text-center">Tanggal Lahir</th>
                                                                        <th class="text-center">Jenis Kelamin</th>
                                                                        <th class="text-center">NIP</th>
                                                                        <th class="text-center">Jabatan</th>
                                                                        <th class="text-center">AKSI</th>
                                                                    </tr>
                                                                    </th>
                                                                <tbody class="text-center">
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Untung Waluyo, S.Pd.Kn., M.Si</td>
                                                                        <td>Bandung</td>
                                                                        <td>06 September 1963</td>
                                                                        <td>Laki-laki</td>
                                                                        <td>196309061988031007</td>
                                                                        <td>Kepala Sekolah</td>
                                                                        <td>
                                                                            <div class="col-md-12">
                                                                                <input class="submit btn btn-success"
                                                                                    type="submit" value="Edit">
                                                                                <input class="submit btn btn-danger"
                                                                                    type="submit" value="Hapus">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tabel Input Kependidikan -->
                                    <form method="POST" action="<?=base_url() . "dashboard/insert_kependidikan";?>">
                                    <div class="form-element">
                                        <div class="col-md-12 padding-0">
                                            <div class="col-md-12">
                                                <div class=" form-element-padding">
                                                    <div class="panel-body" style="padding-bottom:30px;">
                                                        <div class="col-md-12">
                                                        <div class="form-group">
                                                                <label
                                                                    class="col-sm-2 control-label text-right">NIP</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name="nipKependidikan">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    class="col-sm-2 control-label text-right">Nama</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name="namaKependidikan">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label text-right">Tempat
                                                                    Lahir</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name="tempatLahirKependidikan">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label text-right">Tanggal
                                                                    Lahir</label>
                                                                <div class="col-sm-10">
                                                                    <input type="date" class="form-control" name="tanggalLahirKependidikan">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label text-right">Jenis
                                                                    Kelamin</label>
                                                                <div class="col-sm-10">
                                                                    <div class="col-sm-12 padding-0">
                                                                        <input type="radio" name="jenisKelamin" value="L" <?php if (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin']=="L") echo "checked";?>> Laki - laki
                                                                    </div>
                                                                    <div class="col-sm-12 padding-0">
                                                                        <input type="radio" name="jenisKelamin" value="P" <?php if (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin']=="P") echo "checked";?>> Perempuan
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    class="col-sm-2 control-label text-right">Jabatan</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" name="jabatanKependidikan">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="col-md-12">
                                                                <br>
                                                                <button
                                                                    class="btn ripple btn-3d btn-primary form-control">
                                                                    <div>
                                                                        <span>Submit</span>
                                                                    </div>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                    <!-- Tabel Input Kependidikan -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form Keempat -->
            </div>
        </div>
    </div>
</div>