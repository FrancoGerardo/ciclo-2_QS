<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width" />
    <!-- ETIQUETAS REFERENCIALES -->
    <meta name="description" content="Tienda Online">
    <meta name="keywords" content="tienda, compras, precio, ventas, ecomerce, comercio, online, store, TEM, tecnología">
    <!--<meta http-equiv="author" content="Abdias Alvarado">-->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('style/font-awesome.min.css') }}">
    <title>Quality-Store</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('style/bootstrap.min.css') }}" />

    <!-- Font Awesome Icon -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="{{ asset('style/font-awesome.min.css') }}">

    <!-- Hoja de estilo personalizada -->
    <link type="text/css" rel="stylesheet" href="{{ asset('style/custom.css') }}" />

    <!-- home.css añadir imagenes de boton para inicio -->
    <link type="text/css" rel="stylesheet" href="{{ asset('style/home.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="{{ asset('js/push.js') }}"></script>
    <script src="{{ asset('js/serverWorker.js') }}"></script>
    <script src="{{ asset('js/ubicacion.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeEsCbkqHxi0EwxEmkeqwOR1_P8qivMxI&callback=initMap&v=weekly&channel=2"
        async></script>
    <link rel="icon" type="image/png" href="{{ asset('img/logo.jpg') }}" />

</head>

