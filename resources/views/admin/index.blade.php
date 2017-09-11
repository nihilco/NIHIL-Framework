@extends('layouts.master')

@section('meta')
      <meta description="The Taraloka Foundation is a registered 501(c)3 organization creating opportunities for Himalayan girls by providing education, healthcare, and a safe refuge.">
      <meta keywords="taraloka, sikkim, india, foundation, nihil">
      <meta author="Uriah M. Clemmer IV">

      <meta property="fb:app_id" content="187097078310518">
    
      <meta name="og:url" property="og:url" content="https://taraloka.org/about">
      <meta name="og:type" property="og:type" content="article">
      <meta name="og:title" property="og:title" content="Taraloka Foundation">
      <meta name="og:description" property="og:description" content="The Taraloka Foundation is a registered 501(c)3 non-profit organization creating opportunities for Himalayan girls by providing education, healthcare, and a safe refuge.">
      <meta name="og:image" property="og:image" content="https://taraloka.org/img/taraloka-logo-og-dark.png">

      <title>Dashboard</title>
@endsection
    
@section('content')

    @include('layouts.breadcrumbs', ['breadcrumbs' => [
        ['label' => 'Dashboard', 'url' => '/dashboard'],
    ]])
  <div class="container-fluid">
  <div class="animated fadeIn">    
    
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h1>Dashboard</h1>
        </div>
        <div class="card-block">

    
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-6 col-lg-3">
      <div class="card">
        <div class="card-header card-header-inverse card-header-primary">
          <div class="font-weight-bold">
            <span>INVOICES: OPEN</span>
            <span class="pull-right">$1.890,65</span>
          </div>
          <div>
            <span>
              <small>Today 6:43 AM</small>
            </span>
            <span class="pull-right">
              <small>+432,50 (15,78%)</small>
            </span>
          </div>
          <div class="chart-wrapper">
            <canvas class="chart-7 chart chart-line" height="38"></canvas>
          </div>
          <div class="chart-wrapper">
            <canvas class="chart-8 chart chart-bar" height="38"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3">
                                                 <div class="card">
                                                     <div class="card-header card-header-inverse card-header-danger">
                                                         <div class="font-weight-bold">
                                                             <span>SALE</span>
                     <span class="pull-right">$1.890,65</span>
                                                         </div>
                                                         <div>
                                                             <span>
                     <small>Today 6:43 AM</small>
                                                                              </span>
                                                                              <span class="pull-right">
                                      <small>+432,50 (15,78%)</small>
                                                                              </span>
                                                                          </div>
                                                                          <div class="chart-wrapper">
                                                                              <canvas class="chart-7-2 chart chart-line" height="38"></canvas>
                                                                          </div>
                                                                          <div class="chart-wrapper">
                                                                              <canvas class="chart-8-2 chart chart-bar" height="38"></canvas>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                              <div class="col-sm-6 col-lg-3">
                                                                  <div class="card">
                                                                      <div class="card-header card-header-inverse card-header-success">
                                                                          <div class="font-weight-bold">
                                                                              <span>SALE</span>
                                      <span class="pull-right">$1.890,65</span>
                                                                          </div>
                                                                          <div>
                                                                              <span>
                                      <small>Today 6:43 AM</small>
                                                                                               </span>
                                                                                               <span class="pull-right">
                                                       <small>+432,50 (15,78%)</small>
                                                                                               </span>
                                                                                           </div>
                                                                                           <div class="chart-wrapper">
                                                                                               <canvas class="chart-7-3 chart chart-line" height="38"></canvas>
                                                                                           </div>
                                                                                           <div class="chart-wrapper">
                                                                                               <canvas class="chart-8-3 chart chart-bar" height="38"></canvas>
                                                                                           </div>
                                                                                       </div>
                                                                                   </div>
                                                                               </div>
                                                                               <div class="col-sm-6 col-lg-3">
                                                                                   <div class="card">
                                                                                       <div class="card-header card-header-inverse card-header-warning">
                                                                                           <div class="font-weight-bold">
                                                                                               <span>SALE</span>
                                                       <span class="pull-right">$1.890,65</span>
                                                                                           </div>
                                                                                           <div>
                                                                                               <span>
                                                       <small>Today 6:43 AM</small>
                                                                                                                </span>
                                                                                                                <span class="pull-right">
                                                                        <small>+432,50 (15,78%)</small>
                                                                                                                </span>
                                                                                                            </div>
                                                                                                            <div class="chart-wrapper">
                                                                                                                <canvas class="chart-7-4 chart chart-line" height="38"></canvas>
                                                                                                            </div>
                                                                                                            <div class="chart-wrapper">
                                                                                                                <canvas class="chart-8-4 chart chart-bar" height="38"></canvas>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
    
  </div>
  </div>
@endsection