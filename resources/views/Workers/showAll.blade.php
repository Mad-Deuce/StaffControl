@extends('layouts.main')

@section('title', 'Workers list')

@section('sidebar_content')
    <ul>
        <li><a href="/worker-list">Workers list</a></li>
        <li><a href="/schedule">Schedule</a></li>
        <li><a href="/time-sheet">Time sheet</a></li>
    </ul>
@endsection

@section('mainFrame_content')
    <h4>Main Frame</h4>
    <table>
        <tr>
            <th>Табельный номер</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Отчество</th>
            <th>Пол</th>
            <th>Дата рождения</th>
            <th>Дата начала работы</th>
        </tr>
        @foreach($workers as $worker)
        <tr>
            <td>{{$worker->tab_number}}</td>
            <td>{{$worker->name}}</td>
            <td>{{$worker->surname}}</td>
            <td>{{$worker->patronymic}}</td>
            <td>{{$worker->gender}}</td>
            <td>{{$worker->birthday}}</td>
            <td>{{$worker->start_working}}</td>
        </tr>
        @endforeach
    </table>

@endsection
