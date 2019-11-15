
        <!-- Datepicker -->
        <?php $this->load->view('css_bs_loader/load_datepicker');?>

        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php $this->load->view('user_view/top_bar');?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php $this->load->view('user_view/user_menu');?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Data Table CSS -->
        <!-- ============================================================== -->
        <?php $this->load->view('css_bs_loader/load_css_dttable');?>
        <!-- ============================================================== -->
        <!--  Data Table CSS -->
        <!-- ============================================================== -->
        
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Transaksi Barang Repair In - Out</h4>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid" style="min-height: 780px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <button type="button" class="btn btn-info" id="btn-modal-create-brg">
                                    <i class="fas fa-warehouse"></i> Tambah Barang
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modal-create-brg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Repair Masuk</h5>
                                            </div>
                                            <form id="frm-tmbh-brg">
                                                <div class="modal-body">
                                                    
                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tgl Terima</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control tgl_terima" id="ftgl_terima" name="ftgl_terima" placeholder="mm/dd/yyyy">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Jenis Barang</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" id="fjns_brg" name="fjns_brg">
                                                                <option value="">Pilih Jenis Barang</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Perusahaan</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" id="fprsh">
                                                                <option value="">Pilih Perusahaan</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Cabang</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" id="fcbg" name="fcbg">
                                                                <option value="">Pilih Cabang</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">User</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="fuser" name="fuser" placeholder="User">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Yang Menyerahkan</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="fpenyerah" name="fpenyerah" placeholder="Yang Menyerahkan">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Penerima</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="fpenerima" name="fpenerima" placeholder="Penerima">
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" id="btn-create-brg"><i class="fas fa-plus"></i> Tambah </button>
                                                    <button type="button" class="btn btn-warning" id="btn-cancel-create-brg"><i class="fas fa-window-close"></i> Batal </button>
                                                </div>
                                            
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->

                            </div>
                        </div>
                    </div>
                </div> <!-- row -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Barang Repair Masuk</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Barang Repair Keluar</span></a> </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="home">
                                    <div class="p-20">
                                      <font size="2">
                                        <table id="tabel_barang_masuk" class="table table-striped table-bordered">
                                          <thead style="text-align: center;">
                                            <tr>
                                              <th scope="col">No.</th>
                                              <th scope="col">Tgl Terima</th>
                                              <th scope="col">Jenis</th>
                                              <th scope="col">No. PO</th>
                                              <th scope="col">Beban</th>
                                              <th scope="col">User</th>
                                              <th scope="col">Yang Menyerahkan</th>
                                              <th scope="col">Penerima</th>
                                              <th scope="col">Aksi</th>
                                            </tr>
                                          </thead>
                                          <tbody style="text-align: center;">
                                            <tr >
                                              <td>1</th>
                                              <td>Mark</td>
                                              <td>Otto</td>
                                              <td>@mdo</td>
                                              <td>@mdo</td>
                                              <td>@mdo</td>
                                              <td>@mdo</td>
                                              <td>@mdo</td>
                                              <td>@mdo</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </font>
                                    </div>
                                </div> <!-- panel tabel brg in -->

                                <div class="tab-pane" id="profile">
                                    <div class="p-20">
                                      <font size="2">
                                        <table id="tabel_barang_keluar" class="table table-striped table-bordered">
                                          <thead style="text-align: center;">
                                            <tr>
                                              <th scope="col">No.</th>
                                              <th scope="col">Tgl Keluar</th>
                                              <th scope="col">Jenis</th>
                                              <th scope="col">No. PO</th>
                                              <th scope="col">Beban</th>
                                              <th scope="col">User</th>
                                              <th scope="col">Yang Menyerahkan</th>
                                              <th scope="col">Penerima</th>
                                              <th scope="col">Aksi</th>
                                            </tr>
                                          </thead>
                                          <tbody style="text-align: center;">
                                            <tr >
                                              <td>1</th>
                                              <td>ASS</td>
                                              <td>Otto</td>
                                              <td>@mdo</td>
                                              <td>@mdo</td>
                                              <td>@mdo</td>
                                              <td>@mdo</td>
                                              <td>@mdo</td>
                                              <td>@mdo</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </font>
                                    </div>
                                </div> <!-- panel tabel brg in -->

                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->

        <!--Menu sidebar -->
        <script src="<?php echo base_url().'assets/js/sidebarmenu.js';?>"></script>

        <!--Custom JavaScript -->
        <script src="<?php echo base_url().'assets/js/custom.min.js';?>"></script>

        <!-- Data Table JS -->
        <?php $this->load->view('js_loader/load_js_dttable');?>

        <!-- Dtaepicker JS -->
        <?php $this->load->view('js_loader/load_js_datepciker');?>



        <script type="text/javascript">
            
            $('#tabel_barang_masuk').DataTable();
            $('#tabel_barang_keluar').DataTable();

            $(document).ready(function(){

                $('.tgl_terima').datepicker({
                    autoclose: true,
                    todayHighlight: true
                });

                $('#btn-modal-create-brg').click(function(){
                    $('#modal-create-brg').modal('show');
                });

                $('#btn-create-brg').click(function(){
                    /* AS SOON AS POSSIBLE*/
                });

                $('#btn-cancel-create-brg').click(function(){
                   $('#frm-tmbh-brg').trigger('reset');
                   $('#modal-create-brg').modal('hide'); 
                });
            });

        </script>