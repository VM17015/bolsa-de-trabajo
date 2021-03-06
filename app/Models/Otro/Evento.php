<?php

namespace App\Models\Otro;

use App\Models\Perfil\Perfil;
use App\Models\Ubicacion\Pais;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evento extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $table = 'evento';


    public function setFechaEventoAttribute($value)
    {
        $this->attributes['fecha_evento'] = isset($value) ? Carbon::createFromFormat(config('app.date_format'), $value)->format('Y-m-d') : null;
    }

    //Relaciones
    public function perfil(): BelongsTo
    {
        return $this->belongsTo(Perfil::class, 'id_perfil');
    }

    public function pais(): BelongsTo
    {
        return $this->belongsTo(Pais::class, 'id_pais');
    }
}
