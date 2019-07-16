<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?= base_url() ?>public/assets/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p>Lia</p>
				<a href="#"><i class="fa fa-circle text-success"></i> Admin</a>
			</div>
		</div>
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MAIN</li>
			<li>
				<a href="<?= base_url() ?>dashboard/page">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				</a>
			</li>
			<li class="header">KELOLA DATA MASTER</li>
			<li>
				<a href="<?= base_url() ?>data_master/siswa/page">
					<i class="fa fa-user"></i> <span>Siswa</span>
				</a>
			</li>
			<li>
				<a href="<?= base_url() ?>data_master/tahun_ajaran/page">
					<i class="fa fa-map-signs"></i> <span>Tahun Ajaran</span>
				</a>
			</li>
			<li>
				<a href="<?= base_url() ?>data_master/tipe_tarif/page">
					<i class="fa fa-cubes"></i> <span>Tipe Tarif</span>
				</a>
			</li>
			<li class="header">KELOLA PEMBAYARAN</li>
			<li>
				<a href="<?= base_url() ?>pembayaran/page">
					<i class="fa fa-money"></i> <span>Data Pembayaran</span>
				</a>
			</li>
			<li class="header">SMS Service</li>
			<li>
				<a href="<?= base_url() ?>sms/page">
					<i class="fa fa-envelope-o"></i> <span>History SMS</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>