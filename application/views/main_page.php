<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Sistem Manajeman Barang</title>
    
    <?php $stat_user = $this->session->userdata('level');
    ?>


    <!--css-->
    <?php $this->load->view('css_bs_loader/load_css');?>
    <!--css-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>


    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <?php if($stat_user == 'Admin'){ ?>

        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php $this->load->view('admin_view/top_bar');?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php $this->load->view('admin_view/admin_menu');?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->

        <?php
            
            } else { ?>


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
        <!-- Page wrapper  -->
        <!-- ============================================================== -->


        <?php            
                }
        ?>

        
        <div class="page-wrapper">



        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->

    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <?php $this->load->view('js_loader/load_js');?>

    <script type="text/javascript">
        
        var stat_user = '<?php echo $stat_user;?>';
        var base_url  = '<?php echo base_url();?>';

        if(stat_user == 'Admin'){

            $(document).ready(function(){

                let page_active = null;

                $('.link_menu').on('click',function(){

                    let nama_menu   = $(this).attr('id');
                    
                    $.ajax({

                        url         : 'menu/'+nama_menu,
                        dataType    : 'json',
                        success     : function(data){
                            localStorage.setItem('activePage', data.route_menu);
                            $('.page-wrapper').load(data.route_menu);
                        }

                    });

                    return false;
                    
                });

                $('.logout').on('click', function(e){
                    e.preventDefault();

                    $.ajax({

                        url         : 'doLogout',
                        dataType    : 'json',
                        beforeSend  : function(){

                            if(confirm("Anda yakin ingin logout ??")){
                                return true;
                            } else {
                                return false;
                            }

                        },
                        success     : function(data){

                            if(data.response == 200){

                                localStorage.clear();
                                window.location.href = base_url;

                            } else {

                                toastr.error('Logout Gagal, Mohon Ulangi Proses');

                            }

                        }

                    });

                    return false;
                });

                page_active = localStorage.getItem('activePage');

                if(page_active){
                    $('.page-wrapper').load(page_active);
                } else {
                    $('.page-wrapper').load('admin_dashboard');
                }

            });

        } else {

            $(document).ready(function(){

                let page_active = null;

                $('.link_menu').on('click',function(){

                    let nama_menu   = $(this).attr('id');
                    
                    $.ajax({

                        url         : 'menu/'+nama_menu,
                        dataType    : 'json',
                        success     : function(data){
                            localStorage.setItem('activePage', data.route_menu);
                            $('.page-wrapper').load(data.route_menu);
                        }

                    });

                    return false;
                    
                });

                $('.logout').on('click', function(e){
                    e.preventDefault();

                    
                    $.ajax({

                        url         : 'doLogout',
                        dataType    : 'json',
                        beforeSend  : function(){

                            if(confirm("Anda yakin ingin logout ??")){
                                return true;
                            } else {
                                return false;
                            }

                        },
                        success     : function(data){

                            if(data.response == 200){

                                localStorage.clear();
                                window.location.href = base_url;

                            } else {

                                toastr.error('Logout Gagal, Mohon Ulangi Proses');

                            }

                        }

                    });

                    return false;

                });

                page_active = localStorage.getItem('activePage');

                if(page_active){
                    $('.page-wrapper').load(page_active);
                } else {
                    $('.page-wrapper').load('brg_br_in_out');
                }

            });



        }

    </script>



</body>

</html>