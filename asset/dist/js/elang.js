/**
 * Developper by By Elang (Mukhammad Yasin)
 * ------------------
 * You should not use this file in production.
 * This file is for demo purposes only.
 */

function opsi(value){
	 var st = $("#status").val();
	 if(st == "AKTIF" || st == "PENGAJUAN MUTASI"){

	  document.getElementById("ket_out").disabled = true;
	  document.getElementById("tgl_out").disabled = true;
	  document.getElementById("alasan_out").disabled = true;
	  document.getElementById("nosrt_out").disabled = true;
	 } else {
	  document.getElementById("ket_out").disabled = false;
	  document.getElementById("tgl_out").disabled = false;
	  document.getElementById("alasan_out").disabled = false;
	  document.getElementById("nosrt_out").disabled = false;

	  document.getElementById("ket_out").required = true;
	  document.getElementById("tgl_out").required = true;
	  document.getElementById("alasan_out").required = true;
	  document.getElementById("nosrt_out").required = true;

	 }
}
