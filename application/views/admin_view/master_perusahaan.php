
        <!-- ============================================================== -->
        <!-- Data Table CSS -->
        <!-- ============================================================== -->
        <?php $this->load->view('css_bs_loader/load_css_dttable');?>
        <!-- ============================================================== -->
        <!--  Data Table CSS -->
        <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Master Data Perusahaan</h4>
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
                                <button type="button" class="btn btn-info" id="btn-modal-create-prsh">
                                    <i class="fas fa-warehouse"></i> Tambah Perusahaan
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modal-create-prsh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Perusahaan</h5>
                                            </div>
                                            <form id="frm-tmbh-prsh">
                                                <div class="modal-body">
                                                    
                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nama Perusahaan</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="fnm_prsh" name="fnm_prsh" placeholder="Nama Perusahaan" onkeyup="this.value=this.value.toUpperCase();">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Singkatan</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="fsingkatan" name="fsingkatan" placeholder="Cth. AGI, SMT" onkeyup="this.value=this.value.toUpperCase();">
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>

                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-success" id="btn-create-prsh"><i class="fas fa-plus"></i> Tambah </button>
                                              <button type="button" class="btn btn-warning" id="btn-cancel-create-prsh"><i class="fas fa-window-close"></i> Batal </button>
                                            </div>

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
                            <div class="card-body">
                                <h5 class="card-title m-b-0">Daftar Perusahaan</h5>
                            </div>
                            
                            <div class="table-responsive">
                                
                                <table id="tabel_perusahaan" class="table table-striped table-bordered">
                                    <thead>
                                        <tr style="text-align: center;">
                                          <th scope="col">No.</th>
                                          <th scope="col">Nama Perusahaan</th>
                                          <th scope="col">Singkatan</th>
                                          <th scope="col">Tgl Input</th>
                                          <th scope="col">Penginput</th>
                                          <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center;">
                                        
                                    </tbody>
                                </table>



                            </div>

                        </div>
                    </div>
                </div>


                 <!-- Modal Update Perusahaan -->
                <div class="modal fade" id="modal-update-prs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-label"></h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nama Perusahaan</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nm_prsh" onkeyup="this.value = this.value.toUpperCase();">
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Singkatan</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="singkatan" onkeyup="this.value = this.value.toUpperCase();">
                                        </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" id="btn-update-prsh"><i class="fas fa-plus"></i> Proses </button>
                                <button type="button" class="btn btn-warning" id="btn-cancel-update"><i class="fas fa-window-close"></i> Batal </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Update Perusahaan -->

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

        <!-- Data Table JS -->
         <?php $this->load->view('js_loader/load_js_dttable');?>



        <script type="text/javascript">
            
            var ID_   = 0;

            $('#tabel_perusahaan').DataTable({
              'ajax'      : {"url": 'admin/list_company'},
              "columns"   : [
                              {"data": "no"},
                              {"data": "nama"},
                              {"data": "singkatan"},
                              {"data": "tgl_input"},
                              {"data": "penginput"},
                              {"data": "aksi"}
                            ]
            });


            $(document).ready(function(){

                $('#btn-modal-create-prsh').click(function(){
                    $('#modal-create-prsh').modal('show');
                });

                $('#btn-create-prsh').click(function(e){
                  e.preventDefault();

                  var frm_data = $('#frm-tmbh-prsh').serialize();

                  $.ajax({
                    url     : 'create_company',
                    data    : frm_data,
                    dataType: 'json',
                    method  : 'post',
                    success : function(data){

                      if(data.response == 200){
                                    
                        $('#frm-tmbh-prsh').trigger('reset'); 
                        $('#modal-create-prsh').modal('hide');
                        toastr.success('Perusahaan Berhasil Diinputkan');
                        $('#tabel_perusahaan').DataTable().ajax.reload(null, false);
                                
                      } else if(data.response == 404){

                        $('#frm-tmbh-prsh').trigger('reset'); 
                        $('#modal-create-prsh').modal('hide');
                        toastr.warning('Perusahaan Sudah Pernah Diinputkan');
                        $('#tabel_perusahaan').DataTable().ajax.reload(null, false);

                      } else {

                        $('#frm-tmbh-prsh').trigger('reset'); 
                        $('#modal-create-prsh').modal('hide');
                        toastr.error('Perusahaan Gagal Diinputkan');
                        $('#tabel_perusahaan').DataTable().ajax.reload(null, false);

                      }

                    },
                    error   : function(xhr, Status, err){
                      alert('Mohon Refresh Halaman Karena Telah Terjadi Error');
                    }
                  });

                  return false;

                });

                $('#btn-cancel-create-prsh').click(function(){
                   $('#frm-tmbh-prsh').trigger('reset');
                   $('#modal-create-prsh').modal('hide'); 
                });

                $('#tabel_perusahaan').on('click','#btn-update',function(e){
                  e.preventDefault();

                  ID_ = encodeURI("kwokwokwo"+" "+$(this).data('id')+" "+"wikwikwik");

                  $.ajax({

                    url     : 'prsh_by_Id/'+ID_,
                    dataType: 'json',
                    success : function(data){

                        $('#modal-label').html('[ Update Perusahaan : '+data.nama_perusahaan+" ]");
                        $('#nm_prsh').val(data.nama_perusahaan);
                        $('#singkatan').val(data.singkatan);
                        $('#modal-update-prs').modal('show');
                    }

                  });

                    return false;
                
                });

                $('#btn-update-prsh').click(function(e){
                  e.preventDefault();

                  var nm_prsh   = $('#nm_prsh').val();
                  var singkatan = $('#singkatan').val();

                  $.ajax({
                    url     : 'update_company',
                    data    : {nm_prsh : nm_prsh, singkatan : singkatan, id_pass : ID_},
                    dataType: 'json',
                    method  : 'post',
                    success : function(data){

                      if(data.response == 200){
                                    
                        $('#modal-update-prs').modal('hide');
                        toastr.success('Perusahaan Berhasil Diupdate');
                        $('#tabel_perusahaan').DataTable().ajax.reload(null, false);
                                
                      } else {

                        $('#modal-update-prs').modal('hide');
                        toastr.error('Perusahaan Gagal Diupdate');
                        $('#tabel_perusahaan').DataTable().ajax.reload(null, false);

                      }

                    }
                  });

                    return false;

                });


                $('#btn-cancel-update').click(function(e){
                  e.preventDefault();
                  ID_ = 0;
                  $('#modal-update-prs').modal('hide');
                })
                
            });

        </script>