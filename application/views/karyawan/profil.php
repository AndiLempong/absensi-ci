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

<style>
     body {

        margin: 0;
        padding-left:50vh;
        min-height: 100vh;
        /* background-color: #EEEEEE; */
    } 
</style>

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
        background-color: #EEEDED;
    } 
</style>

</head>

<body>
        </header>
        <br>
        <div class="card m-auto p-5">

<br>

<div>
  <?php $this->session->flashdata('message') ?></div>
<div class="row d-flex">
        <button class="border border-0 btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <?php if (!empty($row->foto)): ?>
            <img class="rounded-circle" height="150" width="150" src="<?php echo base64_decode($row->foto);?>">
            <?php else: ?>
            <img class="rounded-circle" height="150" width="150"
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/2048px-User-avatar.svg.png" />
            <?php endif;?>
        </button>
    <br>
    <br>
    <br>
    <br>
    <form method="post" action="" enctype="multipart/form_data">
        <input name="id_siswa" type="hidden">
        <div class="d-flex flex-row ">

            <div class="p-2 col-6">
                <label for="" class="form-label fs-5 ">Email </label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <div class="p-2 col-6">
                <label for="" class="form-label fs-5">Username </label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
            </div>
        </div>
        <br>
        <br>
        <div class="d-flex flex-row ">
            <div class="p-2 col-6 >
            <label for=" nama="" class="form-label fs-5">Password Baru </label>
                <input type="text" class="form-control" id="password_baru" name="password_baru"
                    placeholder="Password Baru" value=>
            </div>
            <div class="p-2 col-6 >
            <label for=" nama="" class="form-label fs-5"> Konfirmasi password</label>
                <input type="text" class="form-control" id="password_konfirmasi" name="password_konfirmasi"
                    placeholder="Konfirmasi Paswword" value=>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Foto Profile</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="container w-75 m p-3">
                        <form method="post" action=""
                            enctype="multipart/form-data" class="row">
                            <div class="mb-3 col-12">
                                <label for="nama" class="form-label">Foto:</label>
                                <input type="hidden" class="form-control" id="id" name="id"
                                    value="<?php echo $this->session->userdata('id'); ?>">
                                <input type="hidden" name="base64_image" id="base64_image">
                                <input class="form-control" type="file" name="userfile" id="userfile"
                                    accept="image/*">
                            </div>
                            <div class="col-12 text-end">
                                <input type="submit" class="btn btn-sm btn-primary px-3" name="submit"
                                    value="Ubah Foto"></input>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-danger" href="">Hapus
                            Foto</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-content-between">
            <div>
                <a href="<?php echo base_url('karyawan/profil'); ?>"
                    class=" flex items-center p-2 m-10 w-auto bg-red-500 hover:bg-red-700 text-white font-bold py-2  rounded w-7/6">
                    <span>Kembali</span>
                </a>
            </div>
            <div>
                <button type="submit"
                    class="flex items-center p-2 m-10 w-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2  rounded w-7/6"
                    name=" submit">Confirm</button>
            </div>
        </div>

  <!-- <div class="card m-auto p-5">
<div>
  <?php $this->session->flashdata('message') ?></div>
<div class="row d-flex">
        <button class="border border-0 btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <?php if (!empty($row->foto)): ?>
            <img class="rounded-circle" height="200" width="200" src="<?php echo base64_decode($row->foto);?>">
            <?php else: ?>
            <img class="rounded-circle" height="200" width="200" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/2048px-User-avatar.svg.png" />
            <?php endif;?>
        </button>
    <br>
    <br>
    <form method="post" action="" enctype="multipart/form_data">
        <input name="id_siswa" type="hidden">
        <div class="d-flex flex-row ">

            <div class="p-5 col-6">
                <label for="" class="form-label fs-5 ">Email </label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <div class="p-5 col-6">
                <label for="" class="form-label fs-5">Username </label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
            </div>
        </div>
        <br>
        <br>
        <div class="d-flex flex-row ">
            <div class="p-5 col-6 >
            <label for=" nama="" class="form-label fs-5">Password Baru </label>
                <input type="text" class="form-control" id="password_baru" name="password_baru"
                    placeholder="Password Baru" value=>
            </div>
            <div class="p-5 col-6 >
            <label for=" nama="" class="form-label fs-5"> Konfirmasi password</label>
                <input type="text" class="form-control" id="password_konfirmasi" name="password_konfirmasi"
                    placeholder="Konfirmasi Paswword" value=>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Foto Profile</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="container w-75 m p-3">
                        <form method="post" action=""
                            enctype="multipart/form-data" class="row">
                            <div class="mb-3 col-12">
                                <label for="nama" class="form-label">Foto:</label>
                                <input type="hidden" class="form-control" id="id" name="id"
                                    value="">
                                <input type="hidden" name="base64_image" id="base64_image">
                                <input class="form-control" type="file" name="userfile" id="userfile"
                                    accept="image/*">
                            </div>
                            <div class="col-12 text-end">
                                <input type="submit" class="btn btn-sm btn-primary px-3" name="submit"
                                    value="Ubah Foto"></input>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-danger" href="">Hapus
                            Foto</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-content-between">
            <div>
                <a href="<?php echo base_url('karyawan/dashboard'); ?>"
                    class=" flex items-center p-2 m-10 w-auto bg-red-500 hover:bg-red-700 text-white font-bold py-2  rounded w-7/6">
                    <span>Kembali</span>
                </a>
            </div>
            <div>
            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                 <a href="<?php echo base_url('karyawan /edit_profil') ?>" class="btn btn-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                       <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg></a>
            </div>
        </div> -->

  
  <!-- SIDEBAR -->
  <!-- <span
        class="absolute text-white text-4xl top-5 left-4 cursor-pointer"
        onclick="openSidebar()"
      >
      <i class="bi bi-filter-left px-2 bg-gray-900 rounded-md"></i>
      </span> -->
    <div class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[300px] overflow-y-auto text-center bg-gray-900">
      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
      <i class="bi bi-speedometer2"></i>
        <a href="<?php echo base_url('karyawan/dashboard')?>" class="text-[15px] ml-4 text-gray-200 font-bold">Dashboard</a>
      </div>

      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
      <i class="bi bi-person-circle"></i>
        <span class="text-[15px] ml-4 text-gray-200 font-bold">Admin</span>
      </div>

      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
      <i class="fa-solid fa-clock-rotate-left" style="color: #ffffff;"></i>
        <a href="<?php echo base_url('karyawan/history')?>" class="text-[15px] ml-4 text-gray-200 font-bold">History Absensi</a>
      </div>
      
      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
        <i class="bi bi-table"></i>
       <a href="<?php echo base_url('karyawan/absensi')?>"  class="text-[15px] ml-4 text-gray-200 font-bold">Absensi</a>
      </div>

      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
      <i class="fa-solid fa-user-minus" style="color: #ffffff;"></i>
       <a href="<?php echo base_url('karyawan/izin')?>"  class="text-[15px] ml-4 text-gray-200 font-bold">Izin</a>
      </div>

      <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
        <i class="fa-solid fa-address-card" style="color: #ffffff;"></i>
        <a href="<?php echo base_url('karyawan/profil')?>" class="text-[15px] ml-4 text-gray-200 font-bold">Profil</a>
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
