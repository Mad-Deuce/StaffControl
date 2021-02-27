@extends('layouts.main')

@section('title', 'Табель')

@section('mainFrame_content')
    <h4>Main Frame</h4>

     <table border="1" cellspacing="0" width="100%" style="font-size: 8pt">
        <tr>
            <th rowspan="5">№ з/п</th>
            <th rowspan="5">Табельний номер</th>
            <th rowspan="5">Стать</th>
            <th rowspan="5">Прізвище, ім'я, по батькові</th>
            <th rowspan="5">Посада</th>
            <th rowspan="3" colspan="16">Відмітки  про явки та неявки за числами місяця (годин)</th>
            <th colspan="9">Відпрацьовано за місяць</th>
            <th rowspan="3">Всього неявок</th>
            <th colspan="9">з причин за місяць</th>
        </tr>
        <tr>
            <th rowspan="4">днів</th>
            <th colspan="8">годин</th>
            <th rowspan="2">основна та додаткова відпустки</th>
            <th rowspan="2">відпустки у зв’язку з навчанням, творчі  та інші</th>
            <th rowspan="2">відпустки без збереження заробітної плати</th>
            <th rowspan="2">переведення на неповний робочий день (тиждень)</th>
            <th rowspan="2">простої</th>
            <th rowspan="2">прогули</th>
            <th rowspan="2">страйки</th>
            <th rowspan="2">тимчасова непрацездатність</th>
            <th rowspan="2">інші</th>
        </tr>
        <tr>
            <th rowspan="3">усього</th>
            <th colspan="7">з них</th>
        </tr>
        <tr>
            @for ($i = 1; $i <= 15; $i++)
                <th>{{ $i }}</th>
            @endfor
                <th>x</th>
                <th rowspan="2">в АТО</th>
                <th rowspan="2">надурочно</th>
                <th rowspan="2">нічних</th>
                <th rowspan="2">вечірніх</th>
                <th rowspan="2">вихідних, святкових</th>
                <th rowspan="2">дистанційно</th>
                <th rowspan="2">відрядження</th>
                <th>год.</th>
                <th>коди 8-10</th>
                <th>коди 11-15, 17, 22</th>
                <th>коди 18-19</th>
                <th>код 20</th>
                <th>код 23</th>
                <th>код 24</th>
                <th>код 25</th>
                <th>коди 26-27</th>
                <th>коди 28-30</th>
        </tr>
        <tr>
            @for ($i = 16; $i <= 31; $i++)
                <th>{{ $i }}</th>
            @endfor
                <th>днів</th>
                <th>год/дні</th>
                <th>год/дні</th>
                <th>год/дні</th>
                <th>год/дні</th>
                <th>год/дні</th>
                <th>год/дні</th>
                <th>год/дні</th>
                <th>год/дні</th>
                <th>год/дні</th>
        </tr>



    </table><BR>

    <a href="/time-sheet/export_to_excel">Экспорт в EXCEL</a><BR>
@endsection
