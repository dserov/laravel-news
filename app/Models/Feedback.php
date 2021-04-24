<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    /**
     * @param $feedback
     * @return array
     */
    public function add($feedback) {
        if (empty($feedback['name']) || empty($feedback['content'])) {
            return ['Пустые значения параметров'];
        }
        $feedbacks = $this->getAll();
        $feedbacks[] = $feedback;
        \Storage::put('feedbacks.json', json_encode($feedbacks));
        return [];
    }

    /**
     * @return mixed
     */
    public function getAll() {
        try {
            $content = \Storage::get('feedbacks.json');
            return json_decode($content, true);
        } catch (\Exception $exception) {
            return [];
        }
    }
}
