
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
                        <h4 class="page-title">Master Data Barang</h4>
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
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                                            </div>
                                            <form id="frm-tmbh-brg">
                                                <div class="modal-body">
                                                  
                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nama Barang</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="fnm_brg" name="fnm_brg" placeholder="Nama Barang" onkeyup="this.value=this.value.toUpperCase();">
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
                            <div class="card-body">
                                <h5 class="card-title m-b-0">Daftar Barang</h5>
                            </div>
                            
                            <div class="table-responsive">
                                
                                <table id="tabel_Barang" class="table table-striped table-bordered">
                                    <thead style="text-align: center;">
                                        <tr>
                                          <th scope="col">No.</th>
                                          <th scope="col">Nama Barang</th>
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
                <div class="modal fade" id="modal-update-brg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-label"></h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nama Barang</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="brg" onkeyup="this.value = this.value.toUpperCase();">
                                        </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" id="btn-update-brg"><i class="fas fa-plus"></i> Proses </button>
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
            
            var ID_ = 0;

            $('#tabel_Barang').DataTable({
              'ajax'      : {"url": 'admin/list_barang'},
              "columns"   : [
                              {"data": "no"},
                              {"data": "nama_barang"},
                              {"data": "tgl_input"},
                              {"data": "penginput"},
                              {"data": "aksi"}
                            ]
            });


            $(document).ready(function(){

                $('#btn-modal-create-brg').click(function(){
                    $('#modal-create-brg').modal('show');
                });

                $('#btn-create-brg').click(function(e){
                    e.preventDefault();
                    var nama_cabang = $('#fnm_brg').val();

                    $.ajax({

                      url     : 'create_barang',
                      data    : {nama_barang : nama_cabang},
                      dataType: 'json',
                      method  : 'post',
                      success : function(data){


                          if(data.response == 200){
                                                      
                            $('#frm-tmbh-brg').trigger('reset'); 
                            $('#modal-create-brg').modal('hide');
                            toastr.success('Master Barang Berhasil Diinputkan');
                            $('#tabel_Barang').DataTable().ajax.reload(null, false);
                                                  
                          } else if(data.response == 404){

                            $('#frm-tmbh-brg').trigger('reset'); 
                            $('#modal-create-brg').modal('hide');
                            toastr.warning('Master Barang Sudah Pernah Diinputkan');
                            $('#tabel_Barang').DataTable().ajax.reload(null, false);

                          } else {

                            $('#frm-tmbh-brg').trigger('reset'); 
                            $('#modal-create-brg').modal('hide');
                            toastr.error('Master Barang Gagal Diinputkan');
                            $('#tabel_Barang').DataTable().ajax.reload(null, false);

                          }

                      }

                    });

                    return false;
                });

                $('#btn-cancel-create-brg').click(function(){
                   $('#frm-tmbh-brg').trigger('reset');
                   $('#modal-create-brg').modal('hide'); 
                });

                $('#tabel_Barang').on('click','#btn-update', function(e){
                  e.preventDefault();

                  ID_ = encodeURI("awkawkawka"+" "+$(this).data('id')+" "+"ahihihihihi");

                  $.ajax({
                    
                    url     : 'brg_byId/'+ID_,
                    dataType: 'json',
                    success : function(data){

                      $('#modal-update-brg').modal('show');
                      $('#modal-label').html('Update Barang : '+data);
                      $('#brg').val(data);

                    }

                  });
                    return false;
                });

                $('#btn-cancel-update').click(function(e){
                  
                  ID_ = 0;
                  $('#brg').val('');
                  $('#modal-update-brg').modal('hide');                  

                });

                $('#btn-update-brg').click(function(e){
                  e.preventDefault();

                  var nm_brg = $('#brg').val();

                  $.ajax({

                    url     : 'update_barang',
                    data    : {id_barang : ID_, nama_barang : nm_brg},
                    method  : 'post',
                    dataType: 'json',
                    success : function(data){

                      if(data.response == 200){

                        ID_ = 0;
                        $('#modal-update-brg').modal('hide');
                        toastr.success('Barang Berhasil Diupdate');
                        $('#tabel_Barang').DataTable().ajax.reload(null, false);
                                                  
                      } else {

                        ID_ = 0;
                        $('#modal-update-brg').modal('hide');
                        toastr.error('Barang Gagal Diupdate');
                        $('#tabel_Barang').DataTable().ajax.reload(null, false);

                      }

                    }

                  });

                  return false;

                });

            });

        </script>