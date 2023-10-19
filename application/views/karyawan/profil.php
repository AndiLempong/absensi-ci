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
        padding-right:50vh;
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
    <div class="card m-auto p-5">
<br>

<div>
<div class="row d-flex">
<?php $no = 0;
foreach ($user as $row) : $no++; ?>
                                <div class="w-100 m-auto p-3">
                                    <br>
                                    <div><?php echo $this->session->flashdata('message'); ?></div>
                                    <div><?php echo $this->session->flashdata('sukses'); ?></div>
                                    <div class="row d-flex">
                                        <input name="id" type="hidden" value="<?php echo $row->id ?>">


                                        <span class="border border-0 btn btn-link">
                                            <?php if (!empty($row->foto)): ?>
                                            <img src="<?php echo  base_url('./image/' . $row->foto) ?>" height="150"
                                                width="150" class="rounded-circle">

                                            <?php else: ?>
                                            <img class="rounded-circle " height="150" width="150"
                                                src="https://slabsoft.com/wp-content/uploads/2022/05/pp-wa-kosong-default.jpg" />
                                            <?php endif;?>
                                        </span>

                                        <br>
                                        <br>
                                        <form method="post"
                                            action="<?php echo base_url('karyawan/aksi_update_profile'); ?>"
                                            enctype="multipart/form-data">
                                            <input name="id" type="hidden" value="<?php echo $row->id; ?>">
                                            <div class="d-flex flex-row ">
                                                <div class="p-2 col-6">
                                                    <label for="" class="form-label fs-5">Nama
                                                        <br>
                                                        Depan </label>
                                                    <input type="text" class="form-control" id="nama_depan"
                                                        name="nama_depan" placeholder="Nama Depan"
                                                        value="<?php echo $row->nama_depan; ?>">
                                                    <label for="" class="form-label fs-5">Username </label>
                                                    <input type="text" class="form-control" id="username"
                                                        name="username" placeholder="Username"
                                                        value="<?php echo $row->username; ?>">
                                                </div>
                                                <br>
                                                <div class="p-2 col-6">
                                                    <label for="" class="form-label fs-5">Nama
                                                        <br>
                                                        Belakang </label>
                                                    <input type="text" class="form-control" id="nama_belakang"
                                                        name="nama_belakang" placeholder="Nama Belakang"
                                                        value="<?php echo $row->nama_belakang; ?>">

                                                </div>
                                            </div>
                                            <input type="file" name="foto" class="p-3">
                                    </div>
                                </div>
                                <?php endforeach; ?>



                                <div class="d-flex p-2 row justify-content-evenly ">
                                    <button type="submit" class="btn btn-sm btn-dark col-5" name=" submit">Ubah
                                        Profile</button>

                                    <a class="btn btn-danger col-5"
                                        href="<?php echo base_url('karyawan/hapus_image'); ?>">
                                        Hapus
                                        Foto</a>
                                </div>

                                <br>

                                </form>

            </div>
    <br>
    
    <form method="post" action="<?php echo base_url('karyawan/aksi_ubah_pw')?>" enctype="multipart/form_data">
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
            </div>
            <div class="d-flex p-2 row justify-content-evenly ">
                <button type="submit" class="btn btn-sm btn-dark col-5" name=" submit">Ubah
                    Password</button>
    </form>

<!-- page sidebar -->
            <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-blue-50 dark:bg-blue-800">
      <ul class="space-y-2 font-medium">
         <li>
            <a href="<?php echo base_url('karyawan/dashboard')?>" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><path d="M543.8 287.6c17 0 32-14 32-32.1c1-9-3-17-11-24L512 185V64c0-17.7-14.3-32-32-32H448c-17.7 0-32 14.3-32 32v36.7L309.5 7c-6-5-14-7-21-7s-15 1-22 8L10 231.5c-7 7-10 15-10 24c0 18 14 32.1 32 32.1h32v69.7c-.1 .9-.1 1.8-.1 2.8V472c0 22.1 17.9 40 40 40h16c1.2 0 2.4-.1 3.6-.2c1.5 .1 3 .2 4.5 .2H160h24c22.1 0 40-17.9 40-40V448 384c0-17.7 14.3-32 32-32h64c17.7 0 32 14.3 32 32v64 24c0 22.1 17.9 40 40 40h24 32.5c1.4 0 2.8 0 4.2-.1c1.1 .1 2.2 .1 3.3 .1h16c22.1 0 40-17.9 40-40V455.8c.3-2.6 .5-5.3 .5-8.1l-.7-160.2h32z"/></svg>
               <span class="ml-3">Dashboard</span>
            </a>
         </li>

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
