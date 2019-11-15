
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
                        <h4 class="page-title">Manajemen User</h4>
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
                                <button type="button" class="btn btn-info" id="btn-modal-create-user">
                                    <i class="fas fa-user-plus"></i> Create User
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modal-create-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <form id="frm-tmbh-user">
                                                    
                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nama</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="fname" name="fname" placeholder="Nama">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Username</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="funame" name="funame" placeholder="Username">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                                        <div class="col-sm-9">
                                                            <input type="password" class="form-control" id="fpwd" name="fpwd" placeholder="Password">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Level</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" id="flevel" name="flevel">
                                                                <option value="">Pilih Level User</option>
                                                                <option value="1">Admin</option>
                                                                <option value="2">User</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </form>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success" id="btn-create-user"><i class="fas fa-plus"></i> Tambah </button>
                                                <button type="button" class="btn btn-warning" id="btn-cancel-create-user"><i class="fas fa-window-close"></i> Batal </button>
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
                                <h5 class="card-title m-b-0">Daftar User</h5>
                            </div>
                            
                            <table id="tabel_user" class="table table-striped table-bordered">
                                <thead style="text-align: center;">
                                    <tr>
                                      <th scope="col">No.</th>
                                      <th scope="col">Nama</th>
                                      <th scope="col">Username</th>
                                      <th scope="col">Level</th>
                                      <th scope="col">Aksi</th>
                                    </tr>
                                  </thead>
                                  <tbody style="text-align: center;">

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

                <!-- Modal Update Password -->
                <div class="modal fade" id="modal-alert-reset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-alert-label"></h5>
                            </div>
                            <div class="modal-body">
                                Apakah anda yaqueen ingin reset password user ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" id="btn-reset-pass"><i class="fas fa-plus"></i> Proses </button>
                                <button type="button" class="btn btn-warning" id="btn-cancel-respas"><i class="fas fa-window-close"></i> Batal </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Update Password -->

                <!-- Modal Update Level -->
                <div class="modal fade" id="modal-alert-lvl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-lvl-label"></h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Level Lama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="lvl_lama" disabled>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Level Baru</label>
                                        <div class="col-sm-9">
                                           <select class="form-control" id="lvl_br">
                                                <option value="1">Admin</option>
                                                <option value="2">User</option>
                                            </select>
                                        </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" id="btn-reset-lvl"><i class="fas fa-plus"></i> Proses </button>
                                <button type="button" class="btn btn-warning" id="btn-cancel-lvl"><i class="fas fa-window-close"></i> Batal </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Update Level -->

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

                $('#tabel_user').DataTable({
                    'searching' : false,
                    'paging'    : false,
                    'ajax'      : {"url": 'admin/list_user'},
                    "columns"   : [
                                    {"data": "no"},
                                    {"data": "nama"},
                                    {"data": "username"},
                                    {"data": "level"},
                                    {"data": "aksi"},
                                  ]
                });

                $(document).ready(function(){

                    $('#btn-modal-create-user').click(function(){
                        $('#modal-create-user').modal('show');
                    });

                    $('#btn-create-user').click(function(e){
                        e.preventDefault();

                        let frm_data = $('#frm-tmbh-user').serialize();
                        
                        $.ajax({
                            url     : 'create_user',
                            data    : frm_data,
                            dataType: 'json',
                            method  : 'post',
                            success : function(data){

                                if(data.response == 200){
                                    
                                    $('#frm-tmbh-user').trigger('reset'); 
                                    $('#modal-create-user').modal('hide');
                                    toastr.success('Data User Berhasil Diinputkan');
                                    $('#tabel_user').DataTable().ajax.reload(null, false);
                                
                                } else if(data.response == 404){

                                    $('#frm-tmbh-user').trigger('reset'); 
                                    $('#modal-create-user').modal('hide');
                                    toastr.warning('User Sudah Ada');
                                    $('#tabel_user').DataTable().ajax.reload(null, false);

                                } else {

                                    $('#frm-tmbh-user').trigger('reset'); 
                                    $('#modal-create-user').modal('hide');
                                    toastr.error('Data User Gagal Diinputkan');
                                    $('#tabel_user').DataTable().ajax.reload(null, false);

                                }

                            },
                            error   : function(err, Status, xhr){

                                $('#modal-create-user').modal('hide');
                                toastr.error('Data User Gagal Diinputkan');

                            } 
                        });

                        return;
                    });


                    $('#btn-cancel-create-user').click(function(){
                       $('#frm-tmbh-user').trigger('reset'); 
                       $('#modal-create-user').modal('hide'); 
                    });


                    $('#tabel_user').on('click','#btn-update-usr', function(e){
                        e.preventDefault();

                        ID_ = encodeURI("axaxaxaxa"+" "+$(this).data('id')+" "+"wkwkwkwk");

                        $.ajax({
                            url         : 'user_byId/'+ID_,
                            dataType    : 'json',
                            success     : function(data){
                                $('#modal-alert-reset').modal('show');
                                $('#modal-alert-label').html('[ Reset Password User : '+data[0].nama_user+" ]");
                            },
                            error       : function(xhr, Status, err){
                                alert('Mohon Refresh Halaman Karena Telah Terjadi Error');
                            }

                        });
                        
                        return false;
                    });

                    $('#btn-reset-pass').click(function(e){
                        e.preventDefault();

                        $.ajax({
                            url         : 'update_pwd',
                            data        : {id_user : ID_},
                            dataType    : 'json',
                            method      : 'post',
                            success     : function(data){
                                
                                if(data.response == 200){

                                    ID_ = 0;
                                    $('#modal-alert-reset').modal('hide');
                                    $('#modal-alert-label').html('');
                                    toastr.success('Password User Berhasil Diubah');


                                } else {

                                    ID_ = 0;
                                    toastr.error('Password User Gagal Diubah, Ulangi Proses');

                                }

                            },
                            error       : function(xhr, Status, err){
                                alert('Mohon Refresh Halaman Karena Telah Terjadi Error');
                            }

                        });

                        return false;

                    });

                    $('#btn-cancel-respas').click(function(){
                        ID_ = 0;
                        $('#modal-alert-reset').modal('hide');
                        $('#modal-alert-label').html('');
                    });

                    $('#tabel_user').on('click','#btn-update-lvl', function(e){
                        e.preventDefault();

                        ID_ = encodeURI("axaxaxaxa"+" "+$(this).data('id')+" "+"wkwkwkwk");

                        $.ajax({
                            url         : 'usr_lv_byId/'+ID_,
                            dataType    : 'json',
                            success     : function(data){
                                $('#modal-alert-lvl').modal('show');
                                $('#modal-lvl-label').html('[ Ganti Level User : '+data[0].nama_user+" ]");
                                $('#lvl_lama').val(data[0].level);
                            },
                            error       : function(xhr, Status, err){
                                alert('Mohon Refresh Halaman Karena Telah Terjadi Error');
                            }

                        });
                        
                        return false;

                    });

                    $('#btn-reset-lvl').click(function(e){
                        e.preventDefault();

                        var lv_baru = $('#lvl_br').val();

                        $.ajax({
                            url         : 'update_lv',
                            data        : {id_user : ID_, lvl_baru : lv_baru},
                            dataType    : 'json',
                            method      : 'post',
                            success     : function(data){

                                if(data.response == 200){

                                    ID_ = 0;
                                    $('#modal-alert-lvl').modal('hide');
                                    $('#modal-lvl-label').html('');
                                    toastr.success('Level User Berhasil Diubah');
                                    $('#tabel_user').DataTable().ajax.reload(null, false);

                                } else {

                                    ID_ = 0;
                                    toastr.error('Level User Gagal Diubah, Ulangi Proses');
                                    $('#tabel_user').DataTable().ajax.reload(null, false);
                                }

                            },
                            error       : function(err, Status, xhr){
                                
                                $('#modal-alert-lvl').modal('hide');
                                toastr.error('Level User Gagal Diubah');

                            }

                        });

                        return false;

                    });

                    $('#btn-cancel-lvl').click(function(e){
                        e.preventDefault();

                        ID_ = 0;
                        $('#modal-alert-lvl').modal('hide');
                        $('#modal-lvl-label').html('');

                    });

                });

            </script>