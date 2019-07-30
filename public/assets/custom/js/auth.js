(function () {

  // define
  const boxId = '#box-login'
  const formId = '#form-login'

  // collection
  const loginSubmit = () => {
    let data = $(formId).serialize()
    $.ajax({
      type: 'POST',
      url: `${base_url}/auth/loginSubmit`,
      data: data,
      beforeSend: () => { addLoading(boxId) },
      success: (res) => {
        removeLoading(boxId)
        if (res === 'true') {
          swal("Berhasil !", "Login berhasil !", "success").then((v) => {
            window.location.href = (data.type == 'admin') ? `${base_url}/dashboard` : `${base_url}/pembayaran/page`
          })
        } else {
          swal("Gagal !", "Login gagal, username atau password salah !", "error")
        }
      }
    })
  }

  // execute
  $("[btn-login]").click(() => { loginSubmit() })
  $(formId).keypress((e) => {
    var keycode = (e.keyCode ? e.keyCode : e.which)
    if (keycode == '13') {
      loginSubmit()
    }
  })

}())
