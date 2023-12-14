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
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    <style>
        body {
            margin: 0;
            padding-left: 50vh;
            padding-right: 20vh;
            min-height: 100vh;
            /* background-color: #000000; */
        }
    </style>

</head>

<body>
    <?php $this->load->view('absensi/sidebar'); ?>
    <div class="relative min-h-screen md:flex" data-dev-hint="container">
        <main id="content" class="max-h-screen overflow-y-auto flex-1 p-6 lg:px-8">
            <div class="container mx-auto">
                <div class="grid grid-cols-1 px-2 md:grid-cols-3 rounded-t-lg py-2.5 bg-gray-900 text-white text-xl">
                    <div class="flex justify-center mb-2 md:justify-start md:pl-6">
                        HISTORY
                    </div>
                </div>
                <div class="overflow-x-auto w-full px-4 bg-white rounded-b-lg shadow">
                    <table class="my-4 w-full divide-y divide-gray-300 text-center">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-xs text-gray-500">NO</th>
                                <th class="px-4 py-3 text-xs text-gray-500">
                                    KEGIATAN
                                </th>
                                <th class="px-4 py-3 text-xs text-gray-500">TANGGAL</th>
                                <th class="px-4 py-3 text-xs text-gray-500">JAM MASUK</th>
                                <th class="px-4 py-3 text-xs text-gray-500">JAM PULANG</th>
                                <th class="px-4 py-3 text-xs text-gray-500">KETERANGAN IZIN</th>
                                <th class="px-4 py-3 text-xs text-gray-500">STATUS</th>
                                <th class="px-4 py-3 text-xs text-gray-500">AKSI</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">
                            <?php $no = 0;
                            foreach ($absensi as $row) : $no++ ?>
                                <tr class="whitespace-nowrap">
                                    <td class="px-4 py-2 text-sm text-gray-500"><?php echo $no ?></td>
                                    <td class="px-4 py-2">
                                        <div class="text-sm text-gray-900">
                                            <?php echo $row->kegiatan; ?>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2">
                                        <div class="text-sm text-gray-900">
                                            <?php echo $row->date; ?>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2">
                                        <div class="text-sm text-gray-900">
                                            <?php echo $row->jam_masuk; ?>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2">
                                        <div class="text-sm text-gray-900">
                                            <?php echo $row->jam_pulang; ?>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2">
                                        <div class="text-sm text-gray-900">
                                            <?php echo $row->keterangan_izin; ?>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2">
                                        <div class="text-sm text-gray-900">
                                            <?php echo $row->status; ?>
                                        </div>
                                    </td>

                                    <!-- Fungsi Hapus -->
                                    <td>
                                        <div class="d-flex-content">
                                            <button onclick="hapus(<?php echo $row->id ?>)" class="btn btn-lg btn-danger">
                                                <i class="fa-solid fa-trash-can"></i></button>

                                        </div>
                                        <?php
                                        if ($row->status == 'done') {
                                            echo '<div>
                        <button disabled class="btn btn-lg btn-secondary"> <i
                        class="fa-solid fa-person-walking"></i></button>
                       </div>';
                                        } else {
                                            echo '<div>
                        <button id="pulang" onclick="pulang(' . $row->id . ')" class="btn btn-lg btn-success"> <i
                        class="fa-solid fa-person-walking"></i></button>
                       </div>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
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
    <script>
        function hapus(id) {
            swal.fire({
                title: 'Yakin Menghapus Data Ini',
                text: "Data Akan Hilang Jadi Berhati-Hati",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil Dihapus',
                        showConfirmButton: false,
                        timer: 1500,

                    }).then(function() {
                        window.location.href = "<?php echo base_url('karyawan/hapus_karyawan/') ?>" + id;
                    });
                }
            });
        }

        function pulang(id) {
            swal.fire({
                title: 'Ingin Pulang',
                text: "Utamakan Keselamatan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya Pulang'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Selamat Jalan',
                        showConfirmButton: false,
                        timer: 1500,

                    }).then(function() {
                        window.location.href = "<?php echo base_url('karyawan/pulang/') ?>" + id;
                    });
                }
            });
        }

        function logout(id) {
            swal.fire({
                title: 'Yakin Ingin Log Out',
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