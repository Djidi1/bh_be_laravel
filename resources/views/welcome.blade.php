<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Just to do!</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,500&amp;subset=cyrillic" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>


    <style>
        html, body {
            background: linear-gradient(to bottom, #ff9100 0%, #3c0094 100%) fixed;
            color: white;
            font-family: 'Roboto', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0 10px;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .jumbotron {
            background: transparent;
        }

        .iphone_mask {
            height: 85vh;
            overflow: hidden;
            max-width: 25rem;
            margin: 0 auto;
        }

        p.lead {
            font-weight: 100;
        }

        .content {
            height: calc(100vh - 112px);
            padding-top: 30px;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #ffffff;
            color: rgba(0, 0, 0, .9);
            padding: .5rem 1rem;
            font-size: 0.8rem;
            z-index: 1;
        }

        a.carousel-control-prev {
            left: 30px;
            bottom: -30px;
        }

        a.carousel-control-next {
            right: 30px;
            bottom: -30px;
        }

        hr {
            border-color: #ffffff;
        }
        @media (min-width: 576px) {
            .content {
                /*font-size: 80%;*/
            }
        }
    </style>
</head>
<body>
<nav class="navbar fixed-top navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="#">Just to do!</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav mr-auto">
            <a class="nav-item nav-link active" href="/{{app()->getLocale()}}/">{{__('main.main')}} <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="/privacy/{{app()->getLocale()}}/">{{__('main.privacy')}}</a>
        </div>
        <div class="form-inline">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-sm btn-outline-secondary {{app()->getLocale() === 'ru' ? 'active' : ''}}">
                    <input type="radio" name="language" id="lng_ru" autocomplete="off"
                           {{app()->getLocale() === 'ru' ? 'checked' : ''}}
                           onchange="change_lang()" value="ru">RU</input>
                </label>
                <label class="btn btn-sm btn-outline-secondary {{app()->getLocale() === 'en' ? 'active' : ''}}">
                    <input type="radio" name="language" id="lng_en" autocomplete="off"
                           {{app()->getLocale() === 'en' ? 'checked' : ''}}
                           onchange="change_lang()" value="en">EN</input>
                </label>
            </div>
        </div>
    </div>
</nav>
<div class="flex-center position-ref full-height">

    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <div class="content">
        <div class="row">
            <div class="col-sm">
                <div class="jumbotron">
                    <h1 class="display-4">{{ __('main.title') }}</h1>
                    <p class="lead">{!! __('main.lead') !!}</p>
                    <hr class="my-4">
                    <p>{!! __('main.text') !!}</p>

                    <div class="row">
                        <div class="col-xs">
                            <a href=""><img src="/images/app-store-{{app()->getLocale()}}.svg" style="width: 125px; margin: 10px;"/></a>
                        </div>
                        <div class="col-xs">
                            <a href=""><img src="/images/google-play-{{app()->getLocale()}}.png" style="width: 160px;"/></a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm">
                <div class="iphone_mask">
                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/images/slide_1.png" class="d-block w-100" alt="1">
                            </div>
                            <div class="carousel-item">
                                <img src="/images/slide_2.png" class="d-block w-100" alt="2">
                            </div>
                            <div class="carousel-item">
                                <img src="/images/slide_3.png" class="d-block w-100" alt="3">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <span>© 2019 Copyright: Just to do!</span>
</div>
<script>
    function change_lang() {
        let lang = $('input[name=language]:checked').val();
        document.location.href = "/" + lang + "/";
    }
</script>
</body>
</html>
