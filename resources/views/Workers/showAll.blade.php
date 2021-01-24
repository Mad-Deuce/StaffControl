@extends('layouts.main')

@section('title', 'Main Page')

@section('sidebar_content')
    <ul>
        <li><a href="/worker-list">Workers list</a></li>
        <li><a href="/schedule">Schedule</a></li>
        <li><a href="/time-sheet">Time sheet</a></li>
    </ul>
@endsection

@section('mainFrame_content')
    <h4>Main Frame</h4>
    @foreach($workers as $worker)
        {{$worker->tab_number}}
        {{$worker->name}}
    @endforeach
@endsection
