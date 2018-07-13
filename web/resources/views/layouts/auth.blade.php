<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>{{ config('app.name', 'Upakaara') }}</title>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
  
  <!-- Google Fonts -->
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C500%2C600%2C700%7CPlayfair+Display%7CRoboto%7CRaleway%7CSpectral%7CRubik">

  <!-- CSS Global Compulsory -->
  <link rel="stylesheet" href="{{ asset('/packages/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('/packages/bootstrap/bootstrap.min.css') }}">
  
  <!-- CSS Global Icons -->
  <link rel="stylesheet" href="{{ asset('/packages/icon-hs/style.css') }}">
  <link rel="stylesheet" href="{{ asset('/packages/icon-line-pro/style.css') }}">
  <link rel="stylesheet" href="{{ asset('/packages/icon-awesome/css/font-awesome.min.css') }}">

  <!-- CSS Unify -->
  <link rel="stylesheet" href="{{ asset('/css/unify-core.css') }} ">
  <link rel="stylesheet" href="{{ asset('/css/unify-globals.css') }} ">
  <link rel="stylesheet" href="{{ asset('/css/unify-components.css') }} ">
</head>

<body>
  <main>
    <!-- Login -->
    <section class="g-height-100vh d-flex align-items-center g-bg-size-cover g-bg-pos-top-center" style="background-color: black;">
      <div class="container g-py-100 g-pos-rel g-z-index-1">
        <div class="row justify-content-between">
          <div class="col-md-6 col-lg-5 flex-md-unordered align-self-center g-mb-80">
              @yield('content')
          </div>

          <div class="col-md-6 flex-md-first align-self-center g-mb-80">
            <div class="mb-5">
              <h1 class="h3 g-color-white g-font-weight-600 mb-3">Profitable contracts,<br>invoices &amp; payments for the best cases!</h1>
              <p class="g-color-white-opacity-0_8 g-font-size-12 text-uppercase">Trusted by 31,000+ users globally</p>
            </div>

            <div class="row">
              <div class="col-md-11 col-lg-9">
                <!-- Icon Blocks -->
                <div class="media mb-4">
                  <div class="d-flex mr-4">
                    <span class="align-self-center u-icon-v1 u-icon-size--lg g-color-primary">
                      <i class="icon-finance-168 u-line-icon-pro"></i>
                    </span>
                  </div>
                  <div class="media-body align-self-center">
                    <p class="g-color-white mb-0">Reliable contracts, multifanctionality &amp; best usage of Unify template</p>
                  </div>
                </div>
                <!-- End Icon Blocks -->

                <!-- Icon Blocks -->
                <div class="media mb-5">
                  <div class="d-flex mr-4">
                    <span class="align-self-center u-icon-v1 u-icon-size--lg g-color-primary">
                      <i class="icon-finance-193 u-line-icon-pro"></i>
                    </span>
                  </div>
                  <div class="media-body align-self-center">
                    <p class="g-color-white mb-0">Secure &amp; integrated options to create individual &amp; business websites</p>
                  </div>
                </div>
                <!-- End Icon Blocks -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Login -->
  </main>

  <div class="u-outer-spaces-helper"></div>

</body>
</html>
