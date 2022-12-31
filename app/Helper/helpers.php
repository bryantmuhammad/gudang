<?php
if (!function_exists('create_response')) {
    function create_response()
    {
        $response = new stdClass;
        $response->status       = 'error';
        $response->status_code  = 500;
        $response->data         = [];
        $response->message      = 'Terjadi Kesalahan Server';

        return $response;
    }
}

if (!function_exists('pecah_nama')) {
    function pecah_nama($nama)
    {
        if (strlen($nama) > 15) {
            return substr($nama, 0, 15) . "...";
        } else {
            return $nama;
        }
    }
}



if (!function_exists('rupiah')) {
    function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
        return $hasil_rupiah;
    }
}


if (!function_exists('remove_underscore')) {
    function remove_underscore($string)
    {
        $string = str_replace('_', ' ', $string);
        return $string;
    }
}
