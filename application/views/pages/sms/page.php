<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Data History SMS
			<!-- <small>Data & Pembayaran</small> -->
		</h1>
		<ol class="breadcrumb">
			<li class="active"><a href="#"><i class="fa fa-envelope-o"></i> Data History SMS</a></li>
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
								<div class="col-md-3 form-group">
									<label>Tipe SMS</label>
									<select class="form-control">
										<option>Pembayaran</option>
										<option>Reminder</option>
									</select>
								</div>
								<div class="col-md-3 form-group">
									<label>Dari Tanggal</label>
									<input type="date" class="form-control">
								</div>
								<div class="col-md-3 form-group">
									<label>Dari Tanggal</label>
									<input type="date" class="form-control">
								</div>
								<div class="col-md-3 form-group">
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
						<h3 class="box-title">Data History SMS</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-12">
							<table id="example1" class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th>Tipe SMS</th>
										<th>Tanggal SMS</th>
										<th>NIS</th>
										<th>Nama</th>
										<th>No Orang Tua</th>
										<th>Tipe Tarif</th>
										<th>Nominal Pembayaran</th>
										<th>Teks SMS</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>
											<small class="label bg-green">Pembayaran</small>
										</td>
										<td>27-08-2019 09:00</td>
										<td>1332</td>
										<td>Linda Purnama</td>
										<td>081231828311</td>
										<td>SPP Bulanan</td>
										<td>Rp. 900.000</td>
										<td>Anda telah membayarankan</td>
									</tr>
									<tr>
										<td>2</td>
										<td>
											<small class="label bg-red">Reminder</small>
										</td>
										<td>27-08-2019 09:00</td>
										<td>1332</td>
										<td>Linda Purnama</td>
										<td>081231828311</td>
										<td>OSIS</td>
										<td>Rp. 900.000</td>
										<td>Anda harus membayar Rp. 900.000 pada tanggal 19 agustus</td>
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
				<h4 class="modal-title">Detail History SMS</h4>
			</div>
			<div class="modal-body">
				<form role="form">
					<div class="box-body">
						<div class="form-group">
							<label>NIS</label>
							<input type="text" class="form-control" placeholder="NIS">
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control" placeholder="Nama">
						</div>
						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select class="form-control">
								<option>L</option>
								<option>P</option>
							</select>
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" placeholder="Alamat"></textarea>
						</div>
						<div class="form-group">
							<label>Nama Orang Tua</label>
							<input type="text" class="form-control" placeholder="Nama Orang Tua">
						</div>
						<div class="form-group">
							<label>No Orang Tua</label>
							<input type="number" class="form-control" placeholder="No Orang Tua">
						</div>
						<div class="form-group">
							<label>Email Orang Tua</label>
							<input type="email" class="form-control" placeholder="Email Orang Tua">
						</div>
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
	function show_detail() {
		$('#modal-detail').modal('show')
	}
</script>