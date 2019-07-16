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
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Data Tipe Tarif</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-12" style="margin-bottom:20px">
							<button type="button" class="btn btn-block btn-primary" onclick="show_detail()" style="width:15%">
								<i class="fa fa-plus"></i>
								Tambah Data
							</button>
						</div>
						<div class="col-md-12">
							<table id="example1" class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th>Tipe Tarif</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>
											<small class="label bg-blue">Bulanan</small>
										</td>
										<td>SPP Bulanan</td>
										<td>
											<a href="#" style="color:#f56954" data-toggle="tooltip" title="Edit" onclick="show_detail()">
												<i class="fa fa-edit"></i>
											</a>
											<a href="#" style="color:#00c0ef" data-toggle="tooltip" title="Sync Data Tunggakan">
												<i class="fa fa-refresh"></i>
											</a>
											<a href="<?= base_url() ?>data_master/tipe_tarif/page/detail" style="color:#00a65a" data-toggle="tooltip" title="Detail Data Per Kelas & TA">
												<i class="fa fa-search"></i>
											</a>
										</td>
									</tr>
									<tr>
										<td>2</td>
										<td>
											<small class="label bg-blue">Bulanan</small>
										</td>
										<td>Uang Gedung</td>
										<td>
											<a href="#" style="color:#f56954" data-toggle="tooltip" title="Edit" onclick="show_detail()">
												<i class="fa fa-edit"></i>
											</a>
											<a href="#" style="color:#00c0ef" data-toggle="tooltip" title="Sync Data Tunggakan">
												<i class="fa fa-refresh"></i>
											</a>
											<a href="<?= base_url() ?>data_master/tipe_tarif/page/detail" style="color:#00a65a" data-toggle="tooltip" title="Detail Data Per Kelas & TA">
												<i class="fa fa-search"></i>
											</a>
										</td>
									</tr>
									<tr>
										<td>3</td>
										<td>
											<small class="label bg-blue">Bulanan</small>
										</td>
										<td>Ekstrakulikuler</td>
										<td>
											<a href="#" style="color:#f56954" data-toggle="tooltip" title="Edit" onclick="show_detail()">
												<i class="fa fa-edit"></i>
											</a>
											<a href="#" style="color:#00c0ef" data-toggle="tooltip" title="Sync Data Tunggakan">
												<i class="fa fa-refresh"></i>
											</a>
											<a href="<?= base_url() ?>data_master/tipe_tarif/page/detail" style="color:#00a65a" data-toggle="tooltip" title="Detail Data Per Kelas & TA">
												<i class="fa fa-search"></i>
											</a>
										</td>
									</tr>
									<tr>
										<td>4</td>
										<td>
											<small class="label bg-green">Cicilan</small>
										</td>
										<td>Pendaftaran Siswa Baru (PSB)</td>
										<td>
											<a href="#" style="color:firebrick" onclick="show_detail()">
												<i class="fa fa-edit"></i>
											</a>
											<a href="#" style="color:#00c0ef" data-toggle="tooltip" title="Sync Data Tunggakan">
												<i class="fa fa-refresh"></i>
											</a>
											<a href="<?= base_url() ?>data_master/tipe_tarif/page/detail" style="color:#00a65a" data-toggle="tooltip" title="Detail Data Per Kelas & TA">
												<i class="fa fa-search"></i>
											</a>
										</td>
									</tr>
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


<div class="modal fade" id="modal-detail">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Detail Tipe Tarif</h4>
			</div>
			<div class="modal-body">
				<form role="form">
					<div class="box-body">
						<div class="form-group">
							<label>Tipe Transaksi</label>
							<select class="form-control">
								<option value="1">Bulanan</option>
								<option value="1">Cicilan</option>
							</select>
						</div>
						<div class="form-group">
							<label>Tipe Tarif</label>
							<input type="text" class="form-control" placeholder="Tipe Tarif">
						</div>
					</div>
					<!-- /.box-body -->
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary">Save</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<script>
	function show_detail() {
		$('#modal-detail').modal('show')
	}
</script>