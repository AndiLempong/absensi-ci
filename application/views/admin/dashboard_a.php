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
            /* padding-right:50vh; */
            min-height: 100vh;
            /* background-color: #000000; */
        }
    </style>
</head>

<body>
<?php $this->load->view('admin/sidebar_a'); ?>
    <section>
        <div class="container text-center">
            <div class="row  p-5">
                <div class="col-lg-4 col-md-6 mb-4 ">
                    <div class="card ">
                        <div class="card-body ">
                            <p class="text-uppercase small mb-1">
                                <strong>total data karyawan</strong>
                                <hr>
                                <hr>
                                <hr>
                                <hr>
                            </p>
                            <h5 class="mb-0">
                                <small class="text-success ms-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="3em" class="" viewBox="0 0 448 512">


                                        <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                                    </svg>
                                    <!-- <p>
                                        <?php echo $admin ?>
                                    </p> -->
                                </small>
                            </h5>
                            <p class="text-uppercase text-muted small mb-1">
                            </p>
                            <h5 class="text-muted mb-0"> <a href="" class=" fs-5 btn btn-sm text-fark ">4</a>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-uppercase small mb-1">
                                <strong>total data absensi</strong>
                                <hr>
                                <hr>
                                <hr>
                                <hr>
                            </p>
                            <h5 class="mb-0">
                                <small class="text-success ms-2"><svg xmlns="http://www.w3.org/2000/svg" height="3em" viewBox="0 0 448 512">
                                        <path d="M224 256A128 128 0 1 1 224 0a128 128 0 1 1 0 256zM209.1 359.2l-18.6-31c-6.4-10.7 1.3-24.2 13.7-24.2H224h19.7c12.4 0 20.1 13.6 13.7 24.2l-18.6 31 33.4 123.9 36-146.9c2-8.1 9.8-13.4 17.9-11.3c70.1 17.6 121.9 81 121.9 156.4c0 17-13.8 30.7-30.7 30.7H285.5c-2.1 0-4-.4-5.8-1.1l.3 1.1H168l.3-1.1c-1.8 .7-3.8 1.1-5.8 1.1H30.7C13.8 512 0 498.2 0 481.3c0-75.5 51.9-138.9 121.9-156.4c8.1-2 15.9 3.3 17.9 11.3l36 146.9 33.4-123.9z" />
                                    </svg>
                                </small>
                                <!-- <p>
                                <?php echo $data ?>
                                </p> -->
                            </h5>

                            <p class="text-uppercase text-muted small mb-1">
                            </p>
                            <h5 class="text-muted mb-0"> <a href="" class=" fs-5 btn btn-sm text-dark">5</a>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-uppercase small mb-1">
                                <strong>data keseluruhan</strong>
                                <hr>
                                <hr>
                                <hr>
                                <hr>
                            </p>
                            <h5 class="mb-0">

                                <small class="text-danger ms-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="3em" viewBox="0 0 448 512">
                                        <path d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                                    </svg>
                                </small>
                            </h5>
                            <p class="text-uppercase text-muted small mb-1">
                            </p>
                            <h5 class="text-muted mb-0"> <a href="" class=" fs-5 btn btn-sm text-dark">10</a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    </div>
    <!-- tabel -->
    <div class="relative min-h-screen md:flex" data-dev-hint="container">
        <main id="content" class="max-h-screen overflow-y-auto flex-1 p-6 lg:px-8">
            <div class="container mx-auto">
                <div class="grid grid-cols-1 px-2 md:grid-cols-3 rounded-t-lg py-2.5 bg-gray-900 text-white text-xl">
                    <div class="flex justify-center mb-2 md:justify-start md:pl-6">
                        DASHBOARD ADMIN
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
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">
                            <?php $no = 0;
                            foreach ($rekap_semua as $absen) : $no++ ?>
                                <tr class="whitespace-nowrap">
                                    <td class="px-5 py-3 text-sm text-gray-500"><?php echo $no ?></td>

                                    <td class="px-5 py-3">
                                        <div class="text-sm text-gray-900">
                                            <?php echo $absen->kegiatan; ?>
                                        </div>
                                    </td>
                                    <td class="px-5 py-3">
                                        <div class="text-sm text-gray-900">
                                            <?php echo $absen->date; ?>
                                        </div>
                                    </td>
                                    <td class="px-5 py-3">
                                        <div class="text-sm text-gray-900">
                                            <?php if ($absen->jam_masuk == NULL) {
                                                echo '-';
                                            } else {
                                                echo  $absen->jam_masuk;
                                            } ?>
                                        </div>
                                    </td>
                                    <td class="px-5 py-3">
                                        <div class="text-sm text-gray-900">
                                            <?php if ($absen->jam_pulang == NULL) {
                                                echo '-';
                                            } else {
                                                echo  $absen->jam_pulang;
                                            } ?>
                                        </div>
                                    </td>
                                    <td class="px-5 py-3">
                                        <div class="text-sm text-gray-900">
                                            <?php echo $absen->keterangan_izin; ?>
                                        </div>
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
</body>

</html>