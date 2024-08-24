<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\AdditionalOption;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    /**
     * Показать форму калькулятора.
     *
     * @return \Illuminate\View\View
     */
    public function showCalculator()
    {
        // Получаем все материалы и дополнительные опции для отображения в форме
        $materials = Material::all();
        $additionalOptions = AdditionalOption::all();
    
        // Убедитесь, что переменные передаются в представление
        return view('calculator', [
            'materials' => $materials,
            'additionalOptions' => $additionalOptions,
        ]);
    }

    /**
     * Рассчитать стоимость на основе предоставленных данных.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function calculate(Request $request)
    {
        // Валидация входящих данных
        $validated = $request->validate([
            'length' => 'required|numeric',     // Длина (double)
            'width' => 'required|numeric',      // Ширина (double)
            'material_id' => 'required|exists:materials,id',
            'additional_options' => 'nullable|array',
            'additional_options.*' => 'exists:additional_options,id',
        ]);

        // Расчет общей стоимости
        $cost = $this->calculateCost($validated);

        // Форматируем стоимость с двумя десятичными знаками
        return response()->json(['total_cost' => number_format($cost, 2, '.', '')]);
    }

    /**
     * Вычислить стоимость на основе размера и материала.
     *
     * @param array $data
     * @return float
     */
    private function calculateCost($data)
    {
        // Получаем длину и ширину как double
        $length = (float) $data['length'];
        $width = (float) $data['width'];

        // Получаем материал и его цену в квадратных метрах
        $material = Material::find($data['material_id']);
        $materialPricePerSquareMeter = (int) $material->price_per_square_meter; // Приведение к integer

        // Подсчет дополнительных опций
        $additionalCost = 0;
        if (!empty($data['additional_options'])) {
            foreach ($data['additional_options'] as $optionId) {
                $optionModel = AdditionalOption::find($optionId);
                // Количество по умолчанию 1, возможно, нужно изменить в шаблоне
                $quantity = 1; // Замените на фактическое количество, если передаете от пользователя
                $additionalCost += (int) $optionModel->price * $quantity; // Приведение к integer
            }
        }

        // Общая стоимость
        $area = $length * $width; // Площадь
        return ($area * $materialPricePerSquareMeter) + $additionalCost;
    }
}