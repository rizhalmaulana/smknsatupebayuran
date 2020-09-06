<div id="content">
    <div class="col-md-12" style="padding:20px;">
        <div class="col-md-12 padding-0">
            <div class="col-md-12 padding-0">
                <div class="panel-body form-element-padding">
                    <div class="col-md-12 panel-heading">
                        <h3 class="animated fadeInLeft">Master Hubungan Industri dan Masyarakat</h3>
                        <p class="animated fadeInDown">
                            Dashboard <span class="fa-angle-right fa"></span> Hubin
                        </p>
                    </div>
                </div>

                <!-- Form Pertama -->
                <form method="POST" action="<?=base_url() . "dashboard/insert_hubin";?>">
                    <div class="form-element">
                        <div class="col-md-12 padding-0">
                            <div class="col-md-12">
                                <div class="panel form-element-padding">
                                    <div class="panel-heading">
                                        <h4>Form Master Daftar Mitra Industri Sekolah</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12 top-20 padding-0">
                                            <div class="col-md-12">
                                                <div class="panel">
                                                    <div class="panel-body">
                                                        <div class="responsive-table">
                                                            <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">No</th>
                                                                        <th class="text-center">Foto Perusahaan</th>
                                                                        <th class="text-center">Nama Perusahaan</th>
                                                                        <th class="text-center">Tentang Perusahaan</th>
                                                                        <th class="text-center">AKSI</th>
                                                                    </tr>
                                                                    </th>
                                                                <tbody class="text-center">
                                                                        <tr>
                                                                            <td>
                                                                                1
                                                                            </td>
                                                                            <td>
                                                                                <div class="col-md-12">
                                                                                    <img src="<?= base_url('assets/') ?>images/vector/error.jpg" style="width: 50px; 100px" alt="Image" class="img-fluid">
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                Kalbe Morinaga 
                                                                            </td>
                                                                            <td>
                                                                                Perusahaan Dibidang Makanan Dan Minuman 
                                                                            </td>
                                                                            <td>
                                                                                <div class="col-md-12">
                                                                                    <a class="submit btn btn-success" href="">Edit </a>
                                                                                    <a class="submit btn btn-danger" href="">Hapus </a>
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
                                    <div class="panel-body" style="padding-bottom:30px;">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label text-right">Upload Gambar
                                                    Perusahaan</label>
                                                <div class="col-sm-10">
                                                    <input type="file" class="form-control" name="gambarPerusahaan">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label text-right">Nama Perusahaan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control"
                                                        placeholder="admin / pembina ekskul" name="namaPerusahaan">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label text-right">Tentang
                                                    Perusahaan</label>
                                                <div class="col-sm-10">
                                                    <textarea name="tentangPerusahaan" rows="10" cols="30"
                                                        class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <br>
                                                <button class="btn ripple btn-3d btn-primary form-control">
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
                <!-- Form Pertama -->
            </div>
        </div>
    </div>
</div>