<?php

namespace App\Models\Educacion;

use App\Models\Perfil\Perfil;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Conocimiento extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'conocimiento';


    public function setFechaInicioAttribute($value)
    {
        $this->attributes['fecha_inicio'] = isset($value) ? Carbon::createFromFormat(config('app.date_format'), $value)->format('Y-m-d') : null;
    }

    public function setFechaFinAttribute($value)
    {
        $this->attributes['fecha_fin'] = isset($value) ? Carbon::createFromFormat(config('app.date_format'), $value)->format('Y-m-d') : null;
    }

    //Relaciones
    public function perfil(): BelongsTo
    {
        return $this->belongsTo(Perfil::class, 'id_perfil');
    }

    public function tipo(): BelongsTo
    {
        return $this->belongsTo(TituloAcademico::class, 'id_titulo_ac');
    }

    public function nivel(): BelongsTo
    {
        return $this->belongsTo(NivelAcademico::class, 'id_nivel_ac');
    }
}
