           <!DOCTYPE html>
<html lang="en">
             <head>
               <meta charset="utf-8">
               <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
               <meta name="description" content="">
               <meta name="author" content="">
               <link rel="icon" href="../../favicon.ico">

               <title>Blue Springs Historical Association</title>

               <!-- Bootstrap core CSS -->
               <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

               <!-- Custom styles for this template -->
               <link href="\css\bluesprings.css" rel="stylesheet">
             </head>

             <body>

               <div class="site-wrapper">

                 <div class="site-wrapper-inner">

                   <div class="cover-container">

                     <div class="masthead clearfix">
                       <div class="inner">
                         <h3 class="masthead-brand">Blue Springs Historical Association</h3>
                         <nav class="nav nav-masthead">
                           <a class="nav-link" href="/">Home</a>
                           <a class="nav-link" href="/donate">Donate</a>
                         </nav>
                       </div>
                     </div>

                        @yield('content')  


                     <div class="mastfoot">
                       <div class="inner">
                         <p>Powered by <a href="https://nihil.co" target="_blank">NIHIL</a></p>
                       </div>
                     </div>

                   </div>

                 </div>

               </div>

               <!-- STRIPE -->
               <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
               <script type="text/javascript" src="https://js.stripe.com/v3/"></script>                                    

               <!-- Bootstrap core JavaScript
               ================================================== -->
               <!-- Placed at the end of the document so the pages load faster -->
               <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
               <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
               <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

                    <script type="text/javascript">
     var stripe = Stripe('<?php if($account = \App\Account::find(constant('NF_ACCOUNT_ID'))){echo $account->publishable_key; }else{ echo env('STRIPE_PUBLISHABLE_KEY'); } ?>');
     var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
var style = {
    base: {
	// Add your base input styles here. For example:
	fontSsize: '14px',
	lineHeight: '1.52857143',
	color: '#3a3f51'
    }
};

// Create an instance of the card Element
var card = elements.create('card', {hidePostalCode: false, style: style});

// Add an instance of the card Element into the `card-element` <div>
card.mount('#card-element');

card.addEventListener('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
	displayError.textContent = event.error.message;
    } else {
	displayError.textContent = '';
    }
});

// Create a token or display an error the form is submitted.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
    event.preventDefault();

    stripe.createToken(card).then(function(result) {
	if (result.error) {
	    // Inform the user if there was an error
	    var errorElement = document.getElementById('card-errors');
	    errorElement.textContent = result.error.message;
	} else {
	    // Send the token to your server
	    stripeTokenHandler(result.token);
	}
    });
});

function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('payment-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);

    // Submit the form
    form.submit();
}

$(document).ready(function(e){
    $(".nf-img-check").click(function(){
        $(this).toggleClass("nf-check");
    });
});

   </script>

             </body>
           </html>
           