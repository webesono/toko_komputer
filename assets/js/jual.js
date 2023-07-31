$(document).ready(function () {
	// var ip = $('#ip').val();
	$("#jualTable").DataTable({
		responsive: true,
		ajax: `penjualan/getJual`,
		columns: [
			{
				data: "no",
			},
			{
				data: "konsumen",
			},
			{
				data: "alamat",
			},
			{
				data: "tgl_jual",
			},
			{
				data: "action",
			},
		],
	});

	$("#lastTable").DataTable({
		responsive: true,
		// paging: false,
		// pageLength: [10],
		recordsTotal: 10,
		lengthChange: false,
		ajax: `dashboard/getDashboard`,
		columns: [
			{
				data: "no",
			},
			{
				data: "konsumen",
			},
			{
				data: "alamat",
			},
			{
				data: "tgl_jual",
			},
			{
				data: "total",
			},
		],
	});
});
