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
        <p class="title wow fadeInDown" data-wow-delay="0.2s">MINUTAS.CO</p>
        <p class="description wow fadeInUp"><i></i>Herramienta para la generación de minutas de forma
            automática<em></em></p>
        <div id="div-form-minutas" class="row">
            <form id="form-minutas" action="/generate" role="form" class="col-md-8 col-md-offset-2" method="POST"
                  enctype="multipart/form-data">
                {{ csrf_field() }}

                @if(session()->has('link'))
                    <br>
                    <br>
                    <div class="row">
                        <div class="alert alert-success">
                            Archivos generados exitosamente. <a href="/{{ session()->get('link') }}" target="_blank">Descargar</a>
                        </div>
                    </div>
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
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="thumb-pad1 maxheight wow fadeIn">
                    <div class="badge"><img src="/img/page1_icon1.png" alt=""></div>
                    <div class="thumbnail">
                        <div class="caption">
                            <p class="title">Progressive Programs</p>
                            <p>Lorem ipsum dolor sit amet, consectscing elit. Maecenas moleset alldbus id ictum. Ut
                                neque purus, sollic alitudin non ante ac, malesuada. condimentum libero. </p>
                            <a href="#" class="btn-default btn1">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                <div class="thumb-pad1 maxheight">
                    <div class="badge"><img src="/img/page1_icon2.png" alt=""></div>
                    <div class="thumbnail">
                        <div class="caption">
                            <p class="title">online education</p>
                            <p>Lorem ipsum dolor sit amet, consectscing elit. Maecenas moleset alldbus id ictum. Ut
                                neque purus, sollic alitudin non ante ac, malesuada. condimentum libero. </p>
                            <a href="#" class="btn-default btn1">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 wow fadeIn" data-wow-delay="0.2s">
                <div class="thumb-pad1 maxheight">
                    <div class="badge"><img src="/img/page1_icon3.png" alt=""></div>
                    <div class="thumbnail">
                        <div class="caption">
                            <p class="title">International students</p>
                            <p>Lorem ipsum dolor sit amet, consectscing elit. Maecenas moleset alldbus id ictum. Ut
                                neque purus, sollic alitudin non ante ac, malesuada. condimentum libero. </p>
                            <a href="#" class="btn-default btn1">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="thumb-box1">
        <div class="container">
            <h2 class="center">For students:</h2>
            <p class="center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu libero scelerisque ligula
                sagittis faucibus eget quis lacus. <br>Suspendisse sodales sed orci ac feugiat. </p>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="thumb-pad2 wow fadeInRight">
                        <figure><img src="/img/page1_pic1.jpg" alt=""></figure>
                        <div class="thumbnail">
                            <div class="caption">
                                <h3>Attendance procedure</h3>
                                <p>Lorem ipsum dolor sit amet, consectscing elit. Maecenas moleset alldbus id ictum. Ut
                                    neque purus, sollic alitudin non ante ac, malesuada. condimentum libero.</p>
                                <a href="#" class="btn-default btn1">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="thumb-pad2 wow fadeInRight" data-wow-delay="0.2s">
                        <figure><img src="/img/page1_pic2.jpg" alt=""></figure>
                        <div class="thumbnail">
                            <div class="caption">
                                <h3>Health & Help</h3>
                                <p>Lorem ipsum dolor sit amet, consectscing elit. Maecenas moleset alldbus id ictum. Ut
                                    neque purus, sollic alitudin non ante ac, malesuada. condimentum libero.</p>
                                <a href="#" class="btn-default btn1">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="thumb-pad2 wow fadeInRight" data-wow-delay="0.4s">
                        <figure><img src="/img/page1_pic3.jpg" alt=""></figure>
                        <div class="thumbnail">
                            <div class="caption">
                                <h3>Course Selection</h3>
                                <p>Lorem ipsum dolor sit amet, consectscing elit. Maecenas moleset alldbus id ictum. Ut
                                    neque purus, sollic alitudin non ante ac, malesuada. condimentum libero.</p>
                                <a href="#" class="btn-default btn1">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="thumb-box2 center">
        <div class="container">
            <h2 class="center">Current news:</h2>
            <p class="center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu libero scelerisque ligula
                sagittis faucibus eget quis lacus. <br>Suspendisse sodales sed orci ac feugiat. </p>
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 date-box wow fadeInLeft" data-wow-delay="0.2s">
                    <div>
                        <div class="badge">
                            22 <span>jun</span>
                            <strong>6 <img src="/img/page1_icon4.png" alt=""></strong>
                        </div>
                        <div class="extra-wrap">
                            <p>Lorem ipsum dolor sit amedgit, consectetur adipscing elitsf tell. Mauris feugiat vari
                                dghus elit, a commodo libero dicuij futumty pottor estibulum egestas egestas erat et
                                iaculis.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 wow fadeInLeft">
                    <figure><img src="/img/page1_pic4.jpg" alt=""></figure>
                </div>
            </div>
            <a href="#" class="btn-default btn1">view more news</a>
        </div>
    </div>
    <div class="thumb-box3">
        <div class="container">
            <h2 class="wow fadeInUp">newsletter sign up</h2>
            <p class="wow fadeInUp">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu libero scelerisque
                ligula sagittis faucibus eget quis lacus. <br>Suspendisse sodales sed orci ac feugiat. </p>
            <div class="row">
                <div class="col-lg-12 wow fadeInUp">
                    <form id="newsletter" accept-charset="utf-8">
                        <div class="success">Your subscribe request has been sent!</div>
                        <label class="email">
                            <input type="email" value="" placeholder="Enter Your E-mail:">
                            <span class="error">*This is not a valid email address.</span>
                        </label><br>
                        <a href="#" data-type="submit">Subscribe</a>
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
<script>
    $(function () {
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