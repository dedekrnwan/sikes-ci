<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Detail Tipe Tarif Spesific
			<!-- <small>Data Master & Pembayaran</small> -->
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-cubes"></i> Data Master</a></li>
			<li class="active">Tipe Tarif Spesific</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Data Detail Tipe Tarif Spesific - <?= $tarifTipe['tarif_tipe'] ?></h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-12" style="margin-bottom:20px">
							<button type="button" class="btn btn-sm btn-block btn-primary" onclick="tarifTipeSpesificAdd()" style="width:15%">
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

<div class="modal fade" id="modal-tarif_tipe_spesific_add">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Tambah Data</h4>
			</div>
			<div class="modal-body">
				<div id="box-tarif_tipe_spesific_add" class="box box-default">
					<form id="form-tarif_tipe_spesific_add" role="form">
						<input type="hidden" name="tarif_tipe_spesific_id">
						<input type="hidden" name="tarif_tipe_id" value="<?= $tarifTipe['tarif_tipe_id'] ?>">
						<div class="box-body">
							<div class="form-group">
								<label>Siswa</label>
								<select name="siswa_id" class="form-control">
									<option value="0">-Pilih-</option>
									<?php foreach ($listSiswa as $ls) : ?>
										<option value="<?= $ls['siswa_id'] ?>"><?= $ls['nis'].' - '.$ls['nama'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<!-- /.box-body -->
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="tarifTipeSpesificSave('add')">Save</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>