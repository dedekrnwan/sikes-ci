<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Data Master Tahun Ajaran
			<!-- <small>Data Master & Pembayaran</small> -->
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-map-signs"></i> Data Master</a></li>
			<li class="active">Tahun Ajaran</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Data Tahun Ajaran</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-12" style="margin-bottom:20px">
							<button type="button" class="btn btn-sm btn-block btn-primary" onclick="taModal()" style="width:15%">
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


<div class="modal fade" id="modal-ta">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Detail Tahun Ajaran</h4>
			</div>
			<div class="modal-body">
				<div id="box-ta" class="box box-default">
					<form id="form-ta" role="form">
						<div class="box-body">
							<input type="hidden" name="ta_id" value="0">
							<div class="form-group">
								<label>Tahun Ajaran</label>
								<input name="ta" type="text" class="form-control" placeholder="Tahun Ajaran">
							</div>
						</div>
						<!-- /.box-body -->
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="taSave()">Save</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>