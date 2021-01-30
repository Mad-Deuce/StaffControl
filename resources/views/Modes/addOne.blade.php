@extends('layouts.main')

@section('title', 'Add Mode')

@section('mainFrame_content')
    <h4>Main Frame</h4>
    <h5>{{$worker->surname}} {{$worker->name}} {{$worker->patronymic}}</h5>
    <form action="/mode-add/{{$worker->id}}">
        <fieldset>
            <legend>Период</legend>
                с-<input type="date" name="start_mode"><Br>
                по-<input type="date" name="end_mode"><Br>
        </fieldset><Br>
        <fieldset>
            <legend>Отработано</legend>
            <select name="mode_code_app">
                @foreach($mode_codes_app as $mode_code)
                    <option value="{{$mode_code->id}}">{{$mode_code->short_title}} - {{$mode_code->full_title}}</option><B-r>
                @endforeach
            </select>
        </fieldset><Br>
        <fieldset>
            <legend>Неявки</legend>
            <select name="mode_code_non_app">
                @foreach($mode_codes_non_app as $mode_code)
                    <option value="{{$mode_code->id}}">{{$mode_code->short_title}} - {{$mode_code->full_title}}</option><B-r>
                @endforeach
            </select>
        </fieldset><Br>

        <input type="submit" value="Добавить" name="mode_add"><Br>
    </form>
@endsection
