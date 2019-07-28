<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Detail Tipe Tarif
			<!-- <small>Data Master & Pembayaran</small> -->
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-cubes"></i> Data Master</a></li>
			<li class="active">Tipe Tarif</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Data Detail Tipe Tarif - <?= $tarifTipe['tarif_tipe'] ?></h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-12" style="margin-bottom:20px">
							<button type="button" class="btn btn-block btn-primary" onclick="tarifNilaiAdd()" style="width:15%">
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
										<th>Nominal</th>
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

<div class="modal fade" id="modal-tarif_nilai_add">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Tambah Data</h4>
			</div>
			<div class="modal-body">
				<div id="box-tarif_nilai_add" class="box box-default">
					<form id="form-tarif_nilai_add" role="form">
						<input type="hidden" name="tarif_nilai_id">
						<input type="hidden" name="tarif_tipe_id" value="<?= $tarifTipe['tarif_tipe_id'] ?>">
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
							<div class="form-group">
								<label>Nominal</label>
								<input name="nominal" type="number" class="form-control" placeholder="Masukan Nominal">
							</div>
						</div>
						<!-- /.box-body -->
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="tarifNilaiSave('add')">Save</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-tarif_nilai_edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Detail Data</h4>
			</div>
			<div class="modal-body">
				<div id="box-tarif_nilai_edit" class="box box-default">
					<form id="form-tarif_nilai_edit" role="form">
						<input type="hidden" name="tarif_nilai_id">
						<input type="hidden" name="tarif_tipe_id" value="<?= $tarifTipe['tarif_tipe_id'] ?>">
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
				<button type="button" class="btn btn-primary" onclick="tarifNilaiSave('edit')">Save</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<script>
	function show_add() {
		$('#modal-add').modal('show')
	}

	function show_detail() {
		$('#modal-detail').modal('show')
	}
</script>