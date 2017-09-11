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

      <title>{{ 'Invoice #' . $invoice->id }}</title>
@endsection
    
@section('content')

    @include('layouts.breadcrumbs', ['breadcrumbs' => [
        ['label' => 'Invoices', 'url' => '/invoices'],
        ['label' => 'Invoice #' . $invoice->id, 'url' => $invoice->path()],
    ]])
  <div class="container-fluid">
    
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-block">

          <div class="row">
            <div class="col">
              <ul class="list-group">
                <li class="list-group-item active"><h6>Billing Address</h6></li>
                <li class="list-group-item">{{ $invoice->billingAddress->address1 }}</li>
@if(!Auth::guest())
<li class="list-group-item">{{ $invoice->billingAddress->address2 }}</li>
                @if($invoice->billingAddress->address3)
                    <li class="list-group-item">{{ $invoice->billingAddress->address3 }}</li>
                @endif
                    <li class="list-group-item">{{ $invoice->billingAddress->getFormattedRegionLine() }}</li>
@else
                    <li class="list-group-item">Please <a href="/login">login</a> to see address</li>
@endif
              </ul>
            </div>
            <div class="col">
              <ul class="list-group">
                <li class="list-group-item active"><h6>Shipping Address</h6></li>
                <li class="list-group-item">{{ $invoice->shippingAddress->address1 }}</li>
@if(!Auth::guest())
<li class="list-group-item">{{ $invoice->shippingAddress->address2 }}</li>
                @if($invoice->shippingAddress->address3)
                    <li class="list-group-item">{{ $invoice->shippingAddress->address3 }}</li>
                @endif
                    <li class="list-group-item">{{ $invoice->shippingAddress->getFormattedRegionLine() }}</li>
@else
                    <li class="list-group-item">Please <a href="/login">login</a> to see address</li>
@endif
              </ul>
            </div>
            <div class="col text-right">
              <ul class="list-group">
      <li class="list-group-item"><h3>{{ $invoice->type->name }} #{{ $invoice->id }}</h3></li>
      <li class="list-group-item">Billed: {{ $invoice->sent_at->toFormattedDateString() }}</li>
      <li class="list-group-item list-group-item-info"><strong>Due: {{ $invoice->due_at->toFormattedDateString() }}</strong></li>
      <li class="list-group-item <?php if($invoice->status_id == 8) { echo 'list-group-item-warning'; } elseif($invoice->status_id == 9) { echo 'list-group-item-danger'; } elseif($invoice->status_id == 10) { echo 'list-group-item-success'; } ?>"><h3>{{ $invoice->status->name }}</h3></li>
    </ul>
    <ul class="list-unstyled">

    </ul>
            </div>
          </div>

          <div class="row">
            <div class="col">

    <div class="list-group mt-4">
      <div class="list-group-item list-group-item-action flex-column align-items-start active">
        <div class="row">
          <div class="col-6">
            <h6>Item</h6>
          </div>
          <div class="col">
            <h6>Quantity</h6>
          </div>
          <div class="col">
            <h6>Price</h6>
          </div>
          <div class="col">
            <h6>Subtotal</h6>
          </div>
        </div>
      </div>

    @foreach($invoice->items as $item)
      <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="row">
          <div class="col-6">
            <h6>{{ $item->name }}</h6>
            <p>{{ $item->description }}</p>
          </div>
          <div class="col">
            <h6>{{ $item->quantity }}</h6>
          </div>
          <div class="col">
            <h6>{{ $item->getFormattedPrice() }}</h6>
          </div>
          <div class="col">
            <h6>{{ $item->getFormattedSubtotal() }}</h6>
          </div>
        </div>
      </a>    
    @endforeach

    </div>
    
            </div>
          </div>

          <div class="row">
            <div class="col-6 offset-sm-6">

    <ul class="list-group">
      <li class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">Subtotal</h5>
          <h5>{{ $invoice->getFormattedSubtotal() }}</h5>
        </div>
      </li>
      <li class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">Tax Rate</h5>
          <h5>{{ $invoice->getFormattedTaxRate() }}</h5>
        </div>
      </li>
      <li class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">Tax</h5>
          <h5>{{ $invoice->getFormattedTax() }}</h5>
        </div>
    </li>
      <li class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">Shipping</h5>
          <h5>{{ $invoice->getFormattedShippingTotal() }}</h5>
        </div>
      </li>
      <li class="list-group-item list-group-item-action flex-column align-items-start active">
        <div class="d-flex w-100 justify-content-between">
          <h4 class="mb-1">Total</h4>
          <h4>{{ $invoice->getFormattedTotal() }}</h4>
        </div>
      </li>
    </ul>
    
            </div>
          </div>

