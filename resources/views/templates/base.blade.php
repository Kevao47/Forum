<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forúm X-Games</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/forum.css') }}">

</head>

<body class="bg03">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-xl navbar-light bg-light">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
                        <h1 class="tm-site-title mb-0">X-Forum</h1>
                    </a>
                    <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item @active_page('home')">
                                <a class="nav-link" href="{{ route('home') }}">Pagina Inicial</a>
                            </li>
                            <li class="nav-item @active_page('perfil')">
                                <a class="nav-link" href="{{ route('perfil') }}">Perfil</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                @auth
                                    <a class="nav-link d-flex" href="{{ route('logout') }}">
                                        <i class="far fa-user mr-2 tm-logout-icon"></i>
                                        <span>Sair</span>
                                    </a>
                                @else
                                    <a class="nav-link d-flex" href="{{ route('login') }}">
                                        <i class="far fa-user mr-2 tm-logout-icon"></i>
                                        <span>Entrar</span>
                                    </a>
                                @endauth
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        @yield('content')
    </div>
    </div>


    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

    <script src="{{ asset('js/moment.min.js') }}"></script>

    <script src="{{ asset('js/utils.js') }}"></script>
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/base-scripts.js') }}"></script>
    <script>
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
        barChart, pieChart;

        $(function() {
            updateChartOptions();
            drawLineChart();
            drawBarChart();
            drawPieChart();
            drawCalendar();

            $(window).resize(function() {
                updateChartOptions();
                updateLineChart();
                updateBarChart();
                reloadPage();
            });
        })
    </script>
</body>

</html>
