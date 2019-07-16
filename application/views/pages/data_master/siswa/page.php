<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Data Master Siswa
			<!-- <small>Data Master & Pembayaran</small> -->
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Data Master</a></li>
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
						<h3 class="box-title">Data Siswa</h3>
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
										<th>NIS</th>
										<th>Nama</th>
										<th>Jenis Kelamin</th>
										<th>Nama Orang Tua</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>1132</td>
										<td>Linda Purnama</td>
										<td>P</td>
										<td>Turminah</td>
										<td>
											<small class="label bg-green">Aktif</small>
										</td>
										<td>
											<a href="#" style="color:#f56954" data-toggle="tooltip" title="Edit" onclick="show_detail()">
												<i class="fa fa-edit"></i>
											</a>
											<a href="<?= base_url() ?>data_master/siswa/page/status" style="color:green" onclick="show_detail()">
												<i class="fa fa-search"></i>
											</a>
										</td>
									</tr>
									<tr>
										<td>2</td>
										<td>1133</td>
										<td>Aisyah Fadly</td>
										<td>P</td>
										<td>Parjo</td>
										<td>
											<small class="label bg-red">Tidak Aktif</small>
										</td>
										<td>
											<a href="#" style="color:#f56954" data-toggle="tooltip" title="Edit" onclick="show_detail()">
												<i class="fa fa-edit"></i>
											</a>
											<a href="<?= base_url() ?>data_master/siswa/page/status" style="color:green" onclick="show_detail()">
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
				<h4 class="modal-title">Detail Siswa</h4>
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