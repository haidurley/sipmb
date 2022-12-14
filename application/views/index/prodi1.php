<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>SELMA - AMD ACADEMY</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
    
    <link href="<?= base_url('public')?>/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('public')?>/lib/highchart/code/css/highcharts.css">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">SELMA - AMD ACADEMY</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
  <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?=site_url('index2/index')?>">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=site_url('index2/prodi1')?>">
              <span data-feather="file" class="align-text-bottom"></span>
              Grafik Pendaftar Prodi Pilihan 1
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=site_url('index2/prodi2')?>">
              <span data-feather="shopping-cart" class="align-text-bottom"></span>
              Grafik Pendaftar Prodi Pilihan 2
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=site_url('index2/prestasi')?>">
              <span data-feather="users" class="align-text-bottom"></span>
              Grafik Pendaftar Jalur Mandiri Prestasi.
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=site_url('index2/jalurmasuk')?>">
              <span data-feather="bar-chart-2" class="align-text-bottom"></span>
              Grafik Pendaftar Jalur Masuk.
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=site_url('index2/pendapatan')?>">
              <span data-feather="layers" class="align-text-bottom"></span>
              Grafik pendapatan tiap Bank.
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=site_url('index2/pembayaran')?>">
              <span data-feather="layers" class="align-text-bottom"></span>
              Grafik total pembayaran.
            </a>
          </li>
          
        </ul>
     </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Prodi Pilihan 1</h1>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div id="pendaftar"></div>
        </div>
    </div>
      </main>
  </div>
</div>


    <script src="<?= base_url('public')?>/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('public')?>/lib/highchart/code/highcharts.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
    <script>
        getGrafikPie('pendaftar', <?= $grafik1 ?>, 'Grafik Pendaftar Berdasarkan Prodi Pilihan 1');

        function getGrafikPie(selector, data, title) {
        Highcharts.chart(selector, {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: title
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.jumlah:.1f} Pendaftar</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Pendaftar',
            colorByPoint: true,
            data: <?= $grafik1?>
        }]
        });
        }
    </script>
    </body>
</html>
