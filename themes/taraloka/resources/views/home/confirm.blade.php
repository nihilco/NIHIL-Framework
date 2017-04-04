@extends('layouts.master')

@section('content')

<section id="site-content">
       <div class="container">

       <div class="row">
       <div class="col-sm-4">
           <div class="cms-projects-view">
    <h1>{{ session('confirm')['title'] }}</h1>
           </div>

<p>{{ session('confirm')['message'] }}</p>
       
       </div>
       
       </div>
       </div>

       </div>
       </section>

    @endsection