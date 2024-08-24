@extends('layouts.app')

   @section('title', 'Калькулятор потолков')

   @section('content')

<div class="container mt-5">
 <h1>Калькулятор стоимости</h1>
 <form id="calculator-form">
 <div class="mb-3">
 <label for="length" class="form-label">Длина (м)</label>
 <input type="number" step="0.01" class="form-control" id="length" name="length" required>
 </div>
 <div class="mb-3">
 <label for="width" class="form-label">Ширина (м)</label>
 <input type="number" step="0.01" class="form-control" id="width" name="width" required>
 </div>
 <div class="mb-3">
 <label for="material_id" class="form-label">Материал</label>
 <select class="form-select" id="material_id" name="material_id" required>
 @foreach($materials as $material)
 <option value="{{ $material->id }}">{{ $material->name }} - {{ $material->price_per_square_meter }} за кв.м</option>
 @endforeach
 </select>
 </div>
 <div class="mb-3">
 <label for="additional_options" class="form-label">Дополнительные опции</label>
 <div id="additional-options-wrapper">
 @foreach($additionalOptions as $option)
 <div class="mb-3">
 <input type="checkbox" class="form-check-input" id="option_{{ $option->id }}" value="{{ $option->id }}" name="additional_options[]">
 <label class="form-check-label" for="option_{{ $option->id }}">{{ $option->name }} - {{ $option->price }}</label>
 <input type="number" class="form-control mt-1" data-option-id="{{ $option->id }}" min="1" value="1" placeholder="Количество">
 </div>
 @endforeach
 </div>
 </div>
 <button type="button" class="btn btn-primary" id="calculate-btn">Рассчитать</button>
 </form>

 <div id="result" class="mt-4" style="display: none;">
 <h3>Результаты расчета</h3>
 <p><strong>Общая площадь:</strong> <span id="area"></span> м²</p>
 <p><strong>Итоговая стоимость:</strong> <span id="total_cost"></span> ₽</p>
 </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
 $(document).ready(function() {
    $('#calculate-btn').click(function() {
        // Получаем данные формы
        const length = parseFloat($('#length').val());
        const width = parseFloat($('#width').val());
        const materialId = $('#material_id').val();
        const additionalOptions = $('#additional-options-wrapper input[type=checkbox]:checked');

        // Проверяем корректность введенных данных
        if (isNaN(length) || isNaN(width) || length <= 0 || width <= 0) {
            alert('Пожалуйста, введите корректные значения для длины и ширины.');
            return;
        }

        // Получение данных о материале
        const materialPricePerSquareMeter = parseFloat($('#material_id option:selected').text().split('-')[1]) || 0;

        // Подсчет площади
        const area = length * width;

        // Подсчет стоимости дополнительных опций
        let additionalCost = 0;
        additionalOptions.each(function() {
            const optionId = $(this).val();
            const optionPrice = parseFloat($('#additional-options-wrapper input[data-option-id="' + optionId + '"]:first').parent().find('label').text().split('-')[1]) || 0;
            const quantity = parseFloat($('#additional-options-wrapper input[data-option-id="' + optionId + '"]:first').val()) || 0;
            additionalCost += optionPrice * quantity;
        });

        // Общая стоимость
        const totalCost = (area * materialPricePerSquareMeter) + additionalCost;

        // Отображаем результаты
        $('#area').text(area.toFixed(2));
        $('#total_cost').text(totalCost.toFixed(2));
        $('#result').show();
    });
 });
</script>
   @endsection