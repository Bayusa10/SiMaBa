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
                    <div class="col-md-3">
                        
                    </div>
                    <div class="col-6 d-flex no-block align-items-center">
                        <h4 class="page-title">Setting Akun</h4>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <?php $informasi_akun = json_decode($data_akun, true); ?>
            <div class="container-fluid" style="min-height: 780px;">
                <div class="row">
                    <div class="col-md-3">
                        
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" value="<?php echo $informasi_akun['data']['nama_user'];?>" readonly>
                                        </div>
                                </div>

                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3">Username</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="funame" value="<?php echo $informasi_akun['data']['username'];?>" readonly>
                                        </div>
                                </div>

                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="fpwd" value="<?php echo $informasi_akun['data']['password'];?>" readonly>
                                        </div>
                                </div>

                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3"></label>
                                        <div class="col-sm-9">
                                            <button type="button" class="btn btn-warning" id="btn-modal-update-data">
                                                <i class="fas fa-user-plus"></i> Update Data
                                            </button>
                                        </div>
                                </div>
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
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->

        <!-- Modal -->
        <div class="modal fade" id="modal-update-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Data <font color="red" id="alert"></font></h5>
                    </div>
                    
                    <div class="modal-body">
                                                    
                        <div class="form-group row">
                            <label for="fname" class="col-sm-5 text-right control-label col-form-label">Data Yang Ingin Diupdate</label>
                            <div class="col-sm-7">
                                <select class="form-control" id="fpil_dt" name="fpil_dt">
                                    <option value=" "> Pilih Data </option>
                                    <option value="uname"> Username </option>
                                    <option value="passwd"> Password </option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">

                            <label for="fname" class="col-sm-5 text-right control-label col-form-label" id="lbl_uname" style="display: none;">Username Baru</label>
                            
                            <label for="fname" class="col-sm-5 text-right control-label col-form-label" id="lbl_pwd1" style="display: none;">Password Baru</label>
                            
                            <div class="col-sm-7">
                                
                                <input type="text" class="form-control" id="fchg_uname" placeholder="Masukkan Username Baru Anda" style="display: none;">
                                
                                <input type="password" class="form-control" id="fchg_pwd" placeholder="Masukkan Password Baru Anda" style="display: none;">

                            </div>

                        </div>

                        <div class="form-group row">

                            <label for="fname" class="col-sm-5 text-right control-label col-form-label" id="lbl_pwd2" style="display: none;">Ulangi Password</label>
                            
                            <div class="col-sm-7">
                                
                                <input type="password" class="form-control" id="fchg_pwd1" placeholder="Ulangi Password" style="display: none;">   

                            </div>

                        </div>

                       <!-- <div class="form-group row" id="pwd_br" style="display: none;">
                            <label for="fname" class="col-sm-5 text-right control-label col-form-label">Password Baru</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" id="fchg_pwd" name="fchg_pwd" placeholder="Masukkan Password Baru Anda">
                            </div>
                        </div>

                        <div class="form-group row" id="rep_pwd" style="display: none;">
                            <label for="fname" class="col-sm-5 text-right control-label col-form-label">Ulangi Password</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" id="fchg_pwd1" name="fchg_pwd1" placeholder="Masukkan Password Baru Anda">
                            </div>
                        </div>   -->                  

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="btn-chg-dt" disabled><i class="fas fa-plus"></i> Proses </button>
                        <button type="button" class="btn btn-warning" id="btn-cancel-chg-dt"><i class="fas fa-window-close"></i> Batal </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->

        <!-- Data Table JS -->
         <?php $this->load->view('js_loader/load_js_dttable');?>


        <script type="text/javascript">
            
            var ID_     = encodeURI("akwakakakakak"+" "+1+" "+"kwokwokwowko"); //pakek session nanti
            var pilih   = null;

            $('#tabel_Barang').DataTable();


            $(document).ready(function(){

                $('#btn-modal-update-data').click(function(){
                    $('#modal-update-user').modal('show');
                });

                $('#fpil_dt').change(function(e){
                    e.preventDefault();

                    pilih = $('#fpil_dt').val();

                    if(pilih == " "){
                    
                        /* display form update uname */
                        $('#lbl_uname').css('display', 'none');
                        $('#fchg_uname').css('display', 'none');
                        /* display form update uname */

                        /* turn off form update pwd */
                        $('#lbl_pwd1').css('display','none');
                        $('#fchg_pwd').css('display','none');

                        $('#lbl_pwd2').css('display','none');
                        $('#fchg_pwd1').css('display','none');
                        /* turn off form update pwd */

                        $('#btn-chg-dt').prop('disabled', true);
                        
                    
                    } else if(pilih == "uname"){

                        /* display form update uname */
                        $('#lbl_uname').css('display', 'block');
                        $('#fchg_uname').css('display', 'block');
                        /* display form update uname */

                        /* turn off form update pwd */
                        $('#lbl_pwd1').css('display','none');
                        $('#fchg_pwd').css('display','none');

                        $('#lbl_pwd2').css('display','none');
                        $('#fchg_pwd1').css('display','none');
                        /* turn off form update pwd */

                        $('#btn-chg-dt').prop('disabled', false);

                    } else if(pilih == "passwd"){

                       /* display form update uname */
                        $('#lbl_uname').css('display', 'none');
                        $('#fchg_uname').css('display', 'none');
                        /* display form update uname */

                        /* turn off form update pwd */
                        $('#lbl_pwd1').css('display','block');
                        $('#fchg_pwd').css('display','block');

                        $('#lbl_pwd2').css('display','block');
                        $('#fchg_pwd1').css('display','block');
                        /* turn off form update pwd */

                        $('#btn-chg-dt').prop('disabled', false);

                    }

                });

                $('#btn-chg-dt').click(function(e){
                    e.preventDefault();

                    if(pilih == "uname"){

                        var uname = $('#fchg_uname').val();

                        $.ajax({

                            url     : 'update_uname_adm',
                            data    : {id_user : ID_, uname : uname},
                            dataType: 'json',
                            method  : 'post',
                            success : function(data){

                                if(data.response == 200){
                                    
                                    /* display form update uname */
                                    $('#lbl_uname').css('display', 'none');
                                    $('#fchg_uname').css('display', 'none');
                                    /* display form update uname */

                                    /* turn off form update pwd */
                                    $('#lbl_pwd1').css('display','none');
                                    $('#fchg_pwd').css('display','none');

                                    $('#lbl_pwd2').css('display','none');
                                    $('#fchg_pwd1').css('display','none');
                                    /* turn off form update pwd */

                                    $('#btn-chg-dt').prop('disabled', true);

                                    $('#fpil_dt').val(" ");

                                    $('#modal-update-user').modal('hide'); 

                                    toastr.success('Username Berhasil Diupdate');

                                    setTimeout(function(){
                                        location.reload();
                                    },500);
                                
                                } else {

                                     /* display form update uname */
                                    $('#lbl_uname').css('display', 'none');
                                    $('#fchg_uname').css('display', 'none');
                                    /* display form update uname */

                                    /* turn off form update pwd */
                                    $('#lbl_pwd1').css('display','none');
                                    $('#fchg_pwd').css('display','none');

                                    $('#lbl_pwd2').css('display','none');
                                    $('#fchg_pwd1').css('display','none');
                                    /* turn off form update pwd */

                                    $('#btn-chg-dt').prop('disabled', true);

                                    $('#fpil_dt').val(" ");

                                    $('#modal-update-user').modal('hide'); 

                                    toastr.error('Username Gagal Diupdate');

                                }

                            },
                            error : function(err, Stat, xhr){
                                alert('Terjadi error, mohon refresh halaman dan ulangi proses');
                            }

                        });

                        return false;

                    } else {

                        var pass        = $('#fchg_pwd').val();
                        var repeat_pass = $('#fchg_pwd1').val();
                        var check_pass  = check_Pass(pass, repeat_pass);

                        if(check_pass){

                            $.ajax({
                                url         : 'update_pass',
                                data        : {id_user : ID_, passwd : pass},
                                dataType    : 'json',
                                method      : 'post',
                                success     : function(data){

                                    if(data.response == 200){
                                    
                                        /* display form update uname */
                                        $('#lbl_uname').css('display', 'none');
                                        $('#fchg_uname').css('display', 'none');
                                        /* display form update uname */

                                        /* turn off form update pwd */
                                        $('#lbl_pwd1').css('display','none');
                                        $('#fchg_pwd').css('display','none');

                                        $('#lbl_pwd2').css('display','none');
                                        $('#fchg_pwd1').css('display','none');
                                        /* turn off form update pwd */

                                        $('#btn-chg-dt').prop('disabled', true);

                                        $('#fpil_dt').val(" ");

                                        $('#modal-update-user').modal('hide'); 

                                        toastr.success('Password Berhasil Diupdate, Halaman Otomatis Redirect, Mohon Login Kembali');

                                        setTimeout(function(){
                                            localStorage.clear();
                                            window.location.href="<?php echo base_url();?>";
                                        },2000);
                                
                                    } else {

                                         /* display form update uname */
                                        $('#lbl_uname').css('display', 'none');
                                        $('#fchg_uname').css('display', 'none');
                                        /* display form update uname */

                                        /* turn off form update pwd */
                                        $('#lbl_pwd1').css('display','none');
                                        $('#fchg_pwd').css('display','none');

                                        $('#lbl_pwd2').css('display','none');
                                        $('#fchg_pwd1').css('display','none');
                                        /* turn off form update pwd */

                                        $('#btn-chg-dt').prop('disabled', true);

                                        $('#fpil_dt').val(" ");

                                        $('#modal-update-user').modal('hide'); 

                                        toastr.error('Password Gagal Diupdate');

                                    }
                                },
                                error : function(err, Stat, xhr){
                                    alert('Terjadi error, mohon refresh halaman dan ulangi proses');
                                }

                            });

                            return false;

                        } else {
                        
                            $('#alert').html(" => Password Tidak Sesuai, Check Kembali");
                        
                        }

                    }

                });

                $('#btn-cancel-chg-dt').click(function(){
                    /* display form update uname */
                    $('#lbl_uname').css('display', 'none');
                    $('#fchg_uname').css('display', 'none');
                    /* display form update uname */

                    /* turn off form update pwd */
                    $('#lbl_pwd1').css('display','none');
                    $('#fchg_pwd').css('display','none');

                    $('#lbl_pwd2').css('display','none');
                    $('#fchg_pwd1').css('display','none');
                    /* turn off form update pwd */

                    $('#btn-chg-dt').prop('disabled', true);

                    $('#fpil_dt').val(" ");

                    $('#alert').html("");

                   $('#modal-update-user').modal('hide'); 
                });

                function check_Pass(pass, repeat_pass){
                    if(pass == repeat_pass){
                        return true;
                    } else {
                        return false;
                    }
                }
            });

        </script>