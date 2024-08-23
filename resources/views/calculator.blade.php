@extends('layouts.app')

   @section('title', 'Калькулятор потолков')

   @section('content')
   <h2 class="text-center">Рассчитайте стоимость потолка</h2>
    <form id="calculator-form">
        <div class="form-group">
            <label for="width">Ширина (в метрах)</label>
            <input type="number" class="form-control" id="width" required>
        </div>
        <div class="form-group">
            <label for="height">Высота (в метрах)</label>
            <input type="number" class="form-control" id="height" required>
        </div>
        <div class="form-group">
            <label for="material_brand">Марка материала</label>
            <select class="form-control" id="material_brand" required>
                <option value="">Выберите марку</option>
                <option value="херовый">Херовый (-100р)</option>
                <option value="хороший">Хороший (-300р)</option>
            </select>
        </div>
        <div class="form-group">
            <label for="curtain_option">Дополнительные опции (карниз)</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="curtain_option" value="да">
                <label class="form-check-label" for="curtain_option">
                    Есть
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="lamp_option">Количество ламп (по 50р за штуку)</label>
            <input type="number" class="form-control" id="lamp_option" min="0" value="0">
        </div>
        <button type="submit" class="btn btn-primary">Рассчитать</button>
    </form>
    <div class="mt-4" id="result"></div>

    <script>
        document.getElementById('calculator-form').onsubmit = function(event) {
            event.preventDefault();

            const width = document.getElementById('width').value;
            const height = document.getElementById('height').value;
            const material_brand = document.getElementById('material_brand').value;
            const curtain_option = document.getElementById('curtain_option').checked ? 'да' : null; // Учитываем чекбокс
            const lamp_option = document.getElementById('lamp_option').value;

            fetch('http://0.0.0.0:8080/api/calculate', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    width: width,
                    height: height,
                    material_brand: material_brand,
                    curtain_option: curtain_option,
                    lamp_option: lamp_option
                })
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('result').innerHTML = `<div class="alert alert-success">Общая стоимость: ${data.total_cost} руб.</div>`;
            })
            .catch(error => {
                document.getElementById('result').innerHTML = `<div class="alert alert-danger">Ошибка: ${error}</div>`;
            });
        };
    </script>
   @endsection