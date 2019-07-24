// define
url = `${base_url}/data_master/tahun_ajaran/listData`
formId = '#form-ta'
boxId = '#box-ta'
modalId = '#modal-ta'

// collection
const taSave = () => {
  let data = $(formId).serialize()
  $.ajax({
    type: 'POST',
    url: `${base_url}data_master/tahun_ajaran/saveData`,
    data: data,
    beforeSend: () => { addLoading(boxId) },
    success: (res) => {
      removeLoading(boxId)
      if (res === 'true') {
        swal("Berhasil !", "Data berhasil disave !", "success").then((v) => {
          $(modalId).modal('hide')
          tbl.ajax.reload(null, false)
        })
      } else {
        swal("Gagal !", "Data gagal disave !", "error")
      }
    }
  })
}

const taModal = (id = null) => {
  if (id == null) {
    $(formId).get(0).reset()
    $(formId).find('input[type="hidden"]').val(0)
  } else {
    $.ajax({
      type: 'GET',
      url: `${base_url}data_master/tahun_ajaran/getData?ta_id=${id}`,
      beforeSend: () => { addLoading(boxId) },
      success: (res) => {
        let d = JSON.parse(res)
        $(formId).find('input[name="ta_id"]').val(d.ta_id)
        $(formId).find('input[name="ta"]').val(d.ta)
        removeLoading(boxId)
      }
    })
  }
  $(modalId).modal('show')
}

// execute
datatablesShow('#datatables-ss1')



