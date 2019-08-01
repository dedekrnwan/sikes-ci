// define
url = `${base_url}/data_master/siswa/listData`
formId = '#form-siswa'
boxId = '#box-siswa'
modalId = '#modal-siswa'

// collection
const siswaSave = () => {
  let data = $(formId).serialize()
  $.ajax({
    type: 'POST',
    url: `${base_url}data_master/siswa/saveData`,
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

const siswaModal = (id = null) => {
  if (id == null) {
    $(formId).get(0).reset()
    $(formId).find('input[type="hidden"]').val(0)
  } else {
    $.ajax({
      type: 'GET',
      url: `${base_url}data_master/siswa/getData?siswa_id=${id}`,
      beforeSend: () => { addLoading(boxId) },
      success: (res) => {
        let d = JSON.parse(res)
        $(formId).find('input[name="siswa_id"]').val(d.siswa_id)
        $(formId).find('input[name="nis"]').val(d.nis)
        $(formId).find('input[name="nama"]').val(d.nama)
        $(formId).find('select[name="jenis_kelamin"]').val(d.jenis_kelamin)
        $(formId).find('textarea[name="alamat"]').val(d.alamat)
        $(formId).find('input[name="nama_ortu"]').val(d.nama_ortu)
        $(formId).find('input[name="no_ortu"]').val(d.no_ortu)
        $(formId).find('input[name="email_ortu"]').val(d.email_ortu)
        $(formId).find('select[name="active"]').val(d.active)
        removeLoading(boxId)
      }
    })
  }
  $(modalId).modal('show')
}

// execute
datatablesShow('#datatables-ss1')



