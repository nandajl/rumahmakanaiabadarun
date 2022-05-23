<?php
include 'koneksi.php';
$ambil=mysqli_query($kon,"SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id_pelanggan]'");
$data=mysqli_fetch_array($ambil);
 ?>
 <div class="container">
   <div class="row justify-content-center text-center">
     <div class="col-10">
       <img src="../img/restoran.png" alt="Nanda JL" width="200" class="rounded-circle img-thumbnail shadow">
       <h1 class="display-6 fw-bold">RUMAH MAKAN <br>AIA BADARUN</h1>
       <p>Seperti Rasa Masakan Amak</p>

       <div class="row">
         <a href="index.php?p=pesan_tempat&id_pelanggan=<?php echo $data['id_pelanggan']; ?>">
           <button class="btn btn-outline-dark btn-lg mb-3" type="button" name="ptempat">Pesanan Tempat</button>
         </a>
         <a href="index.php?p=pesan_online&id_pelanggan=<?php echo $data['id_pelanggan']; ?>">
           <button class="btn btn-outline-dark btn-lg" type="button" name="ponline">Pesanan Online</button>
         </a>
       </div>
     </div>
   </div>

 </div>
