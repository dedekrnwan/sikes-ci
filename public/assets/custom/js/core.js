// ajax setup
$.ajaxSetup({
	error: () => { alert('some error technical') }
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