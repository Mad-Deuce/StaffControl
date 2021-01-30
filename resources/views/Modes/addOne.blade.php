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
        <fieldset>
            <legend>Неявки</legend>
            <select name="position">
                @foreach($mode_codes as $mode_code)
                    <option value="{{$mode_code->id}}">{{$mode_code->short_title}}-{{$mode_code->full_title}}</option><B-r>
                @endforeach
            </select>
        </fieldset><Br>

        <input type="submit" value="Добавить" name="mode_add"><Br>
    </form>
@endsection
