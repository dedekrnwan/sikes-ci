<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Data Master Siswa
			<!-- <small>Data Master & Pembayaran</small> -->
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-user"></i> Data Master</a></li>
			<li class="active">Siswa</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Filter</h3>
					</div>
					<div class="box-body">
						<form role="form">
							<div class="box-body">
								<div class="col-md-4 form-group">
									<label>Tahun Ajaran</label>
									<select param-filter name="ta_id" class="form-control">
										<option value="0">-Pilih-</option>
										<?php foreach ($listTahunAjaran as $ta) : ?>
											<option value="<?= $ta['ta_id'] ?>"><?= $ta['ta'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-md-4 form-group">
									<label>Kelas</label>
									<select param-filter name="kelas" class="form-control">
										<option value="0">-Pilih-</option>
										<?php foreach ($listKelas as $kls) : ?>
											<option value="<?= $kls ?>"><?= $kls ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-md-4 form-group">
									<label></label>
									<button btn-filter type="button" class="btn btn-block btn-warning" style="width:50%">
										<i class="fa fa-search"></i> Filter
									</button>
								</div>
						</form>
					</div>
				</div>
			</div>

			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Data Siswa</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-12" style="margin-bottom:20px">
							<button type="button" class="btn btn-block btn-primary" style="width:15%" onclick="siswaModal()">
								<i class="fa fa-plus"></i>
								Tambah Data
							</button>
						</div>
						<div class="col-md-12">
							<table id="datatables-ss1" class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th>NIS</th>
										<th>Nama</th>
										<th>Jenis Kelamin</th>
										<th>Nama Orang Tua</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->

</div>
<!-- /.content-wrapper -->


<div class="modal fade" id="modal-siswa">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Detail Siswa</h4>
			</div>
			<div class="modal-body">
				<div id="box-siswa" class="box box-default">
					<form role="form" id="form-siswa">
						<input type="hidden" name="siswa_id" value="0">
						<div class="box-body">
							<div class="form-group">
								<label>NIS</label>
								<input name="nis" type="text" class="form-control" placeholder="NIS">
							</div>
							<div class="form-group">
								<label>Nama</label>
								<input name="nama" type="text" class="form-control" placeholder="Nama">
							</div>
							<div class="form-group">
								<label>Jenis Kelamin</label>
								<select name="jenis_kelamin" class="form-control">
									<option value"L">L</option>
									<option value"P">P</option>
								</select>
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
							</div>
							<div class="form-group">
								<label>Nama Orang Tua</label>
								<input name="nama_ortu" type="text" class="form-control" placeholder="Nama Orang Tua">
							</div>
							<div class="form-group">
								<label>No Orang Tua</label>
								<input name="no_ortu" type="number" class="form-control" placeholder="No Orang Tua">
							</div>
							<div class="form-group">
								<label>Email Orang Tua</label>
								<input name="email_ortu" type="email" class="form-control" placeholder="Email Orang Tua">
							</div>
							<div class="form-group">
								<label>Aktif</label>
								<select name="active" class="form-control">
									<option value="1">Ya</option>
									<option value="0">Tidak</option>
								</select>
							</div>
						</div>
						<!-- /.box-body -->
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="siswaSave()">Save</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>