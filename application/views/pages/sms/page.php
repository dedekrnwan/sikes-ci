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
									<select param-filter name="message_type" class="form-control">
										<option value="pembayaran">Pembayaran</option>
										<option value="reminder">Reminder</option>
									</select>
								</div>
								<div class="col-md-3 form-group">
									<label>Dari Tanggal</label>
									<input param-filter name="date_from" type="date" class="form-control">
								</div>
								<div class="col-md-3 form-group">
									<label>Smpai Tanggal</label>
									<input param-filter name="date_until" type="date" class="form-control">
								</div>
								<div class="col-md-3 form-group">
									<label></label>
									<button btn-filter type="button" class="btn btn-block btn-warning" style="width:50%">
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
							<table id="datatables-ss1" class="table table-bordered table-striped table-hover">
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