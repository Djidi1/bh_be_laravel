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
            <a class="nav-item nav-link active" href="/{{app()->getLocale()}}/">{{__('main.main')}} <span
                        class="sr-only">(current)</span></a>
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
        @if (app()->getLocale() === 'ru')
            <h1>Политика конфиденциальности Just to do!</h1>
            <p>Дата вступления в силу: 15 февраля 2019 г.</p>
            <h2>Сбор и использование информации</h2>
            <p>При регистрации в Just to do! мы запрашиваем такую информацию, как ваше имя и адрес электронной почты.
                Ваши данные используются только внутри компании и не передаются третьим лицам.</p>

            <p>Just to do! собирает Email-адреса всех, кто общается с нами по электронной почте, а также информацию,
                предоставленную добровольно через такие действия, как регистрация. Just to do! также
                собирает агрегированные и анонимные данные пользователей относительно использования приложения.
                Информация,
                которую мы собираем, служит только для улучшения качества сервиса Just to do!. Мы собираем только те
                личные
                данные, которые требуются для оказания сервиса, и храним их в мере, необходимой для предоставления
                услуг.</p>

            <h2>Ваши данные</h2>
            <p>Just to do! задействует сторонних поставщиков и хостинг-партнеров в целях предоставления необходимого
                оборудования, программного обеспечения, хранения данных и других технологий, необходимых для запуска
                Just to do!. Притом что Just to do! владеет кодом, базами данных и всеми правами на приложение Just to
                do!,
                все права на
                ваши данные принадлежат вам. Мы никогда не раскроем ваши личные данные третьим лицам без вашего
                предварительного согласия и никогда не продадим ваши данные третьим лицам.</p>

            <h2>Файлы Cookie</h2>
            <p>Мы используем файлы куки для хранения настроек пользователей и для кастомизации содержания веб-страниц на
                основе типа браузера или другой информации, отправленной посетителем. Файлы куки необходимы для работы с
                Just to do!.</p>

            <h2>Рекламные серверы</h2>
            <p>Мы не сотрудничаем и не имеем никаких отношений с компаниями, предоставляющими рекламные серверы.</p>

            <h2>Безопасность</h2>
            <p>Все данные и информация, переданные через Сервис, шифруются с помощью SSL-протокола.</p>

            <h2>Изменения</h2>
            <p>Если наша информационная политика изменится в будущем, мы уведомим вас об этом, разместив изменения на
                нашем
                веб-сайте. В новых целях будут использованы только данные, полученные после изменения политики. Если вас
                волнует, как используется ваша информация, периодически проверяйте наш веб-сайт.</p>
        @else
            <h2>Just to do! Privacy Policy</h2>
            <p>Effective Date: February 15th, 2019</p>
            <h2>Information gathering and usage</h2>
            <p>When registering for Just to do! we ask for information such as your name and email address. Your
                information is only used internally and won't be shared with others.</p>

            <p>Just to do! collects the email addresses of those who communicate with us via email, and information
                submitted through voluntary activities such as site registrations or participation in surveys. Just to
                do! also collects aggregated, anonymous user data regarding app usage. The user data we collect is used
                to improve Just to do! and the quality of our service. We only collect personal data that is required to
                provide our services, and we only store it insofar that it is necessary to deliver these services.</p>

            <h2>Your data</h2>
            <p>Just to do! uses third party vendors and hosting partners to provide the necessary hardware, software,
                networking, storage, and related technology required to run Just to do!. Although Just to do! owns the
                code, databases, and all rights to the Just to do! application, you retain all rights to your data. We
                will never share your personal data with a 3rd party without your prior authorization, and we will never
                sell data to 3rd parties. </p>

            <h2>Cookies</h2>
            <p>We use cookies to store visitors preferences, customize Web page content based on visitors browser type
                or other information that the visitor sends. Cookies are required to use Just to do!.</p>

            <h2>Ad servers</h2>
            <p>We do not partner with or have special relationships with any ad server companies.</p>

            <h2>Security</h2>
            <p>All data and information transmitted with Service is secured by SSL protocol.</p>

            <h2>Changes</h2>
            <p>If our information practices change at some time in the future we will post the policy changes to our Web
                site to notify you of these changes and we will use for these new purposes only data collected from the
                time of the policy change forward. If you are concerned about how your information is used, you should
                check back at our Web site periodically.</p>
        @endif
        <p></p>
        <p></p>
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
