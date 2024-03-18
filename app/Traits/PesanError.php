<?php

namespace App\Traits;


trait PesanError
{


    public function isipesan_uploadfile()
    {
        $pesan = [

            'file.required' => 'Anda Belum Memilih File',
            'file.mimes' => 'File Harus bertipe Pdf,Zip,Word Atau rar',
        ];
        return $pesan;
    }
}
