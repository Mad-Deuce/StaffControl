@extends('layouts.main')

@section('title', 'Add Worker')

@section('mainFrame_content')
    <h4>Main Frame</h4>
    <form action="/worker-add">
        <input type="text" name="name">Имя<Br>
        <input type="text" name="surname">фамилия<Br>
        <input type="text" name="patronymic">Отчество<Br>
        <input type="date" name="birthday">Дата рождения<Br>
        <fieldset>
            <legend>Пол</legend>
            <input type="radio" name="gender" value="ч">ч
            <input type="radio" name="gender" value="ж">ж
        </fieldset><Br>
        <input type="number" name="tab_number">Табельный номер<Br>
        <input type="date" name="start_working">Дата принятия на работу<Br>
        <select name="position">
        @foreach($positions as $position)
            <option value="{{$position->full_title}}">{{$position->short_title}}-{{$position->full_title}}</option><B-r>
        @endforeach
        </select>
        <input type="submit" value="Добавить" name="worker_add"><Br>
    </form>
@endsection
