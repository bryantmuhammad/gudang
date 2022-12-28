/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";



const deleteButton = document.querySelectorAll('.delete-button');

deleteButton.forEach(button => {
    button.addEventListener('click', function(e){
        e.preventDefault();
       console.log();
        Swal.fire({
            icon : 'info',
            title : 'Yakin ingin menghapus data?',
            showConfirmButton : true,
            showCancelButton : true,
            confirmButtonText : 'Ya, Hapus',
            cancelButtonText : 'Tidak',
            cancelButtonColor : '#d11919',
            confirmButtonColor : '#099ae8'
 
        }).then(res => {
            if(res.isConfirmed){
                if(e.target.tagName == 'BUTTON'){
                    e.target.parentElement.submit();
                }else{
                    e.target.parentElement.parentElement.submit();
                }
            }
        })
    })
})