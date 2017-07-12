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

      <title>Payments</title>
@endsection
    
@section('content')

    @include('layouts.breadcrumbs', ['breadcrumbs' => [
        ['label' => 'Payments', 'url' => '/payments'],
    ]])
  <div class="container-fluid">
  <div class="animated fadeIn">    
    
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h1>Payments</h1>
        </div>
        <div class="card-block">
    @if($payments->count() > 0)
    <table class="table table-bordered">
      <thead class="thead-default">
        <tr>
          <th>Stripe ID</th>
          <th>Customer</th>
          <th>User</th>
          <th>Account</th>
          <th>Invoice</th>
          <th>Amount</th>
          <th>Last Update</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        @foreach($payments as $payment)
        <tr>
          <th scope="row"><a href="{{ $payment->path() }}">{{ $payment->stripe_id }}</a></th>
          <td>{{ $payment->customer->stripe_id }}</td>
          <td>{{ $payment->user->usrename }}</td>
          <td>{{ $payment->account->name }}</td>
          <td>{{ $payment->invoice->id }}</td>
          <td>{{ $payment->amount }}</td>
          <td>{{  $payment->updated_at->diffForHumans() }}</td>
          <th>&nbsp;</th>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <p>No countries at this time.</td></tr>
    @endif
    
        </div>
      </div>
    </div>
  </div>
    
      <div class="row">
    <div class="col">
      <div class="card">
            <div class="card-block">
    @if(!Auth::guest())
        <a href="/payments/create" class="btn btn-lg btn-primary pull-right">New Payment</a>
    @else
    Please <a href="{{ route('login') }}">login</a> to manage payments.
    @endif    
    
        </div>
      </div>
    </div>
  </div>

    </div>
    </div>
@endsection