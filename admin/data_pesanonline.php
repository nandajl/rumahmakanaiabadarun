<?php
include ("../koneksi.php");
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
	case 'list' :
	?>
	<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<h1 class="h2">Data Pesan Online</h1>
			<div class="btn-toolbar mb-2 mb-md-0">
				<div class="btn-group me-2">
					<a href=?p=data_pesanonline&aksi=print>
						<button type="button" class="btn btn-sm btn-outline-secondary">Cetak</button>
					</a>

				</div>
			</div>
		</div>
		<div class="container">

			<table class="table table-bordered table-hover">
				<br>
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Pelanggan</th>
						<th>Nama Menu</th>
						<th>Jumlah Pesan</th>
						<th>Ongkir</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php

					$no=1;
					$tampil=mysqli_query($kon,"SELECT * FROM menu,pelanggan,pesan_online WHERE menu.id_menu=pesan_online.id_menu and pelanggan.id_pelanggan=pesan_online.id_pelanggan");
					while ($data=mysqli_fetch_array($tampil)) {
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $data['nama_plgn']; ?></td>
							<td><?php echo $data['nama_menu']; ?></td>
							<td><?php echo $data['jumlah_pesan']; ?></td>
							<td><?php echo $data['ongkir']; ?></td>
							<td><?php echo $data['status_bayar']; ?></td>
							<td><a href=?p=data_pesanonline&aksi=edit&id=<?php echo $data['id_pesan']; ?> class="btn btn-primary btn-sm">Ubah</a> |
								<a href=?p=data_pesanonline&aksi=hapus&id=<?php echo $data['id_pesan']; ?> onclick="return confirm('Yakin akan menghapus data ?');" class="btn btn-danger btn-sm">Hapus</td> </a>
							</tr>
							<?php
							$no++;
						}
						?>
					</tbody>
				</table>
			</div>
			<?php
			break;
			case 'edit':
			$ambil=mysqli_query($kon,"SELECT * FROM pelanggan join pesan_online using(id_pelanggan) join menu using(id_menu) WHERE id_pesan=$_GET[id]");
			$data=mysqli_fetch_array($ambil);

			?>
			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					<h1 class="h2">Edit Data Pesan online</h1>

				</div>
				<div class="container">


					<form class="row g-3" action="" method="post">
						<div class="row mb-3">
							<label class="label-control">Nama Pelanggan</label>
							<div class="col-sm-10">
								<input type="text" name="id_pesan" class="form-control" value="<?php echo $data['id_pesan'];?>" hidden>
								<input type="text" name="id_pelanggan" class="form-control" value="<?php echo $data['id_pelanggan'];?>" hidden>
								<input type="text" name="nama_plgn" class="form-control" value="<?php echo $data['nama_plgn'];?>" readonly>
							</div>
						</div>
						<div class="row mb-3">
							<label for="sel1">Pilih Menu:</label>
							<div class="col-sm-10">
								<select class="form-control" name="id_menu">
									<?php
									include "koneksi.php";
									//Perintah sql untuk menampilkan semua question data pada tabel kategori
									$sql="select * from menu";
									$hasil=mysqli_query($kon,$sql);
									$no=0;
									while ($data2 = mysqli_fetch_array($hasil)) {
										$no++;
										?>
										<option value="<?php echo $data2['id_menu'];?>" placeholder="<?php echo $data['id_menu'];?>"><?php echo $data2['nama_menu'];?></option>
										<?php

									}
									?>
								</select>
							</div>
						</div>
						<div class="row mb-3">
							<label class="label-control">Jumlah</label>
							<div class="col-sm-10">
								<input type="text" name="jumlah_pesan" class="form-control" value="<?php echo $data['jumlah_pesan'];?>">
							</div>
						</div>
						<div>
							<div class="row- col-2">
								<button type="submit" name="submit" class="btn btn-danger mb-3" onclick="return confirm('Apakah data pesanan sudah benar?');">Pesan</button>
							</div>
						</div>
					</form>
					<?php
					if (isset($_POST['submit'])){
						$q = mysqli_query($kon,"UPDATE pesan_online SET id_pelanggan = '$_POST[id_pelanggan]', id_menu = '$_POST[id_menu]', jumlah_pesan = '$_POST[jumlah_pesan]' WHERE id_pesan = '$_POST[id_pesan]'");
						if ($q) {
							echo "<script> location='index.php?p=data_pesanonline'</script>";
						}

					}
					break;
					case 'hapus':
					  $q2=mysqli_query($kon,"DELETE FROM pesan_online WHERE id_pesan='$_GET[id]'");
						if ($q2) {
							echo "<script> location='index.php?p=data_pesanonline'</script>";
						}
						break;
						case 'print':
						?>
							<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
								<h1 class="h2">Data Pesan Online</h1>
								<div class="btn-toolbar mb-2 mb-md-0">
								</div>
							</div>
							<div class="container">

								<table class="table table-bordered table-hover">
									<br>
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Pelanggan</th>
											<th>Nama Menu</th>
											<th>Jumlah Pesan</th>
											<th>Ongkir</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<?php

										$no=1;
										$tampil=mysqli_query($kon,"SELECT * FROM menu,pelanggan,pesan_online WHERE menu.id_menu=pesan_online.id_menu and pelanggan.id_pelanggan=pesan_online.id_pelanggan");
										while ($data=mysqli_fetch_array($tampil)) {
											?>
											<tr>
												<td><?php echo $no; ?></td>
												<td><?php echo $data['nama_plgn']; ?></td>
												<td><?php echo $data['nama_menu']; ?></td>
												<td><?php echo $data['jumlah_pesan']; ?></td>
												<td><?php echo $data['ongkir']; ?></td>
												<td><?php echo $data['status_bayar']; ?></td>
								
												</tr>
												<?php
												$no++;
											}
											?>
										</tbody>
									</table>
								</div>
							<script type="text/javascript">
								window.print();
							</script>
						<?php
							break;
				}
				?>
			</div>
		</div>
	</div>
</main>
