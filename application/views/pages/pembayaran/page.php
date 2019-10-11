<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Data Pembayaran
			<!-- <small>Data Master & Pembayaran</small> -->
		</h1>
		<ol class="breadcrumb">
			<li class="active"><i class="fa fa-money"></i> Data Pembayaran</li>
			<!-- <li class="active"></li> -->
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
								<?php if ($this->session->has_userdata('user_id')) : ?>
									<div class="col-md-4 form-group">
										<label>NIS</label>
										<input param-filter name="nis" type="text" class="form-control" placeholder="Masukan NIS">
									</div>
								<?php endif; ?>
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
										<option value="">-Pilih-</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
									</select>
								</div>
								<div class="col-md-4 form-group">
									<label>Tipe Transaksi</label>
									<select param-filter name="transaction_type_id" class="form-control">
										<option value="0">-Pilih-</option>
										<?php foreach ($listTransactionType as $tt) : ?>
											<option value="<?= $tt['transaction_type_id'] ?>"><?= $tt['transaction_type'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-md-4 form-group">
									<label>Tarif Tipe</label>
									<select param-filter name="tarif_tipe_id" class="form-control">
										<option value="0">-Pilih-</option>
										<?php foreach ($listTarifTipe as $tt) : ?>
											<option value="<?= $tt['tarif_tipe_id'] ?>"><?= $tt['tarif_tipe'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-md-4 form-group">
									<label>Bulan</label>
									<select param-filter name="bulan_ke" class="form-control">
										<option value="">-Pilih-</option>
										<option value="1">Jan (1)</option>
										<option value="2">Feb (2)</option>
										<option value="3">Mar (3)</option>
										<option value="4">Apr (4)</option>
										<option value="5">Mei (5)</option>
										<option value="6">Jun (6)</option>
										<option value="7">Jul (7)</option>
										<option value="8">Agu (8)</option>
										<option value="9">Sep (9)</option>
										<option value="10">Okt (10)</option>
										<option value="11">Nov (11)</option>
										<option value="12">Des (12)</option>
									</select>
								</div>
								<div class="col-md-4 form-group">
									<label></label>
									<button btn-filter type="button" class="btn btn-block btn-primary" style="width:50%">
										<i class="fa fa-search"></i> Filter
									</button>
								</div>
						</form>
					</div>
				</div>
			</div>

			<div class="col-xs-12">
				<div id="box-pembayaran_table" class="box">
					<div class="box-header">
						<h3 class="box-title">List Data Pembayaran - <small class="label bg-yellow balanceSms">Saldo SMS : 0</small></h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-12">
							<table id="datatables-ss1" class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th>NIS</th>
										<th>Nama Siswa</th>
										<th>Tipe Transaksi</th>
										<th>Tipe Tarif</th>
										<th>Tahun Ajaran</th>
										<th>Kelas</th>
										<th>Bulan</th>
										<th>Sisa Tunggakan</th>
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

<div class="modal fade" id="modal-pembayaran">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Form Pembayaran</h4>
			</div>
			<div class="modal-body">
				<div id="box-pembayaran" class="box box-default">
					<form id="form-pembayaran" role="form">
						<input type="hidden" name="t_pembayaran_id">
						<div class="box-body">
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
				<button type="button" class="btn btn-primary" onclick="pembayaranSave()">Submit</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-history_pembayaran">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">History Pembayaran</h4>
			</div>
			<div class="modal-body">
				<div class="box-body">
					<div class="col-md-12">
						<table id="datatables-ss1" class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>Tgl Pembayaran</th>
									<th>Nominal</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<div class="modal-footer">
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>