<body>
    <!-- HEADER -->
    <header>

        <div id="encabezado-superior">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a target="_blank"
                            href="https://api.whatsapp.com/send/?phone=%2B59178416172&text=Mas%20informaci%C3%B3n&app_absent=0"><i
                                class="fa fa-phone"></i> +59178416172</a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> QualityStore@gmail.com</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> Dirección</a></li>
                </ul>

                <ul class="header-links pull-right">


                    @if (Auth::guest())

                        <li><a href="{{ route('login') }}"><i class="fa fa-user-o"></i>Iniciar</a></li>

                        <li><a href="{{ route('register') }}"><i class="fa fa-user-o"></i>Registrar</a></li>

                    @else
                        @can('Panel')
                            <li><a href="{{ route('inicio') }}"><i class="fa fa-user-o"></i>Panel</a></li>
                        @endcan
                        <li class="nav-item">

                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>
                                {{ __('Cerrar Sesión') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </li>

                    @endif
                </ul>


            </div>
        </div>

        <div id="header">

            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="{{ route('home') }}" class="logo">
                                <img src="{{ asset('img/icono.png') }}" alt="QualityStore" width="300px">
                                {{-- QualityStore&#174; --}}
                            </a>
                        </div>

                    </div>



                    <!-- BARRA DE BÚSQUEDA -->
                    {{-- <div class="col-md-6">
                        <div class="header-search">
                            <form>
                                <select class="input-select">
                                    <option value="0">Categorías</option>
                                    <option value="1">Promoción</option>
                                    <option value="1">Adidas</option>
                                    <option value="1">Nike</option>
                                    <option value="1">Fila</option>
                                </select>
                                <input class="input" placeholder="Buscar">
                                <button class="search-btn">Buscar</button>
                            </form>
                        </div>
                    </div> --}}
                    <!-- /BARRA DE BÚSQUEDA -->

                    <!-- USUARIO -->
                    <div class="header-ctn">
                        <!-- Notificacion -->
                        <div class="dropdown">
                            <a href="#" id="sendPushNotification">
                                <i class="far fa-bell"></i>
                                <span>Notificacion</span>
                            </a>
                        </div>
                        <!-- /Notificacion -->

                        <!-- Carrito -->
                        <div class="dropdown">
                            <a href="{{ route('carritos.index') }}">
                                <i class="fas fa-shopping-cart"></i>
                                <span>Carrito</span>
                            </a>
                        </div>
                        <!-- /Carrito -->

                        <!-- Perfil -->
                        <div class="dropdown">
                            <a href="{{ route('perfil.index') }}">
                                <i class="far fa-user"></i>
                                <span>Perfil</span>
                            </a>
                        </div>
                        <!-- /Perfil -->
                    </div>
                </div>
            </div>


    </header>
    <!-- /HEADER -->


    <nav id="navigation">
        <div class="container">
            <div id="responsive-nav">
                <ul class="main-nav nav navbar-nav">
                    <li class="active"><a href="{{ route('home') }}">Inicio</a></li>
                    <li><a href="{{ route('catalogos.index') }}">Catalogo</a></li>
                    <!--<li><a href="#" id="sendPushNotification">Notificación</a></li>-->
                    <li><a href="{{ route('promocion.index') }}">Descuentos</a></li>
                    @if (Auth::check() && Auth::user()->getRoleNames()[0] == 'Cliente')
                        <li><a href="{{ route('compras.index') }}">Mis compras</a></li>
                    @endif
                    <li><a href="{{ route('contactos.index') }}">Contactos</a></li>
                </ul>
            </div>
        </div>
    </nav>





    <!-- CONTENIDO -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- /product -->

            <div class="row">
                <div class="container">
                    <div class="contact">

                        <div class="col-md-6">
                            <div class="contact-info">
                                <div class="kode-section-title">
                                    <h3>Datos de contacto</h3>
                                </div>

                                <div class="kode-forminfo">
                                    <p>Escribenos con confianza al siguiente numero telefonico o a travez de un correo,
                                        elige la opcion mas comoda. </p>
                                    <ul class="kode-form-list">
                                        <li>
                                            <i class="fa fa-home"></i>
                                            <p><strong>Ubicacion: </strong>Feria Barrio Lindo</p>
                                        </li>
                                        <li>
                                            <i class="fa fa-phone"></i>
                                            <p><strong>Telefono: </strong>+591 78416172</p>
                                        </li>
                                        <li>
                                            <i class="fa fa-envelope-o"></i>
                                            <p><strong>Correo: </strong>QualityStore@gmail.com</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        {{-- MENSAJES ALMACENADOS EN LA BASE --}}
                        <div class="card-body table-responsive">
                            <div class="contact-us">
                                <form method="post" class="comments-form" id="contactform"
                                    action="{{ route('contactos.store') }}">
                                    @csrf

                                    @error('nombre')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control required" type="text" id="nombre" name="nombre"
                                        placeholder="Nombre *">
                                    <br>

                                    @error('correo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control required correo" type="text" id="correo" name="correo"
                                        placeholder="Correo *">
                                    <br>

                                    @error('asunto')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <input class="form-control" type="text" name="asunto" id="asunto"
                                        placeholder="Asunto">
                                    <br>

                                    @error('mensaje')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <textarea class="form-control" name="mensaje" id="mensaje"
                                        placeholder="mensaje"></textarea>

                                    <button class="btn btn-warning btn-block">@lang('Enviar')</button>


                                </form>
                            </div>

                        </div>


                        <center>
                            <h3> Ubicación satelital</h3>
                        </center>
                    </div>
                    <div class="col-md-12">
                        <div id="map">
                        </div>
                    </div>


                </div>
            </div>
        </div>


        <a href="#home" data-scroll class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
        <!-- ALL JS FILES -->
        <script src="js/all.js"></script>
        <!-- ALL PLUGINS -->
        <script src="js/custom.js"></script>
</body>

</html>

<center>
    <div class="pagination">
        <a href="#">&laquo;</a>
        <a class="active" href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>
        <a href="#">&raquo;</a>
    </div>
</center>


</div>
<!-- /Section -->

<!-- CONTENIDO -->

<!-- FOOTER -->
<footer id="footer">
    <div id="paginacion">
        <span class="izquierda" type="button" onclick="history.back()" name="boton-personalizado-2"><a>&laquo;
                Anterior </a></span>
        <span class="derecha"><a>Siguiente &raquo;</a></span>
    </div>
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Sobre Nosotros</h3>
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous"
                                                src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v12.0&appId=167466933725219&autoLogAppEvents=1"
                                                nonce="DBvUnpJ9"></script>
                        <div class="fb-page" data-href="https://www.facebook.com/Quality-Store-1999078610372910"
                            data-tabs="timeline" data-width="250" data-height="40" data-small-header="true"
                            data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/Quality-Store-1999078610372910"
                                class="fb-xfbml-parse-ignore"><a
                                    href="https://www.facebook.com/Quality-Store-1999078610372910">Quality Store</a>
                            </blockquote>
                        </div>
                        <br>
                        <p>Nos dedicamos a ofrecerte los mejores servicios</p>



                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>Ubicacion</a></li>
                            <li><a target="_blank"
                                    href="https://api.whatsapp.com/send/?phone=%2B59178416172&text=Mas%20informaci%C3%B3n&app_absent=0"><i
                                        class="fa fa-phone"></i>+59178416172</a></li>
                            <li><a href="mailto:QualityStore@gmail.com "><i class="fa fa-envelope-o"></i>
                                    QualityStore@gmail.com </a></li>



                            <div class="footer-social">
                                <a target="_blank" href="https://www.facebook.com/Quality-Store-1999078610372910"><i
                                        class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <!--<a href="#" ><i class="fa fa-pinterest"></i></a>-->
                            </div>
                        </ul>



                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Categorías</h3>
                        <ul class="footer-links">
                            <li><a href="#">Fila</a></li>
                            <li><a href="">Promoción</a></li>
                            <li><a href="#">Novedades</a></li>
                            <li><a href="#">Nike</a></li>
                            <li><a href="#">Adidas</a></li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Información</h3>
                        <ul class="footer-links">
                            <li><a href="#">Sobre Nosotros</a></li>
                            <li><a href="#">Contáctanos</a></li>
                            <li><a href="#">Políticas de Privacidad</a></li>
                            <li><a href="#">Términos y Condiciones</a></li>
                            <li>
                                <a target="_blank" rel="license"
                                    href="http://creativecommons.org/licenses/by-nc-sa/4.0/">Esta obra de Licencia
                                    <img alt="Licencia Creative Commons" style="border-width:0"
                                        src="https://i.creativecommons.org/l/by-nc-sa/4.0/88x31.png" />
                                </a>
                            </li>
                            <br>

                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                                <input type="hidden" name="cmd" value="_s-xclick" />
                                <input type="hidden" name="hosted_button_id" value="Q94VEUTNSR2QW" />
                                <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif"
                                    border="0" name="submit" title="PayPal - The safer, easier way to pay online!"
                                    alt="Donate with PayPal button" />
                                <img alt="" border="0" src="https://www.paypal.com/en_BO/i/scr/pixel.gif" width="1"
                                    height="1" />
                            </form>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Clientes</h3>
                        <ul class="footer-links">
                            <li><a href="#">Mi Cuenta</a></li>
                            <li><a href="#">Ver servicio</a></li>
                            <li><a href="#">Ayuda</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <div id="bottom-footer" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <span class="copyright">
                        Copyright &copy; 2021 Todos los derechos reservados. | QualityStore
                    </span>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /FOOTER -->


<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>



</body>

</html>

<style>
    /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
    #map {
        overflow: hidden;
        padding-bottom: 56.25%;
        position: relative;
        height: 500px;
        margin: 10px;
        padding: 0px;
        border: solid #000;
        border-top-width: 1px;
        border-left-width: 2px;
    }

</style>

<script type="text/javascript">
    // Push.create('Hello World!');
    $(document).ready(function() {
        $('#sendPushNotification').on('click', function() {
            Push.create("Quality Store", {
                body: "“Las tendencias desaparecen, el estilo es eterno”",
                icon: '{{ asset('img/logo.jpg') }}',
                timeout: 40000,
                onClick: function() {
                    window.focus();
                    this.close();
                }
            });
        });
    });
</script>