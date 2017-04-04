@extends('layouts.master')

@section('content')

<section id="site-content">
       <div class="container">

       <div class="row">
       <div class="col-sm-8 col-sm-offset-2">
           <div class="cms-projects-view">
               <h1>Donate</h1>
           </div>

                      <!-- START panel-->
                 
                            <form role="form" method="POST" action="/donate" id="payment-form">
                               {{ csrf_field() }}
                               <div class="row">
                                 <div class="col-sm-12">
                                   <div class="form-group donation_buttons">
                                     <label class="control-label" for="donation_buttons">How much would you like to donate?</label>
                                     <div id="donation_buttons" data-toggle="buttons">
                                       <label class="btn btn-success btn-lg" onclick="this.form.elements.namedItem('amount').value = '25.00';">
                                         <input type="radio" tabindex="3">$25
                                       </label>
                                       <label class="btn btn-success btn-lg" onclick="this.form.elements.namedItem('amount').value = '50.00';">
                                         <input type="radio" tabindex="3">$50
                                       </label>
                                       <label class="btn btn-success btn-lg" onclick="this.form.elements.namedItem('amount').value = '100.00';">
                                         <input type="radio" tabindex="3">$100
                                       </label>
                                       <label class="btn btn-success btn-lg" onclick="this.form.elements.namedItem('amount').value = '250.00';">
                                         <input type="radio" tabindex="3">$250
                                       </label>
                                       <label class="btn btn-success btn-lg" onclick="this.form.elements.namedItem('amount').value = '500.00';">
                                         <input type="radio" tabindex="3">$500
                                       </label>
                                       <label class="btn btn-success btn-lg" onclick="this.form.elements.namedItem('amount').value = '1000.00';">
                                         <input type="radio" tabindex="3">$1000
                                       </label>
                                     </div>
                                   </div>
                                 </div>
                               </div>
<div class="row">
    <div class="col-sm-3">    
                               <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                  <label>Amount</label>
                                  <input type="text" name="amount" placeholder="Enter amount" class="form-control" id="amount">
                                  @if ($errors->has('amount'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('amount') }}</strong>
                                  </span>
                                  @endif
                               </div>
    </div>
    <div class="col-sm-4">

                                   <div class="form-group {{ $errors->has('recurrence') ? ' has-error' : '' }}">
                                     <label class="control-label" for="recurrence_buttons">Recurrence</label><br />
                                     <div class="btn-group" id="recurrence_buttons" data-toggle="buttons">
                                       <label class="btn btn-default active">
                                         <input type="radio" tabindex="5" name="recurrence" value="single" checked>Single
                                       </label>
                                       <label class="btn btn-default">
                                         <input type="radio" tabindex="5" name="recurrence" value="month">Monthly
                                       </label>
                                       <label class="btn btn-default">
                                         <input type="radio" tabindex="5" name="recurrence" value="year">Yearly
                                       </label>
                                     </div>
                                     @if ($errors->has('recurrence'))
                                     <span class="help-block">
                                       <strong>{{ $errors->first('recurrence') }}</strong>
                                     </span>
                                     @endif
                                   </div>
    
    </div>
</div>
<div class="row">
<div class="col-sm-6">
                               <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                  <label>Email</label>
                                  <input type="email" name="email" placeholder="Enter email" class="form-control">
                                  @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                                  @endif
                               </div>
</div>
</div>
<div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <label for="card-element">
          Credit Card
        </label>
        <div id="card-element" class="form-control">
          <!-- a Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display Element errors -->
        <div id="card-errors"></div>
      </div>
    </div>
</div>

                               <div class="form-group{{ $errors->has('comments') ? ' has-error' : '' }}">
                                   <label>Comments</label>
                                   <textarea name="comments" class="form-control" rows="5" placeholder="Enter comments..."></textarea>
                                   @if ($errors->has('comments'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('comments') }}</strong>
                                   </span>
                                   @endif
                               </div>
                               <button type="submit" class="btn btn-sm btn-success btn-lg pull-right">Make Donation</button>
                            </form>

                      <!-- END panel-->
    
       
       </div>
       
       </div>
       </div>

       </div>
       </section>


@endsection