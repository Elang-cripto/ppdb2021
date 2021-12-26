const { Swal } = require("./sweetalert2.all");

const flashData = $(".flash-data").data("flashdata");

if (flashData) {
	Swal.fire(flashData);
}
