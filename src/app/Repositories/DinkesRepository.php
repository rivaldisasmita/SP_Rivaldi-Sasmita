<?php

namespace App\Repositories;

use stdClass;
use Exception;
use Illuminate\Support\Facades\Http;

class DinkesRepository
{

    public function index($request)
    {
        try {
            $api1 = Http::get('https://data.jakarta.go.id/read-resource/get-json/rsdkijakarta-2017-10/8e179e38-c1a4-4273-872e-361d90b68434');

            $jsonDataApi1 = $api1->json();

            return $jsonDataApi1;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function show($request)
    {
        try {
            $api1 = Http::get('https://data.jakarta.go.id/read-resource/get-json/rsdkijakarta-2017-10/8e179e38-c1a4-4273-872e-361d90b68434');

            $jsonDataApi1 = $api1->json();
            $obj = null;
            foreach ($jsonDataApi1 as $data) {
                if ($data['nama_rumah_sakit'] === $request->nama) {
                    $obj['nama_rumah_sakit'] = $data['nama_rumah_sakit'];
                    $obj['jenis_rumah_sakit'] = $data['jenis_rumah_sakit'];
                    $obj['alamat_rumah_sakit'] = $data['alamat_rumah_sakit'];
                    $obj['kelurahan'] = $data['kelurahan'];
                    $obj['kecamatan'] = $data['kecamatan'];
                    $obj['kota/kab_administrasi'] = $data['kota/kab_administrasi'];
                    $obj['kode_pos'] = $data['kode_pos'];
                    $obj['nomor_telepon'] = $data['nomor_telepon'];
                    $obj['nomor_fax'] = $data['nomor_fax'];
                    $obj['website'] = $data['website'];
                    $obj['email'] = $data['email'];
                    return $obj;
                } else {
                    return $jsonDataApi1;
                }
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
}
