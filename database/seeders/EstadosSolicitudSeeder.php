<?php

namespace Database\Seeders;

use App\Models\EstadoSolicitud;
use App\Models\Solicitud;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosSolicitudSeeder extends Seeder
{
    public function run(): void
    {
        Solicitud::where('estado_solicitud_id', '=', 0)->update(['estado_solicitud_id' => 1]);
        DB::table('estado_solicitudes')->insert([
            'id' => 0, 'estado_solicitudes' => 'Capturado'
        ]);
        $modelEstatusSolicitud = new EstadoSolicitud();
        $modelEstatusSolicitud->id = 2;
        $modelEstatusSolicitud->estado_solicitudes = 'Finalizado';
        $modelEstatusSolicitud->save();
        $modelEstatusSolicitud = new EstadoSolicitud();
        $modelEstatusSolicitud->id = 0;
        $modelEstatusSolicitud->estado_solicitudes = 'EnviadoS';
        $modelEstatusSolicitud->save();
        
    }
}
