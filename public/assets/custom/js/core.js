// collection
const underConstruct = () => {
	swal("Under constructon !")
}

$.ajaxSetup({ error: () => swal("Some error technical, please contact developer !") })

const addLoading = (elm) => {
	const loader = `<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>`
	const box = $(elm)
	box.append(loader)
}

const removeLoading = (elm) => {
	const ovrl = $(`${elm} .overlay`)
	ovrl.remove()
}

// datatables
let url, totalCol, tbl
const datatablesShow = (datatablesId) => {
	totalCol = parseInt($(datatablesId).find('tr:nth-child(1) th').length)
	tbl = $(datatablesId).DataTable({
		"PaginationType": "bootstrap",
		"responsive": true,
		"processing": true,
		"searching": true,
		"serverSide": true,
		"deferRender": true,
		"order": [],
		"ajax": {
			"url": url,
			"type": "POST",
			"data": (param) => {
				param.query = jsonFilter
			}
		},
		"columnDefs": [
			{
				"targets": [0, -1],
				"orderable": false
			}
		]
	})
}

// filter
let queryFilter = {}
let jsonFilter = {}
$('[param-filter]').change((e) => {
	let name = $(e.target).attr('name')
	let value = $(e.target).val()
	queryFilter[name] = { "name": name, "value": value }
	if (value == 0) delete queryFilter[name]
	console.log(queryFilter)
})

$('[btn-filter]').click(() => {
	jsonFilter = JSON.stringify(queryFilter)
	tbl.ajax.reload(null, false)
	console.log(jsonFilter)
})


const deleteRow = (key, val, table) => {
	swal({
		title: "Yakin akan menghapus data ?",
		text: "Data terkait akan ikut terhapus secara permanen !",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	}).then(v => {
		if (v) {
			$.ajax({
				type: 'POST',
				url: `${base_url}default/delete`,
				data: { key, val, table },
				success: (res) => {
					if (res === 'true') {
						swal("Berhasil !", "Data berhasil dihapus !", "success").then(v => {
							tbl.ajax.reload(null, false)
						})
					} else {
						swal("Gagal !", "Data gagal dihapus, harap cek kembali data terkait !", "error")
					}
				}
			})
		}
	})
}

// datepicker
$('.datepicker').datepicker()