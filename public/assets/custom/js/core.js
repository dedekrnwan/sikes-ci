$.ajaxSetup({
	error: () => { alert('some error technical') }
})

const addLoading = (elm) => {
	const loader = `<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>`
	const box = $(elm)
	box.append(loader)
}

const removeLoading = (elm) => {
	const ovrl = $(`${elm} .overlay`)
	ovrl.remove()
}