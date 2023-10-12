<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="/dist/tailwind.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

  <!-- JAM -->
  <script type="text/javascript">
        window.onload = function() { jam(); }
       
        function jam() {
            var e = document.getElementById('jam'),
            d = new Date(), h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());
       
            e.innerHTML = h +':'+ m +':'+ s;
       
            setTimeout('jam()', 1000);
        }
       
        function set(e) {
            e = e < 10 ? '0'+ e : e;
            return e;
        }
</script>

<style>
     body {

        margin: 0;
        padding-left:50vh;
        min-height: 100vh;
        /* background-color: #EEEEEE; */
    } 
</style>

</head>

<body>
  

          <!-- SIDEBAR -->
<span
      class="absolute text-white text-4xl top-5 left-4 cursor-pointer"
      onclick="openSidebar()"
    >
      <i class="bi bi-filter-left px-2 bg-gray-900 rounded-md"></i>
    </span>
    <div
      class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[300px] overflow-y-auto text-center bg-gray-900">
      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
      <i class="bi bi-speedometer2"></i>
        <span class="text-[15px] ml-4 text-gray-200 font-bold">Dashboard</span>
      </div>

      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
      <i class="bi bi-person-circle"></i>
        <span class="text-[15px] ml-4 text-gray-200 font-bold">Admin</span>
      </div>

      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
      <i class="bi bi-person-circle"></i>
        <span class="text-[15px] ml-4 text-gray-200 font-bold">History Absensi</span>
      </div>
      
      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
        <i class="bi bi-table"></i>
       <a href="<?php echo base_url('karyawan/absensi')?>"  class="text-[15px] ml-4 text-gray-200 font-bold">Absensi</a>
      </div>

      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
        <i class="bi bi-table"></i>
       <a href="<?php echo base_url('karyawan/izin')?>"  class="text-[15px] ml-4 text-gray-200 font-bold">Izin</a>
      </div>

      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
        <a href="<?php echo base_url('karyawan/profil')?>" class="text-[15px] ml-4 text-gray-200 font-bold">Edit Profil</a>
      <i class="fa-solid fa-address-card" style="color: #ffffff;"></i>
      </div>

      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white" onclick="dropdown()">
      <i class="bi bi-people"></i>
        <div class="flex justify-between w-full items-center">
          <span class="text-[15px] ml-4 text-gray-200 font-bold">Karyawan</span>
          <span class="text-sm rotate-180" id="arrow">

          </span>
        </div>
      </div>
      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white" onclick="dropdown()">
      <!-- jam -->
    <!-- <?php
    date_default_timezone_set("Asia/jakarta");

    $hari=array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
        $bulan=array(1=>"Januari","Febuari","Maret","April","Mei","Juni","Juli","Agustus",
                  "September","Oktober","September","November","Desember");
        $tgl=date("d");
        $bln=date("n");
        $hr=date("w");
        $thn=date("Y");
        echo("<b>$hari[$hr],$tgl $bulan[$bln] $thn</b>");
    ?> -->
  <!-- <br> -->
    <span id="jam"></span>
    
    <script type="text/javascript">
        window.onload = function() { jam(); }
       
        function jam() {
            var e = document.getElementById('jam'),
            d = new Date(), h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());
       
            e.innerHTML = h +':'+ m +':'+ s;
       
            setTimeout('jam()', 1000);
        }
       
        function set(e) {
            e = e < 10 ? '0'+ e : e;
            return e;
        }
    </script>
      </div>
    </div>


