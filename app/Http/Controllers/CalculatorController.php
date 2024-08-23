<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function calculate(Request $request)
       {
           $validatedData = $request->validate([
               'width' => 'required|numeric',
               'height' => 'required|numeric',
               'material_brand' => 'required|string',
               'curtain_option' => 'nullable|string',
               'lamp_option' => 'nullable|string',
           ]);

           // Логика расчета
           $base_price_per_sq_m = 100; // базовая цена за квадратный метр
           $area = $validatedData['width'] * $validatedData['height'];
           $total_cost = $area * $base_price_per_sq_m;

           // Дополнительные условия для расчета стоимости 
           if ($validatedData['curtain_option']) {
               $total_cost += 20; // цена карниза
           }

           if ($validatedData['lamp_option']) {
               $total_cost += 15; // цена лампы
           }

           return response()->json(['total_cost' => $total_cost]);
       }
}
