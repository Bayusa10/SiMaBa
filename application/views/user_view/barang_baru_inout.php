
        <!-- Datepicker -->
        <?php $this->load->view('css_bs_loader/load_datepicker');?>

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
                        <h4 class="page-title">Transaksi Barang Baru Masuk dan Keluar</h4>
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

                                <button type="button" class="btn btn-info" id="btn-modal-release-brg">
                                    <i class="fas fas fa-angle-double-up"></i> Release Barang
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modal-create-brg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Baru Masuk</h5>
                                            </div>
                                            <form id="frm-tmbh-brg">
                                                <div class="modal-body">
                                                    
                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tgl Terima</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control tgl_terima" id="ftgl_terima" name="ftgl_terima" value="<?php echo date('d-m-Y');?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Jenis Barang</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" id="fjns_brg" name="fjns_brg">
                                                                <option value="0">Pilih Jenis Barang</option>
                                                                <?php 
                                                                    $barang = json_decode($list_barang, TRUE); 
                                                                    foreach($barang as $list_barang){ ?>
                                                                        <option value="<?php echo $list_barang['id_barang'];?>">
                                                                            <?php echo $list_barang['nama_barang'];?>
                                                                        </option>
                                                                <?php    
                                                                    }    
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row" id="spek_brg" hidden>
                                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Spesifikasi Barang</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="fspek_barang" name="fspek_barang" placeholder="Spesifikasi Barang">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Beban</label>
                                                        <div class="col-sm-9">
                                                            <?php $perusahaan = json_decode($list_perusahaan, TRUE); ?>
                                                            <select class="form-control" id="fprsh">
                                                                <option value="0">Pilih Perusahaan</option>
                                                                <?php
                                                                    foreach($perusahaan as $list_perusahaan){?>
                                                                        <option value="<?php echo $list_perusahaan['id_perusahaan'];?>">
                                                                            <?php echo $list_perusahaan['perusahaan'];?>
                                                                        </option>
                                                                <?php  
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Cabang</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" id="fcbg" name="fcbg">
                                                                <option value=0>Pilih Cabang</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">No. PO</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="fno_po" name="fno_po" placeholder="Nomor PO">
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
                                                            <input type="text" class="form-control" id="fpenerima" value="<?php echo $this->session->userdata('nama_user');?>" disabled>
                                                        </div>
                                                    </div>


                                                </div>
                                            </form>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" id="btn-create-brg"><i class="fas fa-plus"></i> Tambah </button>
                                                    <button type="button" class="btn btn-warning" id="btn-cancel-create-brg"><i class="fas fa-window-close"></i> Tutup </button>
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
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Barang Baru Masuk</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Barang Baru Keluar</span></a> </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="home">
                                    <div class="p-20">
                                        <div class="table-responsive">
                                            <table id="tabel_barang_masuk" class="table table-striped table-bordered" style="width:100%;">
                                                <thead style="text-align: center;">
                                                    <tr>
                                                    <th>No.</th>
                                                    <th>Tgl Terima</th>
                                                    <th>Jenis</th>
                                                    <th>Spesifikasi</th>
                                                    <th>No. PO</th>
                                                    <th>Beban</th>
                                                    <th>Pemakai</th>
                                                    <th>Yang Menyerahkan</th>
                                                    <th>Penerima</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody style="text-align: center;">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> <!-- panel tabel brg in -->

                                <div class="tab-pane" id="profile">
                                    <div class="p-20">
                                        <table id="tabel_barang_keluar" class="table table-striped table-bordered">
                                          <thead style="text-align: center;">
                                            <tr>
                                              <th scope="col">No.</th>
                                              <th scope="col">Tgl Keluar</th>
                                              <th scope="col">Jenis</th>
                                              <th scope="col">Spesifikasi</th>
                                              <th scope="col">No. PO</th>
                                              <th scope="col">Beban</th>
                                              <th scope="col">Pemakai</th>
                                              <th scope="col">Yang Menyerahkan</th>
                                              <th scope="col">Penerima</th>
                                            </tr>
                                          </thead>
                                          <tbody style="text-align: center;">
                                          </tbody>
                                        </table>
                                    </div>
                                </div> <!-- panel tabel brg in -->

                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Modal Update Perusahaan -->
                <div class="modal fade" id="modal-release" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"> Realese Barang Berdasar PO <b id="nmr_po"></b></h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nomor PO</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="no_po_" onkeyup="this.value = this.value.toUpperCase();">
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-info" id="cari_po"><i class="fas fa-search"></i> Cari</button>
                                        </div>
                                </div>

                                <div class="form-group">
                                    <table id="tabel_barang_realese" class="table table-striped table-bordered">
                                            <thead style="text-align: center; text-size:12px;">
                                                <tr>
                                                    <th>Tgl Terima</th>
                                                    <th>Jenis</th>
                                                    <th>Spesifikasi</th>
                                                    <th>Penerima</th>
                                                </tr>
                                            </thead>
                                                    
                                            <tbody style="text-align: center; text-size:12px;" id="tabel_barangbyPO">
                                            </tbody>
                                        </table>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" id="btn-realese" disabled><i class="fas fa-plus"></i> Proses </button>
                                <button type="button" class="btn btn-warning" id="btn-cancel-realese"><i class="fas fa-window-close"></i> Batal </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Update Perusahaan -->

                <!-- Modal Nama Penerima -->
                <div class="modal fade" id="modal-nama" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
                    style="width:100%;">
                    <div class="modal-dialog" role="document ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="nm_pnrm"> </h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label"> Penerima</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="penerima_" onkeyup="this.value = this.value.toUpperCase();">
                                        </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" id="btn-proses-release"><i class="fas fa-plus"></i> Proses </button>
                                <button type="button" class="btn btn-warning" id="btn-cancel-proses"><i class="fas fa-window-close"></i> Batal </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Nama Penerima -->


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

        <!-- Dtaepicker JS -->
        <?php $this->load->view('js_loader/load_js_datepciker');?>



        <script type="text/javascript">
            
            $('#tabel_barang_masuk').DataTable({
                'ajax'      : {"url": 'user/list_barang_masuk'},
                "columns"   : [
                                {"data": "no"},
                                {"data": "tgl_terima"},
                                {"data": "nama_barang"},
                                {"data": "spesifikasi"},
                                {"data": "no_po"},
                                {"data": "beban"},
                                {"data": "pemakai"},
                                {"data": "pemberi"},
                                {"data": "penerima"}
                              ]
            });
            $('#tabel_barang_keluar').DataTable({
                'ajax'      : {"url": 'user/list_barang_keluar'},
                "columns"   : [
                                {"data": "no"},
                                {"data": "tgl_keluar"},
                                {"data": "nama_barang"},
                                {"data": "spesifikasi"},
                                {"data": "no_po"},
                                {"data": "beban"},
                                {"data": "pemakai"},
                                {"data": "pemberi"},
                                {"data": "penerima"}
                              ]
            });
            
            var tabel_realese = $('#tabel_barang_realese').DataTable({
                                    searching   : false,
                                    "lengthChange" : false,
                                    "pageLength": 5
            });

            $(document).ready(function(){

                $('.tgl_terima').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format:'dd-mm-yyyy'
                });

                $('#btn-modal-create-brg').click(function(){
                    $('#modal-create-brg').modal('show');
                });

                $('#btn-create-brg').click(function(){
                    
                    var form_data   = $('#frm-tmbh-brg').serialize();
                    var spek_barang = $('#fspek_barang').val();
                    if (!check_Form()){
                        toastr.warning('Form Belum Lengkap');
                    }else if(!check_PO()) {
                        toastr.warning('Nomor PO Hanya Boleh Berisi Angka');
                    } else {

                        $.ajax({
                            url         : 'user/tambah_data_barang_masuk',
                            data        : form_data,
                            dataType    : 'json',
                            method      : 'post',
                            success     : function(data){
                                if(data.response == 200){
                             
                                    $('#fspek_barang').val('');
                                    toastr.success('Data Berhasil Diinputkan');
                                    $('#tabel_barang_masuk').DataTable().ajax.reload(null, false);
                                            
                                } else {
            
                                    $('#frm-tmbh-brg').trigger('reset');
                                    $('#fspek_barang').val(''); 
                                    $('#spek_brg').prop('hidden', true);
                                    toastr.error('Data Gagal Diinputkan');
                                    $('#tabel_barang_masuk').DataTable().ajax.reload(null, false);
            
                                }
                            }
                        });

                        return false;
                    }

                });

                $('#btn-cancel-create-brg').click(function(){
                   $('#frm-tmbh-brg').trigger('reset');
                   $('#fspek_barang').val(''); 
                   $('#spek_brg').prop('hidden', true);
                   $('#modal-create-brg').modal('hide'); 
                });

                $('#fprsh').change(function(e){
                  e.preventDefault();
                  var id_prsh = $('#fprsh').val();
                  var prsh    = $('#fprsh option:selected').html();
                      prsh    = prsh.trim().split("-");
                  
                  var header_PO = set_KodePO(prsh[0]);
                  $('#fno_po').val(header_PO);

                  $.ajax({
                    url         : 'user/cabang/'+id_prsh,
                    dataType    : 'json',
                    beforeSend  : function(){
                        $('#fcbg').children('option:not(:first)').remove();
                    },
                    success     : function(data){
                        $('#fcbg').append(data);
                    }

                  });  
                  
                  return false;

                });

                $('#fjns_brg').change(function(e){
                    e.preventDefault();

                    var pilihan_barang = $('#fjns_brg option:selected').html();
                        pilihan_barang = pilihan_barang.trim();
                   
                    if(pilihan_barang != "Pilih Jenis Barang"){
                        $('#spek_brg').prop('hidden', false);
                    } else {
                        $('#spek_brg').prop('hidden', true);
                    }

                });

                $('#btn-modal-release-brg').click(function(e){
                    e.preventDefault();
                    $('#modal-release').modal('show');
                });

                $('#cari_po').click(function(e){
                    e.preventDefault();
                    var no_po = $('#no_po_').val();

                    if(no_po == ""){
                        toastr.warning('Nomor PO Tidak Boleh Kosong');
                        $('#btn-realese').attr('disabled',true);
                    } else if(!check_cariPO(no_po)){
                        toastr.warning('Nomor PO Harus Angka');
                        $('#btn-realese').attr('disabled',true);
                    } else {
                        $.ajax({
                            url         : 'user/barang_byPO',
                            data        : {no_po : no_po},
                            dataType    : 'json',
                            method      : 'post',
                            success     : function(data){

                                tabel_realese.clear().draw();

                                if(data.length > 0){

                                    var html = '';
                                    var index;
                                    var count = 1;

                                    for(index = 0; index < data.length; index++){
                                        tabel_realese.row.add([
                                            data[index]['tgl_terima'],
                                            data[index]['jenis'],
                                            data[index]['spesifikasi'],
                                            data[index]['penerima']
                                        ]).draw(false);
                                    }
                                    $('#btn-realese').attr('disabled',false);
                                } else {
                                    toastr.warning('Data Tidak Ada atau Barang Untuk PO Ini Sudah Release');
                                }
                            }

                        });
                            return false;
                    }
                });
                $('#btn-realese').click(function(e){
                   e.preventDefault();
                    var no_po = $('#no_po_').val();

                    if(no_po == ""){

                        toastr.warning('Nomor PO Tidak Boleh Kosong');
                    
                    } else {

                        setTimeout(function(){
                            $('#modal-release').modal('hide');
                        },700);

                        setTimeout(function(){
                            $('#nm_pnrm').html('Penerima Barang PO Nomor : '+$('#no_po_').val());
                            $('#modal-nama').modal('show');
                        },700);

                    }

                });

                $('#btn-cancel-proses').click(function(e){

                    $('#btn-realese').attr('disabled',true);
                    setTimeout(function(){
                        $('#modal-release').modal('show');
                    },700);

                    setTimeout(function(){
                        $('#modal-nama').modal('hide');
                        $('#penerima_').val('');
                    },700);

                });

                $('#btn-cancel-realese').click(function(e){
                    e.preventDefault();
                    $('#no_po_').val('');
                    $('#btn-realese').attr('disabled',true);
                    tabel_realese.clear().draw();
                    $('#modal-release').modal('hide');
                });

                $('#btn-proses-release').click(function(e){
                    var no_po       = $('#no_po_').val();
                    var penerima    = $('#penerima_').val();

                    if(penerima == ""){
                        toastr.warning("Mohon Diisi Nama Penerima Barang");
                    } else {

                        $.ajax({
                            url         : 'user/release_barangBy_PO',
                            data        : {no_po : no_po, penerima : penerima},
                            dataType    : 'json',
                            method      : 'post',
                            success     : function(data){
                                    
                                if(data.response == 200){

                                    $('#no_po_').val('');
                                    tabel_realese.clear().draw();
                                    $('#modal-release').modal('hide');
                                    $('#btn-realese').attr('disabled',true);

                                    $('#modal-nama').modal('hide');
                                    $('#penerima_').val('');

                                    setTimeout(function(){
                                        toastr.success('Barang Untuk PO'+no_po+" Berhasil Direlease");
                                        $('#tabel_barang_masuk').DataTable().ajax.reload(null, false);
                                        $('#tabel_barang_keluar').DataTable().ajax.reload(null, false);
                                    }, 1000);
                                                
                                } else {

                                    $('#no_po_').val('');
                                    tabel_realese.clear().draw();
                                    $('#modal-release').modal('hide');
                                    $('#btn-realese').attr('disabled',true);
                                    
                                    $('#modal-nama').modal('hide');
                                    $('#penerima_').val('');

                                    setTimeout(function(){
                                        toastr.error('Barang Untuk PO'+no_po+" Gagal Direlease");
                                        $('#tabel_barang_masuk').DataTable().ajax.reload(null, false);
                                        $('#tabel_barang_keluar').DataTable().ajax.reload(null, false);
                                    }, 1000);

                                } 
                                
                            },
                            error   : function(xhr, Status, err){
                                alert('Ada Kesalahan Sistem, Mohon Refresh Halaman Ini');
                            }
                        });

                    }

                        return false;

                });

                function check_Form(){
                    var tgl_terima = $('#ftgl_terima').val();
                    var form_data  = $('#frm-tmbh-brg').serializeArray();
                    var jlh_dt_form= form_data.length;

                    for(var idx=0; idx < form_data.length; idx++){
                        if(idx == 2){
                            continue;
                        }
                        if(form_data[idx]['value'] == "" || form_data[idx]['value'] == 0 || form_data[idx]['value'] == -1){
                            jlh_dt_form = jlh_dt_form - 1;
                        }
                    }

                    if(jlh_dt_form != form_data.length){
                        return false;
                    } else {
                        return true;
                    }
                }

                function check_PO(){
                    var no_po           = $('#fno_po').val();
                    var regex_pattern   = new RegExp('^[0-9]+$');
                    
                    if(regex_pattern.test(no_po)){
                        return true;
                    } else {
                        return false;
                    }
                }

                function set_KodePO(prsh){
                    var no_po = "";
                    if(prsh == 'AGI'){
                        no_po = "452";
                    } else if(prsh == 'SGI'){
                        no_po = "454";
                    } else if(prsh == 'SMT'){
                        no_po = "451";
                    }
                    return no_po;
                }

                function check_cariPO(no_po){
                    var regex_pattern   = new RegExp('^[0-9]+$');
                    if(regex_pattern.test(no_po)){
                        return true;
                    } else {
                        return false;
                    }
                }

            });
        </script>