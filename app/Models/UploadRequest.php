<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadRequest extends Model
{
    use HasFactory;

    /**
     * @param $upload
     */
    public function add($upload) {
        $uploads = $this->getAll();
        $uploads[] = $upload;
        \Storage::put('upload_requests.json', json_encode($uploads));
    }

    /**
     * @return mixed
     */
    public function getAll() {
        try {
            $uploads = \Storage::get('upload_requests.json');
            return json_decode($uploads, true);
        } catch (\Exception $exception) {
            return [];
        }
    }
}
