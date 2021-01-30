@extends('layouts.main')

@section('title', 'Add Mode')

@section('mainFrame_content')
    <h4>Main Frame</h4>
    <h5>{{$worker->surname}} {{$worker->name}} {{$worker->patronymic}}</h5>
    <form action="/mode-add">
        <fieldset>
            <legend>Период</legend>
                с-<input type="date" name="start_mode"><Br>
                по-<input type="date" name="surname"><Br>
        </fieldset><Br>
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
        </select>
        <input type="submit" value="Добавить" name="worker_add"><Br>
    </form>
@endsection
