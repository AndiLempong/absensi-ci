<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
</head>
<style>
.divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
.h-custom {
height: calc(100% - 73px);
}
@media (max-width: 450px) {
.h-custom {
height: 100%;
}
}
</style>
<body>
    
<section class="vh-50">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://img.freepik.com/free-vector/secure-login-concept-illustration_114360-4582.jpg?w=740&t=st=1697187556~exp=1697188156~hmac=a05593064f9b241204fcd8e02546e6b6da83aebbeeb2e92c23e258c94ef9e00f" class="img-fluid" alt="Sample image">
      </div>
      <div class="mx-auto p-2" style="width: 200px;">
        <form class="content " action="<?php echo base_url('Auth/aksi_register') ?>" method="post">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
          </div>
          
          <!-- Inputan Nama Depan -->
          <div class="form-outline mb-2">
              <i class="fa-solid fa-user fa-lg me-3 fa-fw"></i>
              <input type="text" name="nama_depan" id="form3Example3" placeholder="Nama Depan" />
          </div>
          <!-- Inputan Nama Belakang -->
          <div class="form-outline mb-2">
              <i class="fa-solid fa-user fa-lg me-3 fa-fw"></i>
              <input type="text" name="nama_belakang" id="form3Example3" placeholder="Nama Belakang" />
          </div>
          <!-- Inputan Username -->
          <div class="form-outline mb-2">
              <i class="fa-solid fa-user-tie fa-lg me-3 fa-fw"></i>
              <input type="text" name="username" id="form3Example3" placeholder="Username" />
          </div>

          <!-- Inputan Email -->
          <div class="form-outline mb-2">
              <i class="fa-solid fa-envelope fa-lg me-3 fa-fw"></i>
              <input type="text" name="email" id="form3Example4" placeholder="Email" />
          </div>

          <!-- Inputan Password -->
          <div class="form-outline mb-2">
              <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
              <input type="text" name="password" id="form3Example4" placeholder="Password" />
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary">Register</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Belum Punya Akun? 
                <a href="<?php echo base_url('absensi/login')?>"
                class="link-primary">Login</a></p>
                <a href="<?php echo base_url('absensi/register_karyawan')?>"
                class="link-primary">Register Karyawan</a>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>
</body>
</html>