@extends('layouts.main')

@section('title', 'Табель')

@section('mainFrame_content')
    <h4>Main Frame</h4>

     <table border="1" cellspacing="0" width="100%" style="font-size: 8pt">
        <tr>
            <th rowspan="5">№ з/п</th>
            <th rowspan="5">Табель- ний<BR>номер</th>
            <th rowspan="5">Стать</th>
            <th rowspan="5">Прізвище,<BR>ім'я,<BR>по-батькові</th>
            <th rowspan="5">Посада</th>
            <th rowspan="3" colspan="16">Відмітки  про явки та неявки за числами місяця (годин)</th>
            <th colspan="9">Відпрацьовано за місяць</th>
            <th rowspan="3">Всього неявок</th>
            <th colspan="9">з причин за місяць</th>
        </tr>
        <tr>
            <th rowspan="4">днів</th>
            <th colspan="8">годин</th>
            <th rowspan="2">основна та<BR>додаткова<BR>відпустки</th>
            <th rowspan="2">відпустки<BR>у зв’язку<BR>з навчанням,<BR>творчі<BR>та інші</th>
            <th rowspan="2">відпустки<BR>без збереження<BR>заробітної<BR>плати</th>
            <th rowspan="2">переведення<BR>на неповний<BR>робочий<BR>день<BR>(тиждень)</th>
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


         @foreach($schedulesArray as $schedulesArrayItem)
             <tr>
                 <td align="center" rowspan="8">{{$loop->iteration}}</td>
                 <td align="center" rowspan="8">{{$schedulesArrayItem['tab_number']}}</td>
                 <td align="center" rowspan="8">{{$schedulesArrayItem['gender']}}</td>
                 <td align="center" rowspan="8">{{$schedulesArrayItem['name']}}</td>
                 <td align="center" rowspan="8">{{$schedulesArrayItem['position']}}</td>

                 @for($i=1; $i<=15; $i++)
                     <td align="center">{{$schedulesArrayItem['modes'][$i]['m_hour']}}</td>
                 @endfor
                 <td align="center">x</td>

                 <td align="center" rowspan="8">{{$schedulesArrayItem['sum_w_day']}}</td>
                 <td align="center" rowspan="8">{{$schedulesArrayItem['sum_w_hour']}}</td>
                 <td align="center" rowspan="8">{{$schedulesArrayItem['sum_w_ato_hour']}}</td>
                 <td align="center" rowspan="8"></td>
                 <td align="center" rowspan="8"></td>
                 <td align="center" rowspan="8"></td>
                 <td align="center" rowspan="8"></td>
                 <td align="center" rowspan="8"></td>
                 <td align="center" rowspan="8"></td>


                 <td align="center" rowspan="4">{{$schedulesArrayItem['sum_r_hour']}}</td>
                 <td align="center" rowspan="4">{{$schedulesArrayItem['sum_r_hour1']}}</td>
                 <td align="center" rowspan="4">{{$schedulesArrayItem['sum_r_hour2']}}</td>
                 <td align="center" rowspan="4">{{$schedulesArrayItem['sum_r_hour3']}}</td>
                 <td align="center" rowspan="4">{{$schedulesArrayItem['sum_r_hour4']}}</td>
                 <td align="center" rowspan="4">{{$schedulesArrayItem['sum_r_hour5']}}</td>
                 <td align="center" rowspan="4">{{$schedulesArrayItem['sum_r_hour6']}}</td>
                 <td align="center" rowspan="4">{{$schedulesArrayItem['sum_r_hour7']}}</td>
                 <td align="center" rowspan="4">{{$schedulesArrayItem['sum_r_hour8']}}</td>
                 <td align="center" rowspan="4">{{$schedulesArrayItem['sum_r_hour9']}}</td>
             </tr>

             <tr>
                 @for($i=1; $i<=15; $i++)
                     <td align="center">{{$schedulesArrayItem['modes'][$i]['m_code']}}</td>
                 @endfor
                 <td align="center">x</td>
             </tr>

             <tr>
                 @for($i=1; $i<=15; $i++)
                     <td align="center">{{$schedulesArrayItem['modes'][$i]['m_ato_hour']}}</td>
                 @endfor
                 <td align="center">x</td>
             </tr>

             <tr>
                 @for($i=1; $i<=15; $i++)
                     <td align="center">{{$schedulesArrayItem['modes'][$i]['m_ato_code']}}</td>
                 @endfor
                 <td align="center">x</td>
             </tr>

             <tr>
                 @for($i=16; $i<=31; $i++)
                     <td align="center">{{$schedulesArrayItem['modes'][$i]['m_hour']}}</td>
                 @endfor
                     <td align="center" rowspan="4">{{$schedulesArrayItem['sum_r_day']}}</td>
                     <td align="center" rowspan="4">{{$schedulesArrayItem['sum_r_day1']}}</td>
                     <td align="center" rowspan="4">{{$schedulesArrayItem['sum_r_day2']}}</td>
                     <td align="center" rowspan="4">{{$schedulesArrayItem['sum_r_day3']}}</td>
                     <td align="center" rowspan="4">{{$schedulesArrayItem['sum_r_day4']}}</td>
                     <td align="center" rowspan="4">{{$schedulesArrayItem['sum_r_day5']}}</td>
                     <td align="center" rowspan="4">{{$schedulesArrayItem['sum_r_day6']}}</td>
                     <td align="center" rowspan="4">{{$schedulesArrayItem['sum_r_day7']}}</td>
                     <td align="center" rowspan="4">{{$schedulesArrayItem['sum_r_day8']}}</td>
                     <td align="center" rowspan="4">{{$schedulesArrayItem['sum_r_day9']}}</td>

             </tr>
             <tr>
                 @for($i=16; $i<=31; $i++)
                     <td align="center">{{$schedulesArrayItem['modes'][$i]['m_code']}}</td>
                 @endfor
             </tr>
             <tr>
                 @for($i=16; $i<=31; $i++)
                     <td align="center">{{$schedulesArrayItem['modes'][$i]['m_ato_hour']}}</td>
                 @endfor
             </tr>
             <tr>
                 @for($i=16; $i<=31; $i++)
                     <td align="center">{{$schedulesArrayItem['modes'][$i]['m_ato_code']}}</td>
                 @endfor
             </tr>


         @endforeach


    </table><BR>

    <a href="/time-sheet/export_to_excel">Экспорт в EXCEL</a><BR>
@endsection