<!-- Dasboard -->
<section>
  <div class="container text-center">
            <div class="row  p-5">
                <div class="col-lg-4 col-md-7 mb-4 ">
                    <div class="card ">
                        <div class="card-body ">
                            <p class="text-uppercase small mb-1">
                                <strong>total cuti kerja karyawan</strong>
                                <hr><hr><hr><hr>
                            </p>
                            <h5 class="mb-0">
                                <small class="text-success ms-2">
                                    <i class="fas fa-arrow-up fa-sm pe-1"></i> <svg xmlns="http://www.w3.org/2000/svg"
                                        height="3em" class="" viewBox="0 0 448 512">
                                        <style>
                                        svg {
                                            fill: #000000
                                        }
                                        </style>
                                        <path
                                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                                    </svg>
                                </small>
                            </h5>
                            <p class="text-uppercase text-muted small mb-1">
                            </p>
                            <h5 class="text-muted mb-0"> <a href="<?php echo base_url('project/siswa') ?>"
                                    class=" fs-5 btn btn-sm text-fark ">Data
                                    Lengkap</a>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-uppercase small mb-1">
                                <strong>total masuk kerja karyawan</strong>
                                <hr><hr><hr><hr>
                            </p>
                            <h5 class="mb-0">
                                <small class="text-success ms-2"><svg xmlns="http://www.w3.org/2000/svg" height="3em"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M224 256A128 128 0 1 1 224 0a128 128 0 1 1 0 256zM209.1 359.2l-18.6-31c-6.4-10.7 1.3-24.2 13.7-24.2H224h19.7c12.4 0 20.1 13.6 13.7 24.2l-18.6 31 33.4 123.9 36-146.9c2-8.1 9.8-13.4 17.9-11.3c70.1 17.6 121.9 81 121.9 156.4c0 17-13.8 30.7-30.7 30.7H285.5c-2.1 0-4-.4-5.8-1.1l.3 1.1H168l.3-1.1c-1.8 .7-3.8 1.1-5.8 1.1H30.7C13.8 512 0 498.2 0 481.3c0-75.5 51.9-138.9 121.9-156.4c8.1-2 15.9 3.3 17.9 11.3l36 146.9 33.4-123.9z" />
                                    </svg>
                                </small>
                            </h5>

                            <p class="text-uppercase text-muted small mb-1">
                            </p>
                            <h5 class="text-muted mb-0"> <a href="<?php echo base_url('karyawan/guru') ?>"
                                    class=" fs-5 btn btn-sm text-dark">Data
                                    Lengkap</a></h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-uppercase small mb-1">
                                <strong>data karyawan</strong>
                                <hr><hr><hr><hr>
                            </p>
                            <h5 class="mb-0">

                                <small class="text-danger ms-2">
                                    <i class="fas fa-arrow-down fa-sm pe-1"></i><svg xmlns="http://www.w3.org/2000/svg"
                                        height="3em" viewBox="0 0 448 512">
                                        <path
                                            d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                                    </svg>
                                </small>
                            </h5>
                            <p class="text-uppercase text-muted small mb-1">
                            </p>
                            <h5 class="text-muted mb-0"> <a href="<?php echo base_url('project/mapel') ?>"
                                    class=" fs-5 btn btn-sm text-dark">Data
                                    Lengkap</a></h5>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
</div>
</div>

<!-- heehheheheh -->
        <div class="row">
        <div class="col-12 card p-1">
            <div class="card-body min-vh-50 align-items-center">
                <div class="card w-100 m-auto p-2">
                    <form action="<?php echo base_url('karyawan/index')?>" method="post">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Nama Depan</th>
                                <th scope="col">Nama Belakang</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <?php $no = 0; foreach ($karyawan as $row) : $no++ ?> -->
                            <tr>
                                <td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $no ?></td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->username ?></td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->email ?></td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->nama_depan ?></td>  
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->nama_belakang ?></td>  
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row->status ?></td>  
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>

    <script type="text/javascript">
      function dropdown() {
        document.querySelector("#submenu").classList.toggle("hidden");
        document.querySelector("#arrow").classList.toggle("rotate-0");
      }
      dropdown();

      function openSidebar() {
        document.querySelector(".sidebar").classList.toggle("hidden");
      }
    </script>
</body>
</html>
