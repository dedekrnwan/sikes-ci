// define
url = `${base_url}/jurnal/listData`
formId = '#form-jurnal'
boxId = '#box-jurnal'
modalId = '#modal-jurnal'

// collection
const jurnalModal = (id = null) => {
  if (id == null) {
    $(formId).get(0).reset()
    $(formId).find('input[type="hidden"]').val(0)
  } else {
    $.ajax({
      type: 'GET',
      url: `${base_url}jurnal/getData?t_jurnal_id=${id}`,
      beforeSend: () => { addLoading(boxId) },
      success: (res) => {
        let d = JSON.parse(res)
        $(formId).find('input[name="t_jurnal_id"]').val(d.t_jurnal_id)
        $(formId).find('select[name="jurnal_type"]').val(d.jurnal_type)
        $(formId).find('input[name="total"]').val(d.total)
        $(formId).find('input[name="keterangan"]').val(d.keterangan)
        $(formId).find('input[name="date_added"]').val(d.date_added)
        $(formId).find('select[name="active"]').val(d.active)
        removeLoading(boxId)
      }
    })
  }
  $(modalId).modal('show')
}

const jurnalSave = () => {
  let data = $(formId).serialize()
  console.log(data)
  $.ajax({
    type: 'POST',
    url: `${base_url}jurnal/saveData`,
    data: data,
    beforeSend: () => { addLoading(boxId) },
    success: (res) => {
      removeLoading(boxId)
      if (res === 'true') {
        swal("Berhasil !", "Data berhasil di save !", "success").then((v) => {
          $(modalId).modal('hide')
          tbl.ajax.reload(null, false)
          jurnalSummary()
        })
      } else {
        swal("Gagal !", "Data gagal di save !", "error")
      }
    }
  })
}

const jurnalSummary = () => {
  let date = $('input[param-filter][name="date_added"]').val()
  if(date == '') date = 0
  $.ajax({
    type: 'GET',
    url: `${base_url}jurnal/getSummary/${date}`,
    success: (res) => {
      let d = JSON.parse(res)
      $('.totalIn').text('Total pemasukan: Rp '+d.total_in)
      $('.totalOut').text('Total pengeluaran: Rp '+d.total_out)
      $('.totalBalance').text('Total balance: Rp '+d.total_balance)
    }
  })
}

// print
const printShow = () => {
	printJS({
		printable: 'printPage',
		type: 'html',
    style: `
    #datatables-title, .totalIn, .totalOut, .totalBalance {
      font-family: arial, sans-serif;
      font-size: 15px;
    }

    .form-control, label, a, li, .dataTables_info {
      display: none; 
    }

		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}
	
		td:not(:last-child), th:not(:last-child) { /* I just added ':not(:last-child)' here */
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
		}

		td:(:last-child), th:(:last-child) {
			/* Hide the text. */
			text-indent: 100%;
			white-space: nowrap;
			overflow: hidden;
			color: white;
		}

		tr:nth-child(even) td:not(:last-child) { /* And here */
			background-color: #dddddd;
		}
		`,
		scanStyles: false
	})
}

// execute
jurnalSummary()
datatablesShow('#datatables-ss1')

// custom-core
$('[btn-filter-jurnal]').click(() => {
  jsonFilter = JSON.stringify(queryFilter)
  tbl.ajax.reload(null, false)
  jurnalSummary()
})

