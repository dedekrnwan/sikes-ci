// define
url = `${base_url}/data_master/tipe_tarif/listData`
formId = '#form-tarif_tipe'
boxId = '#box-tarif_tipe'
modalId = '#modal-tarif_tipe'
boxTblId = '#box-tarif_tipe_table'

// collection
const tarifTipeSave = () => {
  let data = $(formId).serialize()
  $.ajax({
    type: 'POST',
    url: `${base_url}data_master/tipe_tarif/saveData`,
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

const tarifTipeModal = (id = null) => {
  if (id == null) {
    $(formId).get(0).reset()
    $(formId).find('input[type="hidden"]').val(0)
  } else {
    $.ajax({
      type: 'GET',
      url: `${base_url}data_master/tipe_tarif/getData?tarif_tipe_id=${id}`,
      beforeSend: () => { addLoading(boxId) },
      success: (res) => {
        let d = JSON.parse(res)
        $(formId).find('input[name="tarif_tipe_id"]').val(d.tarif_tipe_id)
        $(formId).find('input[name="tarif_tipe"]').val(d.tarif_tipe)
        $(formId).find('select[name="transaction_type_id"]').val(d.transaction_type_id)
        removeLoading(boxId)
      }
    })
  }
  $(modalId).modal('show')
}

const syncTarif = (id) => {
  swal("Perhatian !", "Data yang tersync tidak dapat kembali lagi, apa anda yakin ?", "warning", {
    dangerMode: true,
    buttons: {
      cancel: true,
      confirm: "Confirm"
    }
  }).then((v) => {
    if (v) {
      $.ajax({
        type: 'POST',
        url: `${base_url}data_master/tipe_tarif/sync/${id}`,
        data: {},
        beforeSend: () => { addLoading(boxTblId) },
        success: (res) => {
          let d = JSON.parse(res)
          removeLoading(boxTblId)
          swal("Berhasil !", "Sync berhasil dilakukan !", "success").then((v) => {
            tbl.ajax.reload(null, false)
          })
        }
      })
    }
  })
}

// execute
datatablesShow('#datatables-ss1')





