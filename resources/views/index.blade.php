<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Minutas</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <style>
        .btn-file {
            cursor: pointer;
        }

        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            width: 155px;
            height: 34px;
            filter: alpha(opacity=0);
            opacity: 0;
            display: block;
            cursor: pointer;
        }

        #cover-display {
            position: fixed;
            top: 0;
            left: 0;
            background: #444;
            background: rgba(68, 68, 68, 0.95);
            overflow: hidden;
            filter: alpha(opacity=0);
            opacity: 0;
            z-index: 1500;
        }

        #img-loading {
            width: 64px;
            height: 64px;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -32px;
            margin-left: -32px;
        }

    </style>
</head>
<body>


<div class="container">

    <div class="row">
        <form id="form-minutas" action="/minutas/generate" role="form" class="col-md-8 col-md-offset-2" method="POST"
              enctype="multipart/form-data">
            @if(session()->has('link'))
                <br>
                <br>
                <div class="row">
                    <div class="alert alert-success">
                            Archivos generados exitosamente. <a href="/{{ session()->get('link') }}" target="_blank">Descargar</a>
                    </div>
                </div>
            @endif
            <h2>Minutas</h2>
            <div class="form-group">
                <label for="name">Plantilla en formato Word <a href="/plantilla.docx" target="_blank">Descargar plantilla de ejemplo</a></label>
                <div class="input-group">
                    <input type="text" class="form-control" readonly="" required="">
                    <span class="input-group-btn">
                        <span class="btn btn-primary btn-file btn-file-input">
                            Seleccionar archivo<input type="file" name="word" accept=".doc,.docx" required="">
                        </span>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label for="phone">Datos en formato Excel <a href="/datos.xlsx" target="_blank">Descargar datos de ejemplo</a></label>
                <div class="input-group">
                    <input type="text" class="form-control" readonly="" required="">
                    <span class="input-group-btn">
                        <span class="btn btn-primary btn-file btn-file-input">
                            Seleccionar archivo<input type="file" name="excel" accept=".xls,.xlsx" required="">
                        </span>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
</div>
<div id="cover-display">
    <img id="img-loading" src="/images/loading.gif">
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
    $(function () {
        coverOff();
        $('.btn-file-input :file').change(function () {
            var input = $(this);
            var label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.parent().parent().siblings("input").val(label);
        });

        $('#form-minutas').on('submit', function () {
            coverOn();
        });
    });

    function coverOn() {
        $("#cover-display").css({
            "opacity": "1",
            "width": "100%",
            "height": "100%"
        });
    }

    function coverOff() {
        $("#cover-display").css({
            "opacity": "0",
            "width": "0",
            "height": "0"
        });
    }

</script>

</body>
</html>
