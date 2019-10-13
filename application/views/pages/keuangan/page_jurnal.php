<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Jurnal
      <!-- <small>Data Master & Jurnal</small> -->
    </h1>
    <ol class="breadcrumb">
      <li class="active"><i class="fa fa-money"></i> Data Jurnal</li>
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
                  <label>Jenis</label>
                  <select param-filter name="jurnal_type" class="form-control">
                    <option value="">-Pilih-</option>
                    <option value="in">Pemasukan</option>
                    <option value="out">Pengeluaran</option>
                  </select>
                </div>
                <div class="col-md-4 form-group">
                  <label>Tanggal</label>
                  <input param-filter name="date_added" type="date" class="form-control">
                </div>
                <div class="col-md-4 form-group">
                  <label></label>
                  <button btn-filter-jurnal type="button" class="btn btn-block btn-warning" style="width:50%">
                    <i class="fa fa-search"></i> Filter
                  </button>
                </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-xs-12">
        <div id="box-jurnal_table" class="box">
          <div class="box-header">
            <h3 class="box-title">List Data Jurnal
              <small class="label bg-green totalIn">Total Pemasukan : 0</small>
              <small class="label bg-red totalOut">Total Pengeluaran : 0</small>
              <small class="label bg-aqua totalBalance">Total Balance : 0</small>
            </h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="col-md-12" style="margin-bottom:20px">
              <button type="button" class="btn btn-block btn-primary" style="width:15%" onclick="jurnalModal()">
                <i class="fa fa-plus"></i>
                Tambah Data
              </button>
            </div>
            <div class="col-md-12">
              <table id="datatables-ss1" class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Jenis</th>
                    <th>Total</th>
                    <th>Keterangan</th>
                    <th>Date Added</th>
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

<div class="modal fade" id="modal-jurnal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Jurnal</h4>
      </div>
      <div class="modal-body">
        <div id="box-jurnal" class="box box-default">
          <form id="form-jurnal" role="form">
            <input type="hidden" name="t_jurnal_id">
            <div class="box-body">
              <div class="form-group">
                <label>Jenis</label>
                <select name="jurnal_type" class="form-control">
                  <option value="">-Pilih-</option>
                  <option value="in">Pemasukan</option>
                  <option value="out">Pengeluaran</option>
                </select>
              </div>
              <div class="form-group">
                <label>Total</label>
                <input name="total" type="number" class="form-control" placeholder="Masukan Nominal">
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <input name="keterangan" type="text" class="form-control" placeholder="Masukan Keterangan">
              </div>
              <div class="form-group">
                <label>Tanggal</label>
                <input name="date_added" type="date" class="form-control" placeholder="Masukan Tanggal">
              </div>
              <div class="form-group">
                <label>Active</label>
                <select name="active" class="form-control">
                  <option value="">-Pilih-</option>
                  <option value="1">Aktif</option>
                  <option value="0">Tidak Aktif</option>
                </select>
              </div>
            </div>
            <!-- /.box-body -->
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="jurnalSave()">Submit</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
