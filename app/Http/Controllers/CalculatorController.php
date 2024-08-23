<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'material_brand' => 'required|string',
            'curtain_option' => 'nullable|string',
            'lamp_option' => 'nullable|integer',
        ]);

        // Логика расчета стоимости
        $cost = $this->calculateCost($validated);

        return response()->json(['total_cost' => $cost]);
    }

    private function calculateCost($data)
    {
        $width = $data['width'];
        $height = $data['height'];
    
        // Определяем цену за квадратный метр в зависимости от выбранного материала
        $materialPricePerSquareMeter = 0;
    
        switch ($data['material_brand']) {
            case 'херовый':
                $materialPricePerSquareMeter = 100; // Примерная цена за квадратный метр
                break;
            case 'хороший':
                $materialPricePerSquareMeter = 300; // Примерная цена за квадратный метр
                break;
            default:
                $materialPricePerSquareMeter = 0; // Если материал не выбран
                break;
        }
    
        // Рассчитываем стоимость
        $lampCost = !empty($data['lamp_option']) ? ($data['lamp_option'] * 50) : 0; // 50 рублей за каждую лампу
        $curtainCost = !empty($data['curtain_option']) ? 100 : 0; // Стоимость за наличие карниза (шторы)
    
        // Площадь в квадратных метрах
        $area = $width * $height;
    
        // Общая стоимость
        return ($area * $materialPricePerSquareMeter) + $lampCost + $curtainCost;
    }
}
