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
						<h3 class="box-title">Data Detail Tipe Tarif - SPP Bulanan</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-12" style="margin-bottom:20px">
							<button type="button" class="btn btn-block btn-primary" onclick="show_add()" style="width:15%">
								<i class="fa fa-plus"></i>
								Tambah Data
							</button>
						</div>
						<div class="col-md-12">
							<table id="example1" class="table table-bordered table-striped table-hover">
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
									<tr>
										<td>1</td>
										<td>2019</td>
										<td>1</td>
										<td>Rp 200.000</td>
										<td>
											<small class="label bg-green">Aktif</small>
										</td>
										<td>
											<a href="#" style="color:#f56954" data-toggle="tooltip" title="Edit" onclick="show_detail()">
												<i class="fa fa-edit"></i>
											</a>
										</td>
									</tr>
									<tr>
										<td>2</td>
										<td>2019</td>
										<td>2</td>
										<td>Rp 300.000</td>
										<td>
											<small class="label bg-green">Aktif</small>
										</td>
										<td>
											<a href="#" style="color:#f56954" data-toggle="tooltip" title="Edit" onclick="show_detail()">
												<i class="fa fa-edit"></i>
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

<div class="modal fade" id="modal-add">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Tambah Data</h4>
			</div>
			<div class="modal-body">
				<form role="form">
					<div class="box-body">
						<div class="form-group">
							<label>Tahun Ajaran</label>
							<select class="form-control">
								<option value="1">2018</option>
								<option value="0">2019</option>
							</select>
						</div>
						<div class="form-group">
							<label>Kelas</label>
							<select class="form-control">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select>
						</div>
						<div class="form-group">
							<label>Nominal</label>
							<input type="number" class="form-control" placeholder="Masukan Nominal">
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

<div class="modal fade" id="modal-detail">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Detail Data</h4>
			</div>
			<div class="modal-body">
				<form role="form">
					<div class="box-body">
						<div class="form-group">
							<label>Aktif</label>
							<select class="form-control">
								<option value="1">Ya</option>
								<option value="0">Tidak</option>
							</select>
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
	function show_add() {
		$('#modal-add').modal('show')
	}

	function show_detail() {
		$('#modal-detail').modal('show')
	}
</script>