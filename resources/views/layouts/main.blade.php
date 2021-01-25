<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>StaffControl - @yield('title')</title>
</head>
<body>
    <div class="header">
        <H1>WORK TIME CONTROL SYSTEM</H1>
    </div>

    <a href="/">to main page</a>

    <div class="sidebar">
        <ul>
            <li><a href="/worker-list">Workers list</a></li>
            <li><a href="/schedule">Schedule</a></li>
            <li><a href="/time-sheet">Time sheet</a></li>
        </ul>
    </div>

    <div class="mainFrame">
        @yield('mainFrame_content')
    </div>

    <div class="footer">
        версия 1.0
    </div>
</body>
</html>
