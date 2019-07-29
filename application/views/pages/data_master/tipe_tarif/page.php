<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Data Master Tipe Tarif
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
				<div id="box-tarif_tipe_table" class="box">
					<div class="box-header">
						<h3 class="box-title">Data Tipe Tarif</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-12" style="margin-bottom:20px">
							<button type="button" class="btn btn-block btn-primary" onclick="tarifTipeModal()" style="width:15%">
								<i class="fa fa-plus"></i>
								Tambah Data
							</button>
						</div>
						<div class="col-md-12">
							<table id="datatables-ss1" class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th>Tipe Transaksi</th>
										<th>Tipe Tarif</th>
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


<div class="modal fade" id="modal-tarif_tipe">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Detail Tipe Tarif</h4>
			</div>
			<div class="modal-body">
				<div id="box-tarif_tipe" class="box box-default">
					<form id="form-tarif_tipe" role="form">
						<div class="box-body">
							<input type="hidden" name="tarif_tipe_id" value="0">
							<div class="form-group">
								<label>Tipe Transaksi</label>
								<select name="transaction_type_id" class="form-control">
									<option value="0">-Pilih-</option>
									<?php foreach ($listTransactionType as $tt) : ?>
										<option value="<?= $tt['transaction_type_id'] ?>"><?= $tt['transaction_type'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label>Tipe Tarif</label>
								<input name="tarif_tipe" type="text" class="form-control" placeholder="Tipe Tarif">
							</div>
						</div>
						<!-- /.box-body -->
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="tarifTipeSave()">Save</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>