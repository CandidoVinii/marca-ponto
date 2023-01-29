<?php

namespace App\Http\Controllers;

use App\Models\Ponto;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Carbon\Carbon;

class PontoController extends Controller
{
    private function minutesToTime($minutes)
    {
        $hours = floor($minutes / 60);
        $minutes = ($minutes % 60);
        return str_pad($hours, 2, '0', STR_PAD_LEFT) . ":" . str_pad($minutes, 2, '0', STR_PAD_LEFT);
    }
    public function registryPoint(Request $request)
    {
        $payload = $request->all();

        //Verifica se o payload está vazio
        if (empty($payload)) {
            return response()->json(['error' => 'Campos inválidos'], 422);
        }
        ;

        // Verifica se a diferença entre o ponto de chegada e o ponto de saída é maior que 24 horas
        $arrival = strtotime($payload['chegada']);
        $departure = strtotime($payload['saida']);
        $dayStart = strtotime('05:00');
        $dayEnd = strtotime('22:00');
        $nightStart = strtotime('22:00');
        $nightEnd = strtotime('05:00');
        $dayMinutes = 0;
        $nightMinutes = 0;
        $difference = $departure - $arrival;
        if ($difference > 86400) {
            return response()->json(['error' => 'A diferença entre o ponto de chegada e o ponto de saída deve ser maior que 24 horas.'], 400);
        }

        for ($i = $arrival; $i < $departure; $i += 60) {
            $time = date('H:i', $i);
            $timeTimestamp = strtotime($time);
            if ($timeTimestamp >= $dayStart && $timeTimestamp < $dayEnd) {
                $dayMinutes++;
            } elseif ($timeTimestamp >= $nightStart || $timeTimestamp < $nightEnd) {
                $nightMinutes++;
            }
        }
        $dayMinutes = $this->minutesToTime($dayMinutes);
        $nightMinutes = $this->minutesToTime($nightMinutes);
        $dataObj = ([
            'name' => $payload['name'],
            'ponto_chegada' => $payload['chegada'],
            'ponto_saida' => $payload['saida'],
            'horas_diurnas' => $dayMinutes,
            'horas_noturnas' => $nightMinutes,
        ]);
        // Salva os dados no banco de dados
        Ponto::create($dataObj);
        // fazer o insert no banco de dados.

        return response()->json($dataObj, 201);
    }
    public function filterByDate(Request $request)
    {
        $dateStartUser = $request->query('start_date');
        $dateEndUser = $request->query('end_date');
        if(!$dateStartUser || !$dateEndUser) {
            return response()->json(['error' => 'Data inválida'], 422);
        }
        $startDate = Carbon::createFromFormat('Y-m-d', $dateStartUser)->startOfDay();
        $endDate = Carbon::createFromFormat('Y-m-d', $dateEndUser)->endOfDay();
        $points = Ponto::whereBetween('ponto_chegada', [$startDate, $endDate])
            ->orWhereBetween('ponto_saida', [$startDate, $endDate])
            ->get()
            ->groupBy('name');

        foreach ($points as $name => $nameUser) {
            $totalDayHours = 0;
            $totalNightHours = 0;

            foreach ($nameUser as $ponto) {
                $totalDayHours += intval($ponto->horas_diurnas);
                $totalNightHours += intval($ponto->horas_noturnas);
            }

            $result[] = [
                'usuario' => $name,
                'total_horas_diurnas' => $totalDayHours,
                'total_horas_noturnas' => $totalNightHours,
            ];
        }

        return response()->json($result);
    }
}