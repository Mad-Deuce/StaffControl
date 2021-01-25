@extends('layouts.main')

@section('title', 'Add Worker')

@section('mainFrame_content')
    <h4>Main Frame</h4>
    <form action="/worker-add">
        <input type="text" name="worker-name">Имя<Br>
        <input type="text" name="worker-surname">фамилия<Br>
        <input type="text" name="worker-patronymic">Отчество<Br>
        <input type="date" name="worker-birthday">Дата рождения<Br>
        <fieldset>
            <legend>Пол</legend>
            <input type="radio" name="worker-gender" value="ч">ч
            <input type="radio" name="worker-gender" value="ж">ж
        </fieldset><Br>
        <input type="number" name="worker-tab_number">Табельный номер<Br>
        <input type="date" name="worker-start_working">Дата принятия на работу<Br>
        <input type="submit" value="Добавить">Имя<Br>

        'worker-name' &&'worker-surname'&&'worker-patronymic'&&'worker-birthday'&&'worker-gender'&&'worker-tab_number'&&
'worker-start_working'

    </form>
@endsection
