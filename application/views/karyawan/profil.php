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
              <center>
            <img class="rounded-circle" height="150" width="150"
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/2048px-User-avatar.svg.png" />
                </center>
            <?php endif;?>
        </button>
        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="container w-75 m p-3">
                        <form method="post" action="<?php echo base_url('karyawan/upload_image'); ?>"
                            enctype="multipart/form-data" class="row">
                            <div class="mb-3 col-12">
                                <label for="nama" class="form-label">Foto:</label>
                                <input type="hidden" class="form-control" id="id" name="id"
                                    value="<?php echo $this->session->userdata('id'); ?>">
                                <input type="hidden" name="base64_image" id="base64_image">
                                <input class="form-control" type="file" name="userfile" id="userfile"
                                    accept="image/*">
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-danger" href="<?php echo base_url('karyawan/upload_image'); ?>">Ganti
                                    Foto</a>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
    <br>
    <br>
    <br>
    <br>
    
    <form method="post" action="" enctype="multipart/form_data">
        <input name="id_siswa" type="hidden">
        <div class="d-flex flex-row ">

            <!-- <div class="p-2 col-6">
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
        </div> -->
        <div class="flex justify-content-between">
            <!-- <div>
                <a href="<?php echo base_url('karyawan/dashboard'); ?>"
                    class=" flex items-center p-2 m-10 w-auto bg-red-500 hover:bg-red-700 text-white font-bold py-2  rounded w-7/6">
                    <span>Kembali</span>
                </a>
            </div> -->
            
                    <!-- <div class="modal-footer">
                        <a class="btn btn-danger" href="<?php echo base_url('karyawan/hapus_image'); ?>">Hapus
                            Foto</a>
                    </div> -->
            </div>

        <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-blue-50 dark:bg-blue-800">
      <ul class="space-y-2 font-medium">
         <li>
            <a href="<?php echo base_url('karyawan/dashboard')?>" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><path d="M543.8 287.6c17 0 32-14 32-32.1c1-9-3-17-11-24L512 185V64c0-17.7-14.3-32-32-32H448c-17.7 0-32 14.3-32 32v36.7L309.5 7c-6-5-14-7-21-7s-15 1-22 8L10 231.5c-7 7-10 15-10 24c0 18 14 32.1 32 32.1h32v69.7c-.1 .9-.1 1.8-.1 2.8V472c0 22.1 17.9 40 40 40h16c1.2 0 2.4-.1 3.6-.2c1.5 .1 3 .2 4.5 .2H160h24c22.1 0 40-17.9 40-40V448 384c0-17.7 14.3-32 32-32h64c17.7 0 32 14.3 32 32v64 24c0 22.1 17.9 40 40 40h24 32.5c1.4 0 2.8 0 4.2-.1c1.1 .1 2.2 .1 3.3 .1h16c22.1 0 40-17.9 40-40V455.8c.3-2.6 .5-5.3 .5-8.1l-.7-160.2h32z"/></svg>
               <span class="ml-3">Dashboard</span>
            </a>
         </li>

            <!-- <a href="<?php echo base_url('karyawan/rekap_mingguan')?>" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M224 256A128 128 0 1 1 224 0a128 128 0 1 1 0 256zM209.1 359.2l-18.6-31c-6.4-10.7 1.3-24.2 13.7-24.2H224h19.7c12.4 0 20.1 13.6 13.7 24.2l-18.6 31 33.4 123.9 36-146.9c2-8.1 9.8-13.4 17.9-11.3c70.1 17.6 121.9 81 121.9 156.4c0 17-13.8 30.7-30.7 30.7H285.5c-2.1 0-4-.4-5.8-1.1l.3 1.1H168l.3-1.1c-1.8 .7-3.8 1.1-5.8 1.1H30.7C13.8 512 0 498.2 0 481.3c0-75.5 51.9-138.9 121.9-156.4c8.1-2 15.9 3.3 17.9 11.3l36 146.9 33.4-123.9z"/></svg>
               <span class="ml-3">Admin</span>
            </a>
         </li> -->

         <li>
            <a href="<?php echo base_url('karyawan/history')?>" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">History</span>
            </a>
         </li>

         <li>
            <a href="<?php echo base_url('karyawan/absensi')?>" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Absensi</span>
            </a>
         </li>

         <li>
            <a href="<?php echo base_url('karyawan/izin')?>" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM472 200H616c13.3 0 24 10.7 24 24s-10.7 24-24 24H472c-13.3 0-24-10.7-24-24s10.7-24 24-24z"/></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Izin</span>
            </a>
         </li>

         <li>
            <a href="<?php echo base_url('karyawan/profil')?>" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zm96 320h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H96c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm-32-96a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zM144 64h96c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Profil</span>
            </a>
         </li>

         <li>
            <a href="<?php echo base_url('absensi/login')?>" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Log Out</span>
            </a>
         </li>
         <li><span id="jam"></span></li>
</aside>


      <!-- jam -->
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
