<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cron2 extends Model
{
    protected $table = 'settings2'; // Eğer tablo adı farklı ise burayı güncelleyin
    public $timestamps = false; // Eğer modelin created_at ve updated_at sütunları yoksa bu satırı kullanabilirsiniz
}
