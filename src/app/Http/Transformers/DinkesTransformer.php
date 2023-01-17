<?php

namespace App\Http\Transformers;

use stdClass;
use App\Helpers\UploadFile;
use Illuminate\Support\Str;
use App\Http\Transformers\ResponseTransformer;

class DinkesTransformer
{
    public function all($code, $message, $data)
    {
        $collection = [];
        foreach ($data as $value) {
            $collection[] = $this->item($value);

        }

        return (new ResponseTransformer)->toJson($code, $message, $data, $collection);
    }

    public function detail($code, $message, $data)
    {
        return (new ResponseTransformer)->toJson($code, $message, $this->item($data));
    }

    public function item($data)
    {

        $obj = new stdClass();
        $obj->_id = Str::uuid();
        $obj->nama_rumah_sakit = $data['nama_rumah_sakit'];
        $obj->jenis_rumah_sakit = $data['jenis_rumah_sakit'];
        $obj->alamat_rumah_sakit = $data['alamat_rumah_sakit'];
        $obj->kelurahan = $data['kelurahan'];
        $obj->kecamatan = $data['kecamatan'];
        $obj->kota_kab = $data['kota/kab_administrasi'];
        $obj->kode_pos = $data['kode_pos'];
        $obj->nomor_telepon = $data['nomor_telepon'];
        $obj->nomor_fax = $data['nomor_fax'];
        $obj->website = $data['website'];
        $obj->email = $data['email'];

        return $obj;
    }
}
