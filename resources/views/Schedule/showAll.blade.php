@extends('layouts.main')

@section('title', 'Schedule')

@section('mainFrame_content')
    <h4>Main Frame</h4>
     <table border="1">
        <tr>
            <th>№ з/п</th>
            <th>Прізвище,<BR>ініціали</th>
            <th>Посада</th>
            @for ($i = 1; $i < 32; $i++)
                <th>{{ $i }}</th>
            @endfor
            <th>Години</th>
            <th>Підпис</th>
        </tr>

         @foreach($workers as $worker)
             <tr>
                 <td>{{$loop->iteration}}</td>
                 <td>
                     {{$worker->surname}}
                     {{($worker->initials)}}
                 </td>
                 <td>{{$worker->position}}</td>

                 @for ($i = 1; $i < 32; $i++)
                     <td>8</td>
                 @endfor
                 <td></td>
                 <td></td>
                 <td><a href="/mode-add/{{$worker->id}}">Добавить неявку</a></td>
             </tr>
         @endforeach
    </table><BR>

    <a href="/schedule/add_from_system_calendar">Вставить выходные дни</a><BR>
    <a href="/schedule/add_from_modes">Вставить неявки</a><BR>
@endsection