@if(count($invoice->payments) > 0)

    <div class="list-group mt-4">
      <div class="list-group-item list-group-item-action flex-column align-items-start active">
        <div class="row">
          <div class="col-2">
            <h6>Payment</h6>
          </div>
          <div class="col-4">
            <h6>Date</h6>
          </div>
          <div class="col-3">
            <h6>Reference Number</h6>
          </div>
          <div class="col-3">
            <h6>Amount</h6>
          </div>
        </div>
      </div>

<?php $c = 1; ?>
                                                                        
    @foreach($invoice->payments as $payment)
                                                                              <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="row">
          <div class="col-2">
            <h6>{{ $c }}</h6>
          </div>
          <div class="col-4">
            <h6>{{ $payment->created_at->toRfc850String() }}</h6>
          </div>
          <div class="col-3">
            <h6>{{ $payment->reference_number }}</h6>
          </div>
          <div class="col-3">
            <h6>{{ $payment->getFormattedAmount() }}</h6>
          </div>
        </div>
      </a>
                                                                        
<?php $c++; ?>

    @endforeach

    </div>
    
@endif


        </div>

<div class="card-footer">

@if($invoice->status_id != 10)                                                                        
<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#exampleModal">
Pay Invoice
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h3 class="modal-title" id="exampleModalLabel">Pay Invoice</h3>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
      <form method="POST" action="{{ $invoice->path() . '/pay' }}" id="payment-form">
<div class="modal-body">

        @if (count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
            </ul>
          </div>
        @endif
    
        {{ csrf_field() }}
        <div class="form-group{{ $errors->first('email') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="name">Email</label>
          <input type="email" class="form-control{{ $errors->first('email') ? ' form-control-danger' : '' }}" id="email" name="email" title="email" aria-describedby="emailHelp" placeholder="jsmith@example.com" value="<?php if(!Auth::guest()) { echo auth()->user()->email; }else{ old('email'); } ?>" required>
          @if($errors->first('email'))
          <small id="emailHelp" class="form-control-feedback">{{ $errors->first('email') }}</small>
          @endif
        </div>
        <div class="form-group">
          <label class="form-control-label" for="card">Card</label>
          <div id="card-element" class="form-control"></div>
          <small id="cardHelp" class="form-control-feedback"><div id="card-errors" role="alert"></div></small>
        </div>
        <div class="form-group{{ $errors->first('comments') ? ' has-danger' : '' }}">
          <label class="form-control-label" for="comments">Comments</label>
          <textarea class="form-control{{ $errors->first('comments') ? 'form-control-danger' : '' }}" id="comments" name="comments" title="comments" aria-describedby="commentsHelp" placeholder="Have something to say?" rows="5" required>{{ old('comments') }}</textarea>
          @if($errors->first('comments'))
          <small id="commentsHelp" class="form-control-feedback">{{ $errors->first('comments') }}</small>
          @endif
        </div>


                                                                        
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Cancel</button>
<button type="submit" class="btn btn-success btn-lg">Pay {{ $invoice->getFormattedTotal() }}</button>
</div>
</form>
</div>
</div>
</div>
</div>

@endif

      </div>
    </div>
  </div>
    
  </div>
@endsection