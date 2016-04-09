<!DOCTYPE html>
<html lang="en">
<head>
    <title>Minutas.co - Herramienta para la generación de minutas de forma automática</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon"/>
    <meta name="description" content="Herramienta para la generación de minutas de forma automática">
    <meta name="keywords" content="minutas, generación, plantillas, formatos, automáticamente">
    <meta name="author" content="Luis Montoya">

    <!--CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/app.css">

    <!--[if lt IE 9]>
    <div style='text-align:center'><a
            href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode"><img
            src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0"
            height="42" width="820"
            alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/></a>
    </div>
    <![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <link rel="stylesheet" href="http://static.livedemo00.template-help.com/wt_51138/css/ie.css">
    <![endif]-->
</head>
<body>
<!--header-->

<div class="bg_pic">
    <div class="container">
        <p id="main-title" class="title wow fadeInDown" data-wow-delay="0.2s">MINUTAS.CO</p>
        <p class="description wow fadeInUp"><i></i>Herramienta para la generación de minutas de forma
            automática<em></em></p>
        <div id="div-form-minutas" class="row">
            <form id="form-minutas" action="/generate" role="form" class="col-md-8 col-md-offset-2" method="POST"
                  enctype="multipart/form-data">
                {{ csrf_field() }}

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session()->has('link'))
                    <br>
                    <div id="success-message" class="row">
                        <div class="alert alert-success">
                           <h3>
                               Archivos generados exitosamente. <a href="/{{ session()->get('link') }}" target="_blank">Descargar</a>
                           </h3>
                        </div>
                    </div>
                    <br>
                @endif

                @if(session()->has('emailSent'))
                    <br>
                    <div id="success-message" class="row">
                        <div class="alert alert-success">
                           <h3>
                               Hemos recibido tu mensaje, muchas gracias por escribirnos.
                           </h3>
                        </div>
                    </div>
                    <br>
                @endif
                <div class="form-group">
                    <label for="name">Plantilla en formato Word</label>
                    <div class="input-group">
                        <input type="text" class="form-control" readonly="" required="" disabled>
                    <span class="input-group-btn">
                        <span class="btn btn-primary btn-file btn-file-input">
                            Seleccionar archivo<input type="file" name="word" accept=".doc,.docx" required="">
                        </span>
                    </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone">Datos en formato Excel </label>
                    <div class="input-group">
                        <input type="text" class="form-control" readonly="" required="" disabled>
                    <span class="input-group-btn">
                        <span class="btn btn-primary btn-file btn-file-input">
                            Seleccionar archivo<input type="file" name="excel" accept=".xls,.xlsx" required="">
                        </span>
                    </span>
                    </div>
                </div>
                <div class="form-group text-center">
                    <button id="btn-generate-minutas" type="submit" class="btn btn-primary btn-lg">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="global">
    <!--content-->
    <div id="steps" class="container">
        <h2  class="center">Forma de uso</h2>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="thumb-pad1 maxheight wow fadeIn">
                    <div class="badge">1</div>
                    <div class="thumbnail">
                        <div class="caption">
                            <p class="title">Archivo Word</p>
                            <p>El primer paso es crear la minuta en formato Word. Luego debes reescribir los datos que varia de la siguiente manera: <b>${nombre_del_campo}</b></p>
                            <a href="/archivo_ejemplo.docx" class="btn-default btn1">Descargar Word de ejemplo</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                <div class="thumb-pad1 maxheight">
                    <div class="badge">2</div>
                    <div class="thumbnail">
                        <div class="caption">
                            <p class="title">Archivo Excel</p>
                            <p>El propósito de este archivo es tener todos los datos que van a alimentar el archivo en Word. Cada columna debe tener igual número de variables definida en el archivo Word.  Y el nombre de cada una de ellas debe ser el nombre dado a la variable en el archivo Word.</p>
                            <a href="/datos.xlsx" class="btn-default btn1">Descargar Excel de ejemplo</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 wow fadeIn" data-wow-delay="0.2s">
                <div class="thumb-pad1 maxheight">
                    <div class="badge">3</div>
                    <div class="thumbnail">
                        <div class="caption">
                            <p class="title">Adjunar archivos</p>
                            <p>Luego detener los dos archivos requeridos estos se deben adjuntar en el formulario, y proceder a Enviarlo. Luego de procesar los datos el sistema genera un link de descarga. </p>
                            <a href="#main-title" class="btn-default btn1">Ir al formulario</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="thumb-box1">
        <div class="container">
            <h2 class="center">Contáctenos</h2>
            <p class="center">Por favor siéntase libre de enviarme cualquier duda o sugerencia </p>
            <div class="row">
                <div class="col-lg-12">
                    <form id="contact-form" class="col-sm-12 contact-form" action="/contact" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="sr-only"></label>
                                    <input id="name" name="name" class="form-control" placeholder="Nombre" type="text" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="sr-only"></label>
                                    <input id="email" name="email" type="email" class="form-control" placeholder="Email" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="message" class="form-control required parsley-validated" rows="8" placeholder="Mensaje" required="required" required="required"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success pull-right">Enviar</button>
                            <a href="#" class="btn btn-danger pull-right contact-reset">Limpiar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--footer-->
<footer>
    <div class="container">
        <p>MINUTAS.CO &copy; <em id="copyright-year"></em></p>
        <p class="foo_address">Powered by <a href="https://luisfer.co">https://luisfer.co</a><br>me@luisfer.co</p>
    </div>
</footer>

<div id="cover-display">
    <img id="img-loading" src="/img/loading.gif">
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="/js/app.js"></script>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-42717766-8', 'auto');
    ga('send', 'pageview');

</script>

</body>
</html>