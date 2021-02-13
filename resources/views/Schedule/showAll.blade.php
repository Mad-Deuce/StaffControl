@extends('layouts.main')

@section('title', 'Schedule')

@section('mainFrame_content')
    <h4>Main Frame</h4>

     <table border="1" width="100%">
        <tr>
            <th>№ з/п</th>
            <th>Прізвище,<BR>ініціали</th>
            <th>Посада</th>
            @for ($i = 1; $i <= 31; $i++)
                <th width="30">{{ $i }}</th>
            @endfor
            <th>Години</th>
            <th>Підпис</th>
        </tr>

         @foreach($schedulesArray as $schedulesArrayItem)
             <tr>
                 <td align="center">{{$loop->iteration}}</td>


                 <td>{{$schedulesArrayItem['name']}}</td>
                 <td align="center">{{$schedulesArrayItem['position']}}</td>



                 @foreach ($schedulesArrayItem['modes'] as $mode)
                     <td width="30" align="center">
                        {{$mode}}
                     </td>
                 @endforeach

                 <td>{{$schedulesArrayItem['sum']}}</td>
                 <td></td>
                 <td><a href="/mode-add/{{$schedulesArrayItem['id']}}">Добавить неявку</a></td>
             </tr>
         @endforeach
    </table><BR>

    <a href="/schedule/delete">Очистить</a><BR>
    <a href="/schedule/add_from_system_calendar">Вставить выходные дни</a><BR>
    <a href="/schedule/add_from_modes">Вставить неявки</a><BR>
    <a href="/schedule/export_to_excel">Экспорт в EXCEL</a><BR>
@endsection
