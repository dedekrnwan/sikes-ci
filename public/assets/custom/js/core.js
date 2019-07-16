$('.login').click(() => {
    $.ajax({
        url: 'http://localhost:8888/data_master/siswa/getSiswa',
        type: "POST",
        data: (res) => {
        }
    })
})