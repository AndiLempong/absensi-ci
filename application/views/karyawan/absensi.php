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
</head>
<body>
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

    <section>
    <p class="text-gray-900 text-5xl dark:text-white">Absensi</p>
    <div class="overview shadow-lg p-4 mb-3 bg-body rounded">
                    <div class="wrapper d-flex flex-column">
                        <textarea id="kegiatan" name="kegiatan" placeholder="Kegiatan..." required></textarea>
                    </div>
                    <br>
                    <!-- <button type="submit" class=" btn btn-dark text-white mb-3">Absensi</button> -->
                    <button type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                      Absen
                    </button>

                </div>
    </section>
</div>
</div>
</body>
</html>
