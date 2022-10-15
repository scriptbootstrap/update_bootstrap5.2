//  Format Rupiah Jumlah Penawaran 
var rupiah1 = document.getElementById('jmlh_penawaran');
rupiah1.addEventListener('keyup', function (e) {
  // tambahkan 'Rp.' pada saat form di ketik
  // gunakan fungsi formatRupiah1() untuk mengubah angka yang di ketik menjadi format angka
  rupiah1.value = formatRupiah1(this.value, 'Rp. ');
});

/* Fungsi formatRupiah1 */
function formatRupiah1(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split = number_string.split(','),
    sisa = split[0].length % 3,
    rupiah1 = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? '.' : '';
    rupiah1 += separator + ribuan.join('.');
  }

  rupiah1 = split[1] != undefined ? rupiah1 + ',' + split[1] : rupiah1;
  return prefix == undefined ? rupiah1 : (rupiah1 ? 'Rp. ' + rupiah1 : '');
}


// Format Rupiah Jumlah Negosiasi
var rupiah2 = document.getElementById('jmlh_negosiasi');
rupiah2.addEventListener('keyup', function (e) {
  // tambahkan 'Rp.' pada saat form di ketik
  // gunakan fungsi formatRupiah2() untuk mengubah angka yang di ketik menjadi format angka
  rupiah2.value = formatRupiah2(this.value, 'Rp. ');
});

/* Fungsi formatRupiah2 */
function formatRupiah2(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split = number_string.split(','),
    sisa = split[0].length % 3,
    rupiah2 = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? '.' : '';
    rupiah2 += separator + ribuan.join('.');
  }

  rupiah2 = split[1] != undefined ? rupiah2 + ',' + split[1] : rupiah2;
  return prefix == undefined ? rupiah2 : (rupiah2 ? 'Rp. ' + rupiah2 : '');
}