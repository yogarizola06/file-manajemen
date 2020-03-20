$ (document).ready(function() {
	$(".tanggalmasakerja").change(function() {
			var url = $('.class-url').html();
			var tgl = $(this).val();
			
			//alert(tgl);

			$.getJSON(url+'/tanggalmasakerja.php',{'tanggalmasakerja':tgl},function(data){
				var hasil = data.hasil;
				//alert(hasil);
				$('.tanggalhasilkerja').val(hasil);
			});
	});

})