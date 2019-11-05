<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Detail Status Siswa
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
						<h3 class="box-title">Detail Status Siswa - <?= $siswa['nama'] ?> <small class="label bg-red">NIS: <?= $siswa['nis'] ?></small></h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-12" style="margin-bottom:20px">
							<button type="button" class="btn btn-sm btn-block btn-primary" onclick="siswaStatusAdd()" style="width:15%">
								<i class="fa fa-plus"></i>
								Tambah Data
							</button>
						</div>
						<div class="col-md-12">
							<table id="datatables-ss1" class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th>Tahun Ajaran</th>
										<th>Kelas</th>
										<th>Status</th>
										<th></th>
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

<div class="modal fade" id="modal-siswa_status_add">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Tambah Data</h4>
			</div>
			<div class="modal-body">
				<div id="box-siswa_status_add" class="box box-default">
					<form id="form-siswa_status_add" role="form">
						<input type="hidden" name="siswa_status_id" value="0">
						<input type="hidden" name="siswa_id" value="<?= $siswa['siswa_id'] ?>">
						<div class="box-body">
							<div class="form-group">
								<label>Tahun Ajaran</label>
								<select name="ta_id" class="form-control">
									<option value="0">-Pilih-</option>
									<?php foreach ($listTahunAjaran as $ta) : ?>
										<option value="<?= $ta['ta_id'] ?>"><?= $ta['ta'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label>Kelas</label>
								<select name="kelas" class="form-control">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
								</select>
							</div>
						</div>
						<!-- /.box-body -->
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="siswaStatusSave('add')">Save</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-siswa_status_edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Detail Data</h4>
			</div>
			<div class="modal-body">
				<div id="box-siswa_status_edit" class="box box-default">
					<form id="form-siswa_status_edit" role="form">
						<input type="hidden" name="siswa_status_id" value="0">
						<input type="hidden" name="siswa_id" value="<?= $siswa['siswa_id'] ?>">
						<div class="box-body">
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
				<button type="button" class="btn btn-primary" onclick="siswaStatusSave('edit')">Save</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>