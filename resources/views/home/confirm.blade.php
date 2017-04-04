@extends('layouts.admin')

@section('content')

      <!-- Main section-->
      <section>
         <!-- Page content-->
         <div class="content-wrapper">
            <div class="content-heading">
               {{ session('confirm')['title'] }}
               <small>{{ session('confirm')['message'] }}</small>
            </div>
         </div>
      </section>
    
@endsection