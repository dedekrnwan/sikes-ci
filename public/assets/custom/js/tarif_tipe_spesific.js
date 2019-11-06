// define
formId = '#form-tarif_tipe_spesific_add'
boxId = '#box-tarif_tipe_spesific_add'
modalId = '#modal-tarif_tipe_spesific_add'
tarif_tipe_id = $(formId).find('input[name="tarif_tipe_id"]').val() 
url = `${base_url}/data_master/tipe_tarif/listDataTarifTipeSpesific/${tarif_tipe_id}`

// collection
const tarifTipeSpesificSave = act => {
  let data = $(formId).serialize()
  $.ajax({
    type: 'POST',
    url: `${base_url}data_master/tipe_tarif/saveDataTarifTipeSpesific`,
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

const tarifTipeSpesificAdd = () => $(modalId).modal('show')

// execute
datatablesShow('#datatables-ss1')



