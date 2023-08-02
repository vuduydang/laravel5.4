<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
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

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            /*.links > a {*/
            /*    color: #636b6f;*/
            /*    padding: 0 25px;*/
            /*    font-size: 12px;*/
            /*    font-weight: 600;*/
            /*    letter-spacing: .1rem;*/
            /*    text-decoration: none;*/
            /*    text-transform: uppercase;*/
            /*}*/

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <button id="download" class="btn btn-success">Tải file với js</button>
                    <a href="/download" target="_blank" class="btn btn-primary">Tải file</a>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
        <script>
            $('#download').click(function () {
                let self = $(this);
                self.html(`<div class="spinner-border text-light" role="status"></div>`)
                $.ajax({
                    url: "/download",
                    data: {
                        ajax: true
                    }
                }).done(function(res) {
                    self.html(`Tải xuống`)
                    console.log(res)
                    console.log(res.url)
                    window.open(res.url, '_blank');
                });
            })
        </script>
    </body>
</html>
