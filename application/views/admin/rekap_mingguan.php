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
<style>
    body {
        margin: 0;
        padding-left: 50vh;
        padding-right: 20vh;
        min-height: 100vh;
        /* background-color: #000000; */
    }
</style>

<body>
<?php $this->load->view('admin/sidebar_a'); ?>
    <div class="relative min-h-screen md:flex" data-dev-hint="container">
        <main id="content" class="max-h-screen overflow-y-auto flex-1 p-6 lg:px-8">
            <div class="container mx-auto">
                <div class="grid grid-cols-1 px-2 md:grid-cols-3 rounded-t-lg py-2.5 bg-gray-900 text-white text-xl">
                    <div class="flex justify-center mb-2 md:justify-start md:pl-6">
                        REKAP MINGGUAN
                    </div>
                    <a href="<?php echo base_url('admin/export_minggu') ?>" class="btn btn-secondary">Export <i class="fa-solid fa-file-arrow-down"></i> </a>
                </div>
                <div class="overflow-x-auto w-full px-4 bg-white rounded-b-lg shadow">
                    <table class="my-4 w-full divide-y divide-gray-300 text-center">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-5 py-3 text-xs text-gray-500">NO</th>
                                <th class="px-5 py-3 text-xs text-gray-500">
                                    KEGIATAN
                                </th>
                                <th class="px-5 py-3 text-xs text-gray-500">TANGGAL</th>
                                <th class="px-5 py-3 text-xs text-gray-500">JAM MASUK</th>
                                <th class="px-5 py-3 text-xs text-gray-500">JAM PULANG</th>
                                <th class="px-5 py-3 text-xs text-gray-500">KETERANGAN IZIN</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">
                            <?php $no = 0;
                            foreach ($absensi as $rekap) : $no++ ?>
                                <tr class="whitespace-nowrap">
                                    <td class="px-5 py-3 text-sm text-gray-500"><?php echo $no ?></td>
                                    <td class="px-5 py-3">
                                        <div class="text-sm text-gray-900">
                                            <?php echo $rekap['kegiatan']; ?>
                                        </div>
                                    </td>
                                    <td class="px-5 py-3">
                                        <div class="text-sm text-gray-900">
                                            <?php echo $rekap['date']; ?>
                                        </div>
                                    </td>
                                    <td class="px-5 py-3">
                                        <div class="text-sm text-gray-900">
                                            <?php echo $rekap['jam_masuk']; ?>
                                        </div>
                                    </td>
                                    <td class="px-5 py-3">
                                        <div class="text-sm text-gray-900">
                                            <?php echo $rekap['jam_pulang']; ?>
                                        </div>
                                    </td>
                                    <td class="px-5 py-3">
                                        <div class="text-sm text-gray-900">
                                            <?php echo $rekap['keterangan_izin']; ?>
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
    7.
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Add an event listener for the "change" event on the select element
            var selectElement = document.getElementById('bulan');
            var formElement = selectElement.form; // Get the parent form

            selectElement.addEventListener('change', function() {
                formElement.submit(); // Submit the form when the select element changes
            });
        });
    </script>
</body>

</html>