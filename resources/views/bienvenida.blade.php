@extends('template.master')
@section('contenido_central')


<header class="masthead"> 
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 text-uppercase">Bandgram</h1>
        <h2 class="text-white-50 mx-auto mt-2 mb-5">Música para todos.</h2>
        <a href="{{route('usuario.create')}}" class="btn btn-primary js-scroll-trigger">EMPEZAR</a>
      </div>
    </div>
  </header>



  <!-- Projects Section -->
  <section id="projects" class="projects-section bg-light">
    <div class="container">
 
      <!-- Featured Project Row -->
      <div class="row align-items-center no-gutters mb-4 mb-lg-5">
        <div class="col-xl-8 col-lg-7">
          <img class="img-fluid mb-3 mb-lg-0" src="{!!asset('estilos/img/index2.jpg')!!}" alt="">
        </div>
        <div class="col-xl-4 col-lg-5">
          <div class="featured-text text-center text-lg-left">
            <h4>Un mundo musical a tu alcance</h4>
            <p class="text-black-50 mb-0">
          Descubre música de artistas talentosos independientes</p>
          </div>
        </div>
      </div>

      <!-- Project One Row -->
      <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
        <div class="col-lg-6">
          <img class="img-fluid" src="{!!asset('estilos/img/blenders.jpg')!!}" alt="">
        </div>
        <div class="col-lg-6">
          <div class="bg-black text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-left">
                <h4 class="text-white">Sube tu música</h4>
                <p class="mb-0 text-white-50">Esta es tú oportunidad de dar a conocer tu contenido</p>
                <hr class="d-none d-lg-block mb-0 ml-0">
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Project Two Row -->
      <div class="row justify-content-center no-gutters">
        <div class="col-lg-6">
          <img class="img-fluid" src="{!!asset('estilos/img/senorkino.png')!!}" alt="">
        </div>
        <div class="col-lg-6 order-lg-first">
          <div class="bg-black text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-right">
                <h4 class="text-white">Promociona tus conciertos y eventos</h4>
                <p class="mb-0 text-white-50">Llega a más personas difundiendo tus eventos de una manera facil y sencilla</p>
                <hr class="d-none d-lg-block mb-0 mr-0">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="contact-section bg-black">
    <div class="container">

      <div class="row">

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-map-marked-alt text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Address</h4>
              <hr class="my-4">
              <div class="small text-black-50">4923 Market Street, Orlando FL</div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-envelope text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Email</h4>
              <hr class="my-4">
              <div class="small text-black-50">
                <a href="#">bandgram@gmail.com</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-mobile-alt text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Télefono</h4>
              <hr class="my-4">
              <div class="small text-black-50">7224144800</div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
 
@endsection()