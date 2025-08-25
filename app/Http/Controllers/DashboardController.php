<?php

namespace App\Http\Controllers;

use App\Models\CatalogoSexo;
use App\Models\FichaRegistro;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class DashboardController extends Controller {
    public function stats(): JsonResponse {
        $start = Carbon::now()->locale('es')->startOfMonth()->subMonths(11);
        $end = Carbon::now()->locale('es')->endOfMonth();

        $total = FichaRegistro::count();
        $genders = CatalogoSexo::withCount('fichasDeRegistro')->get();

        $genderStatistics = $genders->map(function ($gender) {
            return [
                'idSexo' => $gender->id_sexo,
                'sexo' => $gender->descripcion,
                'total' => $gender->fichas_de_registro_count,
            ];
        })->values();

        $registers = FichaRegistro::query()
            ->whereBetween('fecha_secuestro', [$start, $end])
            ->selectRaw("DATE_FORMAT(fecha_secuestro, '%Y-%m') as ym, COUNT(*) as total")
            ->groupBy('ym')
            ->orderBy('ym')
            ->get()
            ->keyBy('ym');

        $cursor = $start->copy();

        for ($i = 0; $i < 12; $i++) {
            $date = ucfirst($cursor->monthName) . ' ' . $cursor->year;
            $formatedDate = $cursor->format('Y-m');
            $porMes[] = [
                'mes' => $date,
                'total' => ($registers[$formatedDate]->total ?? 0),
            ];
            $cursor->addMonth();
        }

        $withPicture = FichaRegistro::query()
            ->whereNotNull('fotografia')
            ->where('fotografia', '!=', 'default.jpg')
            ->where('fotografia', '!=', 'SIN DATO')
            ->count();

        $withoutPicture = max(0, $total - $withPicture);

        $today = Carbon::today();
        $todayQuery = FichaRegistro::query()->whereDate('created_at', $today);
        $todayTotal = $todayQuery->count();

        $gendersToday = CatalogoSexo::withCount(['fichasDeRegistro' => function ($query) use ($today) {
            $query->whereDate('created_at', $today);
        }])->get();

        $gendersToday = $gendersToday->map(function ($gender) {
            return [
                'idSexo' => $gender->id_sexo,
                'sexo' => $gender->descripcion,
                'total' => $gender->fichas_de_registro_count,
            ];
        })->values();

        $withPictureHoy = FichaRegistro::whereNotNull('fotografia')
            ->whereDate('created_at', $today)
            ->where('fotografia', '!=', 'default.jpg')
            ->where('fotografia', '!=', 'SIN DATO')
            ->count();

        $withoutPictureHoy = max(0, $todayTotal - $withPictureHoy);

        return response()->json([
            'data' => [
                'totalRegistros' => $total,
                'registrosPorSexo' => $genderStatistics,
                'registrosPorMesUltimos12' => $porMes,
                'conFotografia' => $withPicture,
                'sinFotografia' => $withoutPicture,
                'hoy' => [
                    'total' => $todayTotal,
                    'registrosPorSexo' => $gendersToday,
                    'conFotografia' => $withPictureHoy,
                    'sinFotografia' => $withoutPictureHoy,
                    'fecha' => $today->toDateString(),
                ],
            ]
        ]);
    }
}
