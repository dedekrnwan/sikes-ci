// define
formId = {
  add: '#form-siswa_status_add',
  edit: '#form-siswa_status_edit',
}
boxId = {
  add: '#box-siswa_status_add',
  edit: '#box-siswa_status_edit',
}
modalId = {
  add: '#modal-siswa_status_add',
  edit: '#modal-siswa_status_edit',
}
siswa_id = $(formId.add).find('input[name="siswa_id"]').val() 
url = `${base_url}/data_master/siswa/listDataSiswaStatus/${siswa_id}`

// collection
const siswaStatusSave = (act) => {
  let data = $(formId[act]).serialize()
  $.ajax({
    type: 'POST',
    url: `${base_url}data_master/siswa/saveDataSiswaStatus`,
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

const siswaStatusAdd = () => {
  $(modalId.add).modal('show')
}

const siswaStatusEdit = (id = null) => {
  $.ajax({
    type: 'GET',
    url: `${base_url}data_master/siswa/getDataSiswaStatus?siswa_status_id=${id}`,
    beforeSend: () => { addLoading(boxId.edit) },
    success: (res) => {
      let d = JSON.parse(res)
      $(formId.edit).find('input[name="siswa_status_id"]').val(d.siswa_status_id)
      $(formId.edit).find('select[name="active"]').val(d.active)
      removeLoading(boxId.edit)
    }
  })
  $(modalId.edit).modal('show')
}

// execute
datatablesShow('#datatables-ss1')



