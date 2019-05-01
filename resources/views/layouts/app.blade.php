<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ route('news.index') }}">
                    Администрирование
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                          <a class="nav-link" href="/">Вернуться на сайт</a>
                        </li>
                        @guest

                        @else
                         @component('components.dropdown-menu-link',
                                [
                                    'id'=>'news',
                                    'title'=>'Новости',
                                    'sub'=>[
                                        route('news.index')=>'Список',
                                        route('news.create')=>'Добавить',
                                    ],
                                ]
                            )@endcomponent
                         @component('components.dropdown-menu-link',
                                [
                                    'id'=>'categories',
                                    'title'=>'Категории',
                                    'sub'=>[
                                        route('categories.index')=>'Список',
                                        route('categories.create')=>'Добавить',
                                    ],
                                ]
                            )@endcomponent
                        @endif
                    </ul>

                    @component('components.auth-menu')@endcomponent  
                </div>
            </div>
        </nav>

        <main class="py-4">
                       <!-- page content start -->
            @yield('content')
            <!-- end page content -->
        </main>
    </div>
    <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                if(document.getElementById('ckeditor1') !== null){
                     CKEDITOR.replace( 'ckeditor1' );
                }
    </script>
</body>
</html>
