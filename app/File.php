<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Eloquent
 */

class File extends Model
{
    protected $table = 'files';
    protected $primaryKey = 'file_id';
    protected $fillable = [
      's_permohonan','s_rekomendasi','bts_wilayah',
      'jml_penduduk','pw_distrik','pw_kampung','ft_kantor'
    ];
}
