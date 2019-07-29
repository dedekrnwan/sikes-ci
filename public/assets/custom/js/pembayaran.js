// define
url = `${base_url}/pembayaran/listData`
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

// execute
datatablesShow('#datatables-ss1')



