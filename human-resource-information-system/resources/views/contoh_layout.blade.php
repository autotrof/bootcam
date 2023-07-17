<html>
    <head>
        <title>HALO LARAVEL</title>
        @stack('css')
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="{{url('contoh?page=1')}}">Page 1</a></li>
                    <li><a href="{{url('contoh?page=2')}}">Page 2</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <div>ini tetap</div>
            @yield('content')
        </main>
        @stack('js')
    </body>
</html>
