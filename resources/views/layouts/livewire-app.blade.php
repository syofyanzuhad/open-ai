<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Laravel Application</title>
        @livewireStyles
    </head>
    <body>
        <div id="app">
            @yield('content')
        </div>
        @livewireScripts
    </body>
</html>