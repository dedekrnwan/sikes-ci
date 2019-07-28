// define
formId = {
  add: '#form-tarif_nilai_add',
  edit: '#form-tarif_nilai_edit',
}
boxId = {
  add: '#box-tarif_nilai_add',
  edit: '#box-tarif_nilai_edit',
}
modalId = {
  add: '#modal-tarif_nilai_add',
  edit: '#modal-tarif_nilai_edit',
}
tarif_tipe_id = $(formId.add).find('input[name="tarif_tipe_id"]').val() 
url = `${base_url}/data_master/tipe_tarif/listDataTarifNilai/${tarif_tipe_id}`

// collection
const tarifNilaiSave = (act) => {
  let data = $(formId[act]).serialize()
  $.ajax({
    type: 'POST',
    url: `${base_url}data_master/tipe_tarif/saveDataTarifNilai`,
    data: data,
    beforeSend: () => { addLoading(boxId[act]) },
    success: (res) => {
      removeLoading(boxId[act])
      if (res === 'true') {
        swal("Berhasil !", "Data berhasil disave !", "success").then((v) => {
          $(modalId[act]).modal('hide')
          tbl.ajax.reload(null, false)
        })
      } else {
        swal("Gagal !", "Data gagal disave !", "error")
      }
    }
  })
}

const tarifNilaiAdd = () => {
  $(modalId.add).modal('show')
}

const tarifNilaiEdit = (id = null) => {
  $.ajax({
    type: 'GET',
    url: `${base_url}data_master/tipe_tarif/getDataTarifNilai?tarif_nilai_id=${id}`,
    beforeSend: () => { addLoading(boxId.edit) },
    success: (res) => {
      let d = JSON.parse(res)
      $(formId.edit).find('input[name="tarif_nilai_id"]').val(d.tarif_nilai_id)
      $(formId.edit).find('select[name="active"]').val(d.active)
      removeLoading(boxId.edit)
    }
  })
  $(modalId.edit).modal('show')
}

// execute
datatablesShow('#datatables-ss1')



