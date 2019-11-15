
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
                        <h4 class="page-title">Master Data Cabang</h4>
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
                                <button type="button" class="btn btn-info" id="btn-modal-create-cbg">
                                    <i class="fas fa-warehouse"></i> Tambah Cabang
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modal-create-cbg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Cabang</h5>
                                            </div>
                                            <form id="frm-tmbh-cbg">
                                              <div class="modal-body">
                                                    
                                                <div class="form-group row">
                                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Perusahaan</label>
                                                    <div class="col-sm-9">
                                                      <select class="form-control" id="fprsh" name="fprsh">
                                                      </select>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Cabang</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="fnm_cbg" name="fnm_cbg" placeholder="Nama Cabang" onkeyup="this.value = this.value.toUpperCase();">
                                                    </div>
                                                </div>

                                              </div>
                                            </form>

                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-success" id="btn-create-cbg"><i class="fas fa-plus"></i> Tambah </button>
                                                <button type="button" class="btn btn-warning" id="btn-cancel-create-cbg"><i class="fas fa-window-close"></i> Batal </button>
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
                                <h5 class="card-title m-b-0">Daftar Cabang</h5>
                            </div>
                            
                            <div class="table-responsive">
                                
                                <table id="tabel_Cabang" class="table table-striped table-bordered">
                                    <thead>
                                        <tr style="text-align: center;">
                                          <th scope="col">No.</th>
                                          <th scope="col">Nama Cabang</th>
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
                <div class="modal fade" id="modal-update-cbg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-label"></h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Perusahaan</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="prsh">
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Cabang</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="cbg" onkeyup="this.value = this.value.toUpperCase();">
                                        </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" id="btn-update-cbg"><i class="fas fa-plus"></i> Proses </button>
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

            $('#tabel_Cabang').DataTable({
              'ajax'      : {"url": 'admin/list_cabang'},
              "columns"   : [
                              {"data": "no"},
                              {"data": "nama_cabang"},
                              {"data": "tgl_input"},
                              {"data": "penginput"},
                              {"data": "aksi"}
                            ]

            });


            $(document).ready(function(){

              //ajax for append data company
              $.ajax({
                url     : 'admin/dt_prsh',
                dataType: 'json',
                success : function(data){
                  $('#fprsh').append(data);
                  $('#prsh').append(data);
                }
              });
              //ajax for append data company

              $('#btn-modal-create-cbg').click(function(){
               $('#modal-create-cbg').modal('show');
              });

              $('#btn-create-cbg').click(function(e){
                e.preventDefault();

                var frm_tmb_cbg = $('#frm-tmbh-cbg').serialize();

                $.ajax({
                    url     : 'create_cabang',
                    data    : frm_tmb_cbg,
                    dataType: 'json',
                    method  : 'post',
                    success : function(data){

                      if(data.response == 200){
                                    
                        $('#frm-tmbh-cbg').trigger('reset'); 
                        $('#modal-create-cbg').modal('hide');
                        toastr.success('Cabang Berhasil Diinputkan');
                        $('#tabel_Cabang').DataTable().ajax.reload(null, false);
                                
                      } else if(data.response == 404){

                        $('#frm-tmbh-cbg').trigger('reset'); 
                        $('#modal-create-cbg').modal('hide');
                        toastr.warning('Cabang Sudah Pernah Diinputkan');
                        $('#tabel_Cabang').DataTable().ajax.reload(null, false);

                      } else {

                        $('#frm-tmbh-cbg').trigger('reset'); 
                        $('#modal-create-cbg').modal('hide');
                        toastr.error('Cabang Gagal Diinputkan');
                        $('#tabel_Cabang').DataTable().ajax.reload(null, false);

                      }

                    }

                });

                return false;

              });

              $('#btn-cancel-create-cbg').click(function(){
               $('#frm-tmbh-cbg').trigger('reset');
               $('#modal-create-cbg').modal('hide'); 
              });

              $('#tabel_Cabang').on('click','#btn-update', function(e){
                e.preventDefault();

                ID_ = encodeURI("asdasdasd"+" "+$(this).data('id')+" "+"wqwqwqwqw");

                $.ajax({

                  url     : 'cbg_byId/'+ID_,
                  dataType: 'json',
                  success : function(data){

                    $('#modal-update-cbg').modal('show');
                    $('#modal-label').html('Update cabang : '+data.perusahaan);
                    $('#prsh').val(data.id_prsh);
                    $('#cbg').val(data.cabang);

                  }

                });
                return false;
              });

              $('#btn-cancel-update').click(function(e){
                e.preventDefault();
              
                ID_ = 0;
                $('#modal-update-cbg').modal('hide');
                $('#modal-label').html('');

              });

              $('#btn-update-cbg').click(function(e){
                e.preventDefault();
                
                var nm_cabang = $('#cbg').val();
                var id_prsh   = $('#prsh').val();

                $.ajax({

                  url     : 'update_cabang',
                  data    : {id_cbg : ID_, nm_cbg : nm_cabang, id_prs : id_prsh},
                  dataType: 'json',
                  method  : 'post',
                  success : function(data){

                    if(data.response == 200){
                                    
                        $('#modal-update-cbg').modal('hide');
                        toastr.success('Cabang Berhasil Diupdate');
                        $('#tabel_Cabang').DataTable().ajax.reload(null, false);
                                
                    } else {

                        $('#modal-update-cbg').modal('hide');
                        toastr.error('Cabang Gagal Diupdate');
                        $('#tabel_Cabang').DataTable().ajax.reload(null, false);

                    }

                  }

                });
                  return false;
              });



            });

        </script>