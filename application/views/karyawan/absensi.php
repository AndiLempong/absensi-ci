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
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

</head>
<style>
   body {
      margin: 0;
      padding-left: 50vh;
      padding-right: 50vh;
      min-height: 100vh;
      /* background-color: #000000; */
   }
</style>

<body>
   <?php $this->load->view('absensi/sidebar'); ?>
   </div>
   </div>
   <form action="<?php echo base_url('karyawan/aksi_absensi') ?>" method="post">
      <div class="relative min-h-screen md:flex" data-dev-hint="container">
         <main id="content" class="max-h-screen overflow-y-auto flex-1 p-6 lg:px-8">
            <div class="container mx-auto">
               <div class="grid grid-cols-1 px-2 md:grid-cols-3 rounded-t-lg py-2.5 bg-gray-900 text-white text-xl">
                  <div class="flex justify-center mb-2 md:justify-start md:pl-6">
                     ABSEN
                  </div>
               </div>
               <div class="overflow-x-auto w-full px-4 bg-white rounded-b-lg shadow">
   </form>
   <br>
   <div>
      <textarea name="kegiatan" id="kegiatan" placeholder="Kegiatan ?" required></textarea>
   </div>
   <br>
   <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
      Absen
   </button>
   </div>
   </div>
   </div>
</body>
<script>
   function logout(id) {
      swal.fire({
         title: ' Yakin Ingin Log Out',
         text: "",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         cancelButtonText: 'Batal',
         confirmButtonText: 'Log Out'
      }).then((result) => {
         if (result.isConfirmed) {
            Swal.fire({
               icon: 'success',
               title: 'Log Out',
               showConfirmButton: false,
               timer: 1500,

            }).then(function() {
               window.location.href = "<?php echo base_url('auth/logout/') ?>" + id;
            });
         }
      });
   }
</script>

</html>