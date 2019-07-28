const underConstruct = () => {
	swal("Under constructon !");
}

// ajax setup
$.ajaxSetup({
	error: () => { 	swal("Some error technical, please contact developer !") }
})

// loading
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
	if(value == 0) delete queryFilter[name]
	console.log(queryFilter)
})

$('[btn-filter]').click(() => {
	jsonFilter = JSON.stringify(queryFilter)
	tbl.ajax.reload(null, false)
	console.log(jsonFilter)
})