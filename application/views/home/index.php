<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">
    
         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4" id="barang">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Barang
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlbarang ?> Data</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>






        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4" id="user">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total User
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlUser ?> Data</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>




    <div class="row">

        <!-- Pie Chart -->
    


        <div class="col-xl-4 col-md-4 mb-4" id="bmterakhir">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-success">
                <h6 class="m-0 font-weight-bold border-0 text-white">5 Barang Masuk Terakhir</h6>
                <?php if($this->session->userdata('login_session')['level'] == 'admin' || $this->session->userdata('login_session')['level'] == 'gudang'): ?>
                    <a href="<?= base_url() ?>barang_masuk" class="btn btn-success btn-md btn-circle">
                        <i class="fa fa-arrow-right"></i>
                    </a>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="row">

                    <?php foreach($b5Terakhir as $b): ?>
                        
                    <div class="col-lg-2 mb-2">
                        <img src="<?= base_url() ?>assets/upload/barang/<?= $b->foto ?>" alt="" width="100%" style="border-radius: 5px;">
                    </div>
                    <div class="col-lg-10">
                        <h5 class="h5 mb-0 text-gray-800"><b><?= $b->id_barang ?></b></h5>
                        <h6 class="h6 mb-0 text-gray-800"><?= $b->nama_barang ?></h6>
                        <h6 class="h6 mb-0 text-gray-800"><?= $b->id_cabang ?></h6>
                        <h6 class="h6 mb-0 text-gray-800"><?= $b->lokasi ?></h6>
                        
                    </div>

                    <div class="col-lg-12">
                        <!-- Divider -->
                        <hr class="sidebar-divider">
                    </div>

                    <?php endforeach; ?>

                </div>
            

            </div>
        </div>
    </div>





    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Page level plugins -->
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/sbadmin/vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
<script src="<?= base_url(); ?>assets/js/chart/chart-area.js"></script>
<script src="<?= base_url(); ?>assets/js/chart/pie-chart.js"></script>

<script src="<?= base_url(); ?>assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/js/dashboard.js"></script>

<?php if($this->session->flashdata('Pesan')): ?>

<?php else: ?>
<script>
$(document).ready(function() {
    let timerInterval
    Swal.fire({
        title: 'Memuat...',
        timer: 1000,
        onBeforeOpen: () => {
            Swal.showLoading()
        },
        onClose: () => {
            clearInterval(timerInterval)
        }
    }).then((result) => {
        $("#barang").addClass("bounceIn");
        $("#supplier").addClass("bounceIn");
        $("#user").addClass("bounceIn");
        $("#grafik").addClass("bounceIn");
        $("#grafikpie").addClass("bounceIn");
        $("#bmterakhir").addClass("bounceIn");
        $("#bkterakhir").addClass("bounceIn");
    })
});
</script>
<?php endif; ?>