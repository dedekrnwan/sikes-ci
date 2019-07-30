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
    $(formId).find('input').val(0).attr('disabled', false)
    $.ajax({
      type: 'GET',
      url: `${base_url}pembayaran/getPembayaran?t_pembayaran_id=${id}`,
      beforeSend: () => { addLoading(boxTblId) },
      success: (res) => {
        let d = JSON.parse(res)
        if(d !== 0) {
          alert('disini')
          $(formId).find('input[name="t_pembayaran_id"]').val(id)
          $(formId).find('input[name="nominal"]').val(d).attr('disabled', true)
        }
        removeLoading(boxTblId)
      }
    })
  $(modalId).modal('show')
}

// execute
datatablesShow('#datatables-ss1')



