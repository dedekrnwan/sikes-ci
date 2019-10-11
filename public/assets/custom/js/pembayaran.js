// define
url = `${base_url}/pembayaran/listData`
formId = '#form-pembayaran'
boxId = '#box-pembayaran'
modalId = '#modal-pembayaran'
boxTblId = '#box-pembayaran_table'
modalHistoryId = '#modal-history_pembayaran'

// collection
const historyPembayaran = (id) => {
  $.ajax({
    type: 'GET',
    url: `${base_url}pembayaran/getHistory?t_pembayaran_id=${id}`,
    beforeSend: () => { addLoading(boxTblId) },
    success: (res) => {
      removeLoading(boxTblId)
      $(modalHistoryId).find('tbody').html(res)
      $(modalHistoryId).modal('show')
    }
  })
}

const pembayaranModal = (id) => {
  $(formId).get(0).reset()
  $(formId).find('input').val(0).attr('readonly', false)
  $.ajax({
    type: 'GET',
    url: `${base_url}pembayaran/getPembayaran?t_pembayaran_id=${id}`,
    beforeSend: () => { addLoading(boxTblId) },
    success: (res) => {
      let d = JSON.parse(res)
      $(formId).find('input[name="t_pembayaran_id"]').val(id)
      if(d.transaction_type_id == 1) {
        $(formId).find('input[name="nominal"]').val(d.nominal).attr('readonly', true)
      } else {
        $(formId).find('input[name="nominal"]').val(d.nominal).attr('readonly', false)
      }
      removeLoading(boxTblId)
    }
  })
  $(modalId).modal('show')
}

const pembayaranSave = () => {
  let data = $(formId).serialize()
  console.log(data)
  $.ajax({
    type: 'POST',
    url: `${base_url}pembayaran/savePembayaran`,
    data: data,
    beforeSend: () => { addLoading(boxId) },
    success: (res) => {
      removeLoading(boxId)
      if (res === 'true') {
        swal("Berhasil !", "Pembayaran berhasil dilakukan !", "success").then((v) => {
          $(modalId).modal('hide')
          tbl.ajax.reload(null, false)
          balanceSms()
        })
      } else {
        swal("Gagal !", "Pembayaran gagal dilakukan !", "error")
      }
    }
  })
}

const balanceSms = () => {
  $.ajax({
    type: 'GET',
    url: `${base_url}pembayaran/getBalanceSms`,
    success: (res) => {
      let d = JSON.parse(res)
      $('.balanceSms').text(`Saldo SMS : ${d.balanceSms}`)
    }
  })
}

// execute
balanceSms()
datatablesShow('#datatables-ss1')



