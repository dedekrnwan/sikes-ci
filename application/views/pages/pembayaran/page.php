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
								<div class="col-md-4 form-group">
									<label>NIS</label>
									<input type="text" class="form-control" placeholder="Masukan NIS">
								</div>
								<div class="col-md-4 form-group">
									<label>Tahun Ajaran</label>
									<select class="form-control">
										<option>2018</option>
										<option>2019</option>
									</select>
								</div>
								<div class="col-md-4 form-group">
									<label>Kelas</label>
									<select class="form-control">
										<option>1</option>
										<option>2</option>
										<option>3</option>
									</select>
								</div>
								<div class="col-md-4 form-group">
									<label>Tipe Transaksi</label>
									<select class="form-control">
										<option>Cicilan</option>
										<option>Bulanan</option>
									</select>
								</div>
								<div class="col-md-4 form-group">
									<label>Bulan</label>
									<select class="form-control">
										<option>Jan</option>
										<option>Feb</option>
										<option>Mar</option>
										<option>Apr</option>
										<option>Mei</option>
										<option>Jun</option>
										<option>Jul</option>
										<option>Agu</option>
										<option>Sep</option>
										<option>Okt</option>
										<option>Nov</option>
										<option>Des</option>
									</select>
								</div>
								<div class="col-md-4 form-group">
									<label></label>
									<button type="button" class="btn btn-block btn-warning" style="width:50%">
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
						<h3 class="box-title">List Data Pemayaran</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-12">
							<table id="example1" class="table table-bordered table-striped table-hover">
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
									<tr>
										<td>1</td>
										<td>1132</td>
										<td>Linda Purnama</td>
										<td>
											<small class="label bg-blue">Bulanan</small>
										</td>
										<td>SPP Bulanan</td>
										<td>2019</td>
										<td>1</td>
										<td>Jan</td>
										<th>Rp 0</th>
										<td>
											<small class="label bg-green">Lunas</small>
										</td>
										<td>
											<a href="#" style="color:#f56954" data-toggle="tooltip" title="Bayar" onclick="show_bayar_bulanan()">
												<i class="fa fa-money"></i>
											</a>
											<a href="#" style="color:#00c0ef" data-toggle="tooltip" title="History Pembayaran" onclick="show_history_pembayaran()">
												<i class="fa fa-history"></i>
											</a>
										</td>
									</tr>
									<tr>
										<td>2</td>
										<td>1132</td>
										<td>Linda Purnama</td>
										<td>
											<small class="label bg-blue">Bulanan</small>
										</td>
										<td>SPP Bulanan</td>
										<td>2019</td>
										<td>1</td>
										<td>Feb</td>
										<th>Rp 0</th>
										<td>
											<small class="label bg-green">Lunas</small>
										</td>
										<td>
											<a href="#" style="color:#f56954" data-toggle="tooltip" title="Bayar" onclick="show_bayar_bulanan()">
												<i class="fa fa-money"></i>
											</a>
											<a href="#" style="color:#00c0ef" data-toggle="tooltip" title="History Pembayaran" onclick="show_history_pembayaran()">
												<i class="fa fa-history"></i>
											</a>
										</td>
									</tr>
									<tr>
										<td>3</td>
										<td>1132</td>
										<td>Linda Purnama</td>
										<td>
											<small class="label bg-blue">Bulanan</small>
										</td>
										<td>SPP Bulanan</td>
										<td>2019</td>
										<td>1</td>
										<td>Mar</td>
										<th>Rp 200.000</th>
										<td>
											<small class="label bg-yellow">Belum Lunas</small>
										</td>
										<td>
											<a href="#" style="color:#f56954" data-toggle="tooltip" title="Bayar" onclick="show_bayar_bulanan()">
												<i class="fa fa-money"></i>
											</a>
											<a href="#" style="color:#00c0ef" data-toggle="tooltip" title="History Pembayaran" onclick="show_history_pembayaran()">
												<i class="fa fa-history"></i>
											</a>
										</td>
									</tr>
									<tr>
										<td>4</td>
										<td>1132</td>
										<td>Linda Purnama</td>
										<td>
											<small class="label bg-green">Cicilan</small>
										</td>
										<td>Pendaftaran Siswa Baru</td>
										<td>2019</td>
										<td>1</td>
										<td>-</td>
										<th>Rp 1.200.000</th>
										<td>
											<small class="label bg-yellow">Belum Lunas</small>
										</td>
										<td>
											<a href="#" style="color:#f56954" data-toggle="tooltip" title="Bayar" onclick="show_bayar_cicilan()">
												<i class="fa fa-money"></i>
											</a>
											<a href="#" style="color:#00c0ef" data-toggle="tooltip" title="History Pembayaran" onclick="show_history_pembayaran()">
												<i class="fa fa-history"></i>
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

<div class="modal fade" id="modal-bayar-bulanan">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Form Pembayaran <i><small>[Bulanan]</small></i></h4>
			</div>
			<div class="modal-body">
				<form role="form">
					<div class="box-body">
						<div class="form-group">
							<label>Nominal</label>
							<input type="text" class="form-control" disabled placeholder="Masukan Nominal" value="5000000">
						</div>
					</div>
					<!-- /.box-body -->
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary">Submit</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-bayar-cicilan">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Form Pembayaran <i><small>[Cicilan]</small></i></h4>
			</div>
			<div class="modal-body">
				<form role="form">
					<div class="box-body">
						<div class="form-group">
							<label>Nominal</label>
							<input type="text" class="form-control" disabled placeholder="Masukan Nominal">
						</div>
					</div>
					<!-- /.box-body -->
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary">Submit</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-history-pembayaran">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">History Pembayaran</h4>
			</div>
			<div class="modal-body">
				<form role="form">
					<div class="box-body">
						<div class="col-md-12">
							<table id="example1" class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th>Tgl Pembayaran</th>
										<th>Nominal</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>15-07-2019 09:00:00</td>
										<td>Rp 200.000</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<!-- /.box-body -->
				</form>
			</div>
			<div class="modal-footer">
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>



<script>
	function show_bayar_bulanan() {
		$('#modal-bayar-bulanan').modal('show')
	}

	function show_bayar_cicilan() {
		$('#modal-bayar-cicilan').modal('show')
	}

	function show_history_pembayaran() {
		$('#modal-history-pembayaran').modal('show')
	}
</script>