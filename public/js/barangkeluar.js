const buttonTambahProduk = document.getElementById('tambahproduk');

buttonTambahProduk.addEventListener('click', function(e){
    e.preventDefault();
    const produk = document.getElementById('produk');
    console.log();
    const id_produk = produk.value;
    const optionSelected = produk.options[produk.selectedIndex];
    const harga = optionSelected.dataset.harga;
    const stok = optionSelected.dataset.stok;
    const foto = optionSelected.dataset.foto;
    const nama_produk = optionSelected.text;

    const tbody = document.getElementById('tablemasuk');

    //Cek if product exist
    const cekProduk = document.getElementById(`produk-${id_produk}`);
    if(!cekProduk){
        let html = `<tr id="produk-${id_produk}">`;
        html += `<td class="text-center">
                   <input type="hidden" value="${id_produk}" name="produk[]">
                       <a href="" >
                           <img src="${CORE.baseUrl}/storage/${foto}" alt="Foto Produk" style="width: 200px;height:150px;">
                       </a>
                  </td>`;
       html += `<td class="text-center">${nama_produk}</td>`
       html += `<td class="text-center">${stok}</td>`
       
       html += `<td class="text-center">
                   <input type="number" class="form-control" min="1" max="${stok}" value="${stok}" name="qty[]">
               </td>`
        html += `<td class="text-center">
               <input type="number" class="form-control" min="1" value="${harga}" name="harga_jual[]">
           </td>`;
       html += ` <td class="text-center">
                   <button class="btn btn-sm btn-danger" onclick="hapusProduk(event)">Hapus</button>
               </td>`;
   
       tbody.insertAdjacentHTML('beforeEnd',html);
    }else{
        Swal.fire({
            icon : 'info',
            title : 'Produk sudah ada',
            showConfirmButton : false,
            timer : 900
        });
    }



})


const buttonSubmitForm = document.getElementById('submitform');
buttonSubmitForm.addEventListener('click', async function(e){
    e.preventDefault();
    const form = new FormData(document.getElementById('formbarangkeluar'));

    let request = await fetch(`${CORE.baseUrl}/dashboard/barangkeluar/store`, {
        method : 'post',
        headers : {
            'X-CSRF-TOKEN' : CORE.crsfToken,
            'Accept' : 'application/json'
        },
        body : form
    });

    const response = await request.json();
  

    if(request.status == 500){
        Swal.fire({
            icon : 'error',
            title : response.message,
            text : 'Silahkan coba beberapa saat lagi',
            showConfirmButton : false,
            timer : 900
        });

        return false;
    }

    if(request.status == 400){
        let errorString = `<ul>`
        for(const error in response.data){
            errorString += `<li>${response.data[error][0]}</li>`
        }
        errorString +=`</ul>`
        console.log(errorString);
        Swal.fire({
            icon : 'error',
            title : response.message,
            html : errorString,
            showConfirmButton : true,
        });

        return false;
    }

    if(request.status == 200){
        Swal.fire({
            icon : 'success',
            title : response.message,
            showConfirmButton : false,
            timer : 900
        }).then(res => {
            location.reload();
        });

    }

})


function hapusProduk(e){
e.preventDefault();
Swal.fire({
    icon : 'warning',
    title : 'Yakin ingin menghapus produk?',
    showConfirmButton : true,
    confirmButtonText : 'Ya Hapus',
    showCancelButton : true,
    cancelButtonText : 'Tidak'
}).then(res => {
    if(res.isConfirmed){
        e.target.parentElement.parentElement.remove();
    }
})
}