(function () {
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
          })
        } else {
          swal("Gagal !", "Data gagal disave !", "error")
        }
      }
    })
  }

  // execute
  datatablesShow('#datatables-ss1')

  $('[btn-save]').click(() => {
    siswaSave()
  })

  $('[btn-modal]').click(() => {
    $(modalId).modal('show')
  })
}())
