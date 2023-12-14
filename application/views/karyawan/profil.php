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

    <style>
        body {

            margin: 0;
            padding-left: 50vh;
            padding-right: 50vh;
            min-height: 100vh;
            /* background-color: #EEEEEE; */
        }
    </style>
</head>

<body>
    <?php $this->load->view('absensi/sidebar'); ?>
    <div class="card m-auto p-4">
        <br>
        <div>
            <div class="row d-flex">
                <div class="w-100 m-auto p-8">

                    <br>
                    <div><?php echo $this->session->flashdata('message'); ?></div>
                    <div><?php echo $this->session->flashdata('sukses'); ?></div>
                    <div class="row d-flex">
                        <input name="id" type="hidden" value="<?php echo $this->session->userdata('id'); ?>">
                        <span class="border border-0 btn btn-link">
                            <?php if (!empty($row->foto)) : ?>
                                <img src="<?php echo $row->foto ?>" height="150" width="150" class="rounded-circle">
                            <?php else : ?>
                                <img class="rounded-circle " height="150" width="150" src="https://i.pinimg.com/originals/90/29/a2/9029a2eafc1b93fdb11241b57ba56d38.jpg" />
                            <?php endif; ?>
                        </span>
                        <br>
                        <br>
                        <form method="post" action="<?php echo base_url('karyawan/aksi_update_profile'); ?>" enctype="multipart/form-data">
                            <input name="id" type="hidden" value="<?php echo $this->session->userdata('id'); ?>">
                            <div class="d-flex flex-row ">
                                <div class="p-2 col-6">
                                    <label for="" class="form-label fs-5">Nama
                                        <br>
                                        Depan </label>
                                    <input type="text" class="form-control" id="nama_depan" name="nama_depan" placeholder="Nama Depan" value="<?php echo $this->session->userdata('nama_depan'); ?>">

                                    <label for="" class="form-label fs-5">Username </label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $this->session->userdata('username') ?>">
                                </div>
                                <br>
                                <div class="p-2 col-6">
                                    <label for="" class="form-label fs-5">Nama
                                        <br>
                                        Belakang </label>
                                    <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" placeholder="Nama Belakang" value="<?php echo $this->session->userdata('nama_belakang') ?>">

                                </div>
                            </div>
                            <input type="file" name="foto" class="p-3">
                    </div>
                </div>


                <div class="d-flex p-2 row justify-content-evenly ">
                    <button class="bg-gray-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded col-5">
                        Ubah Profil
                    </button>

                    <a class="btn btn-secondary font-bold py-2 col-5" href="<?php echo base_url('karyawan/hapus_image'); ?>">Hapus Foto</a>
                </div>
                <br>
                </form>

            </div>
            <br>
            <!-- pw -->
            <form method="post" action="<?php echo base_url('karyawan/aksi_ubah_password') ?>" enctype="multipart/form_data">
                <div class="d-flex flex-row ">
                    <div class="p-2 col-4 >
            <label for=" nama="" class="form-label fs-5">Password Lama </label>
                        <input type="text" class="form-control" id="password_lama" name="password_lama" placeholder="Password Lama" value=>
                    </div>
                    <div class="p-2 col-4 >
            <label for=" nama="" class="form-label fs-5">Password Baru </label>
                        <input type="text" class="form-control" id="password_baru" name="password_baru" placeholder="Password Baru" value=>
                    </div>
                    <div class="p-2 col-4 >
            <label for=" nama="" class="form-label fs-5"> Konfirmasi password</label>
                        <input type="text" class="form-control" id="password_konfirmasi" name="password_konfirmasi" placeholder="Konfirmasi Paswword" value=>
                    </div>
                </div>
        </div>
        <div class="d-flex p-2 row justify-content-evenly ">
            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Ubah Password
            </button>
            </form>

            <script type="text/javascript">
                function dropdown() {
                    document.querySelector("#submenu").classList.toggle("hidden");
                    document.querySelector("#arrow").classList.toggle("rotate-0");
                }
                dropdown();

                function openSidebar() {
                    document.querySelector(".sidebar").classList.toggle("hidden");
                }

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
</body>

</html>