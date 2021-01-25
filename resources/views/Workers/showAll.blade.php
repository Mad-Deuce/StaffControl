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
     <table width="100%">
        <tr>
            <th>Табельный номер</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Отчество</th>
            <th>Пол</th>
            <th>Дата рождения</th>
            <th>Дата начала работы</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <form action="/worker-add">
                <td><input type="text" name="text"></td>
                <td><input type="text" name="text2"></td>
                <td><input type="text" name="tex3"></td>
                <td><input type="text" name="text4"></td>
                <td><input type="text" name="text5"></td>
                <td><input type="text" name="text6"></td>
                <td><input type="text" name="text7"></td>
                <td><input type="text" name="text8"></td>
                <td><input type="submit"></td>
            </form>
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
            <td><a href="/worker-delete/{{$worker->id}}">DELETE</a></td>
            <td><a href="/worker-edit/{{$worker->id}}">EDIT</a></td>
        </tr>
        @endforeach
    </table>
    <td><a href="/worker-add">ADD</a></td>
    <td><a href="/worker-import">IMPORT FROM *.xls</a></td>
@endsection
