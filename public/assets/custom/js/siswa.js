(function () {
  // My Datatables
  url = `${base_url}/data_master/siswa/listData`
  $(document).ready(() => {
    totalCol = parseInt($("#datatables-ss1").find('tr:nth-child(1) th').length)
    tbl = $('#datatables-ss1').DataTable({
      "PaginationType": "bootstrap",
      "responsive": true,
      "processing": true,
      "searching": true,
      "serverSide": true,
      "deferRender": true,
      "order": [],
      "ajax": {
        "url": url,
        "type": "POST",
        "data": (param) => {
          param.query = jsonFilter
        }
      },
      "columnDefs": [
        {
          "targets": [0, -1],
          "orderable": false
        }
      ]
    })
  })

  
}())
