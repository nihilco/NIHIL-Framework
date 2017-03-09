@extends('layouts.master')

@section('content')

<section id="site-content">
       <div class="container">

       <div class="row">
       <div class="col-sm-4">
           <div class="cms-projects-view">
               <h1><img src="/img/partners/astral.png" /><br />Shoe Fundraiser</h1>
           </div>

       <p>Thanks to a new partnership with our friends at <a href="www.astraldesigns.com" target="_blank">Astral</a>, our girls will be walking to school in style.  When we return to Sikkim in March, we will be packing a new pair of shoes for each girl.  Between donated and discounted shoes, our cost will only be $25 per pair.  Please help us raise the funds to complete this project!</p>
       
       <p>To the right (or below, depending on your device) you will find an image of each girl. If selectable, you can use the following form to give her a pair of shoes.  As donations are matched with each girl, her picture will become unselectable.</p>

       </div>
       <div class="col-sm-4">

<form role="form" method="POST" action="/astral-shoe-fundraiser" id="payment-form">
       {{ csrf_field() }}
       
       <div class="row" style="margin-top:21px;">
       <div class="col-sm-12">
       
       <div class="form-group" id="checks">
         <div class="col-xs-3">
    @if($girls->bimla)
           <label class="btn btn-success" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/bimla.png" alt="..." class="img-thumbnail nf-img-check nf-checked" style="border:0;padding:0;">
    @else
           <label class="btn btn-primary" style="padding:0; margin-bottom:10px;">
                 <img src="/img/girls/bimla.png" alt="..." class="img-thumbnail nf-img-check" style="border:0;padding:0;">
             <input type="checkbox" name="chk1" id="item1" value="bimla" class="hidden" autocomplete="off">
    @endif
           </label>
         </div>
         <div class="col-xs-3">
    @if($girls->binita)
           <label class="btn btn-success" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/binita.png" alt="..." class="img-thumbnail nf-img-check nf-checked" style="border:0;padding:0;">
    @else
           <label class="btn btn-primary" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/binita.png" alt="..." class="img-thumbnail nf-img-check" style="border:0;padding:0;">
             <input type="checkbox" name="chk2" id="item2" value="binita" class="hidden" autocomplete="off">
    @endif
           </label>
         </div>
         <div class="col-xs-3">
    @if($girls->christina)
           <label class="btn btn-success" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/christina.png" alt="..." class="img-thumbnail nf-img-check nf-checked" style="border:0;padding:0;">
    @else
           <label class="btn btn-primary" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/christina.png" alt="..." class="img-thumbnail nf-img-check" style="border:0;padding:0;">
             <input type="checkbox" name="chk3" id="item3" value="christina" class="hidden" autocomplete="off">
    @endif
           </label>
         </div>
         <div class="col-xs-3">
    @if($girls->dawa)
           <label class="btn btn-success" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/dawa.png" alt="..." class="img-thumbnail nf-img-check nf-checked" style="border:0;padding:0;">
    @else
           <label class="btn btn-primary" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/dawa.png" alt="..." class="img-thumbnail nf-img-check" style="border:0;padding:0;">
             <input type="checkbox" name="chk4" id="item4" value="dawa" class="hidden" autocomplete="off">
    @endif
           </label>
         </div>
         <div class="col-xs-3">
    @if($girls->dechen)
           <label class="btn btn-success" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/dechen.png" alt="..." class="img-thumbnail nf-img-check nf-checked" style="border:0;padding:0;">
    @else
           <label class="btn btn-primary" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/dechen.png" alt="..." class="img-thumbnail nf-img-check" style="border:0;padding:0;">
             <input type="checkbox" name="chk5" id="item5" value="dechen" class="hidden" autocomplete="off">
    @endif
           </label>
         </div>
         <div class="col-xs-3">
    @if($girls->dekhyong)
           <label class="btn btn-success" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/dekhyong.png" alt="..." class="img-thumbnail nf-img-check nf-checked" style="border:0;padding:0;">
    @else
           <label class="btn btn-primary" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/dekhyong.png" alt="..." class="img-thumbnail nf-img-check" style="border:0;padding:0;">
             <input type="checkbox" name="chk6" id="item6" value="dekhyong" class="hidden" autocomplete="off">
    @endif
           </label>
         </div>
         <div class="col-xs-3">
    @if($girls->gayatri)
           <label class="btn btn-success" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/gayatri.png" alt="..." class="img-thumbnail nf-img-check nf-checked" style="border:0;padding:0;">
    @else
           <label class="btn btn-primary" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/gayatri.png" alt="..." class="img-thumbnail nf-img-check" style="border:0;padding:0;">
             <input type="checkbox" name="chk7" id="item7" value="gayatri" class="hidden" autocomplete="off">
    @endif
           </label>
         </div>
         <div class="col-xs-3">
    @if($girls->gyalmit)
           <label class="btn btn-success" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/gyalmit.png" alt="..." class="img-thumbnail nf-img-check nf-checked" style="border:0;padding:0;">
    @else
           <label class="btn btn-primary" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/gyalmit.png" alt="..." class="img-thumbnail nf-img-check" style="border:0;padding:0;">
             <input type="checkbox" name="chk8" id="item8" value="gyalmit" class="hidden" autocomplete="off">
    @endif
           </label>
         </div>
         <div class="col-xs-3">
    @if($girls->karma)
           <label class="btn btn-success" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/karma.png" alt="..." class="img-thumbnail nf-img-check nf-checked" style="border:0;padding:0;">
    @else
           <label class="btn btn-primary" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/karma.png" alt="..." class="img-thumbnail nf-img-check" style="border:0;padding:0;">
             <input type="checkbox" name="chk9" id="item9" value="karma" class="hidden" autocomplete="off">
    @endif
           </label>
         </div>
         <div class="col-xs-3">
    @if($girls->maite)
           <label class="btn btn-success" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/maite.png" alt="..." class="img-thumbnail nf-img-check nf-checked" style="border:0;padding:0;">
    @else
           <label class="btn btn-primary" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/maite.png" alt="..." class="img-thumbnail nf-img-check" style="border:0;padding:0;">
             <input type="checkbox" name="chk10" id="item10" value="maite" class="hidden" autocomplete="off">
    @endif
           </label>
         </div>
         <div class="col-xs-3">
    @if($girls->muskan)
           <label class="btn btn-success" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/muskan.png" alt="..." class="img-thumbnail nf-img-check nf-checked" style="border:0;padding:0;">
    @else
           <label class="btn btn-primary" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/muskan.png" alt="..." class="img-thumbnail nf-img-check" style="border:0;padding:0;">
             <input type="checkbox" name="chk11" id="item11" value="muskan" class="hidden" autocomplete="off">
    @endif
           </label>
         </div>
         <div class="col-xs-3">
    @if($girls->ongmu)
           <label class="btn btn-success" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/ongmu.png" alt="..." class="img-thumbnail nf-img-check nf-checked" style="border:0;padding:0;">
    @else
           <label class="btn btn-primary" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/ongmu.png" alt="..." class="img-thumbnail nf-img-check" style="border:0;padding:0;">
             <input type="checkbox" name="chk12" id="item12" value="ongmu" class="hidden" autocomplete="off">
    @endif
           </label>
         </div>
         <div class="col-xs-3">
    @if($girls->palmu)
           <label class="btn btn-success" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/palmu.png" alt="..." class="img-thumbnail nf-img-check nf-checked" style="border:0;padding:0;">
    @else
           <label class="btn btn-primary" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/palmu.png" alt="..." class="img-thumbnail nf-img-check" style="border:0;padding:0;">
             <input type="checkbox" name="chk13" id="item13" value="palmu" class="hidden" autocomplete="off">
    @endif
           </label>
         </div>
         <div class="col-xs-3">
    @if($girls->pasang)
           <label class="btn btn-success" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/pasang.png" alt="..." class="img-thumbnail nf-img-check nf-checked" style="border:0;padding:0;">
    @else
           <label class="btn btn-primary" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/pasang.png" alt="..." class="img-thumbnail nf-img-check" style="border:0;padding:0;">
             <input type="checkbox" name="chk14" id="item14" value="pasang" class="hidden" autocomplete="off">
    @endif
           </label>
         </div>
         <div class="col-xs-3">
    @if($girls->pasangkee)
           <label class="btn btn-success" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/pasangkee.png" alt="..." class="img-thumbnail nf-img-check nf-checked" style="border:0;padding:0;">
    @else
           <label class="btn btn-primary" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/pasangkee.png" alt="..." class="img-thumbnail nf-img-check" style="border:0;padding:0;">
             <input type="checkbox" name="chk15" id="item15" value="pasangkee" class="hidden" autocomplete="off">
    @endif
           </label>
         </div>
         <div class="col-xs-3">
    @if($girls->pema)
           <label class="btn btn-success" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/pema.png" alt="..." class="img-thumbnail nf-img-check nf-checked" style="border:0;padding:0;">
    @else
           <label class="btn btn-primary" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/pema.png" alt="..." class="img-thumbnail nf-img-check" style="border:0;padding:0;">
             <input type="checkbox" name="chk16" id="item16" value="pema" class="hidden" autocomplete="off">
    @endif
           </label>
         </div>
         <div class="col-xs-3">
    @if($girls->pemma)
           <label class="btn btn-success" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/pema-2.png" alt="..." class="img-thumbnail nf-img-check nf-checked" style="border:0;padding:0;">
    @else
           <label class="btn btn-primary" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/pema-2.png" alt="..." class="img-thumbnail nf-img-check" style="border:0;padding:0;">
             <input type="checkbox" name="chk17" id="item17" value="pemma" class="hidden" autocomplete="off">
    @endif
           </label>
         </div>
         <div class="col-xs-3">
    @if($girls->renu)
           <label class="btn btn-success" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/renu.png" alt="..." class="img-thumbnail nf-img-check nf-checked" style="border:0;padding:0;">
    @else
           <label class="btn btn-primary" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/renu.png" alt="..." class="img-thumbnail nf-img-check" style="border:0;padding:0;">
             <input type="checkbox" name="chk18" id="item18" value="renu" class="hidden" autocomplete="off">
    @endif
           </label>
         </div>
         <div class="col-xs-3">
    @if($girls->rinsing)
           <label class="btn btn-success" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/rinsing.png" alt="..." class="img-thumbnail nf-img-check nf-checked" style="border:0;padding:0;">
    @else
           <label class="btn btn-primary" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/rinsing.png" alt="..." class="img-thumbnail nf-img-check" style="border:0;padding:0;">
             <input type="checkbox" name="chk19" id="item19" value="rinsing" class="hidden" autocomplete="off">
    @endif
           </label>
         </div>
         <div class="col-xs-3">
    @if($girls->saraswati)
           <label class="btn btn-success" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/saraswati.png" alt="..." class="img-thumbnail nf-img-check nf-checked" style="border:0;padding:0;">
    @else
           <label class="btn btn-primary" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/saraswati.png" alt="..." class="img-thumbnail nf-img-check" style="border:0;padding:0;">
             <input type="checkbox" name="chk20" id="item20" value="saraswati" class="hidden" autocomplete="off">
    @endif
           </label>
         </div>
         <div class="col-xs-3">
    @if($girls->sonam)
           <label class="btn btn-success" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/sonam.png" alt="..." class="img-thumbnail nf-img-check nf-checked" style="border:0;padding:0;">
    @else
           <label class="btn btn-primary" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/sonam.png" alt="..." class="img-thumbnail nf-img-check" style="border:0;padding:0;">
             <input type="checkbox" name="chk21" id="item21" value="sonam" class="hidden" autocomplete="off">
    @endif
           </label>
         </div>
         <div class="col-xs-3">
    @if($girls->soyata)
           <label class="btn btn-success" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/soyata.png" alt="..." class="img-thumbnail nf-img-check nf-checked" style="border:0;padding:0;">
    @else
           <label class="btn btn-primary" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/soyata.png" alt="..." class="img-thumbnail nf-img-check" style="border:0;padding:0;">
             <input type="checkbox" name="chk22" id="item22" value="soyata" class="hidden" autocomplete="off">
    @endif
           </label>
         </div>
         <div class="col-xs-3">
    @if($girls->sunita)
           <label class="btn btn-success" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/sunita.png" alt="..." class="img-thumbnail nf-img-check nf-checked" style="border:0;padding:0;">
    @else
           <label class="btn btn-primary" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/sunita.png" alt="..." class="img-thumbnail nf-img-check" style="border:0;padding:0;">
             <input type="checkbox" name="chk23" id="item23" value="sunita" class="hidden" autocomplete="off">
    @endif
           </label>
         </div>
         <div class="col-xs-3">
    @if($girls->tashi)
           <label class="btn btn-success" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/tashi.png" alt="..." class="img-thumbnail nf-img-check nf-checked" style="border:0;padding:0;">
    @else
           <label class="btn btn-primary" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/tashi.png" alt="..." class="img-thumbnail nf-img-check" style="border:0;padding:0;">
             <input type="checkbox" name="chk24" id="item24" value="tashi" class="hidden" autocomplete="off">
    @endif
           </label>
         </div>
         <div class="col-xs-3">
    @if($girls->tenzing)
           <label class="btn btn-success" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/tenzing.png" alt="..." class="img-thumbnail nf-img-check nf-checked" style="border:0;padding:0;">
    @else
           <label class="btn btn-primary" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/tenzing.png" alt="..." class="img-thumbnail nf-img-check" style="border:0;padding:0;">
             <input type="checkbox" name="chk25" id="item25" value="tenzing" class="hidden" autocomplete="off">
    @endif
           </label>
         </div>
         <div class="col-xs-3">
    @if($girls->tenzing_paden)
          <label class="btn btn-success" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/tenzing-paden.png" alt="..." class="img-thumbnail nf-img-check nf-checked" style="border:0;padding:0;">
    @else
           <label class="btn btn-primary" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/tenzing-paden.png" alt="..." class="img-thumbnail nf-img-check" style="border:0;padding:0;">
             <input type="checkbox" name="chk26" id="item26" value="tenzing_paden" class="hidden" autocomplete="off">
    @endif
           </label>
         </div>
         <div class="col-xs-3">
    @if($girls->tsering)
           <label class="btn btn-success" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/tsering.png" alt="..." class="img-thumbnail nf-img-check nf-checked" style="border:0;padding:0;">
    @else
           <label class="btn btn-primary" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/tsering.png" alt="..." class="img-thumbnail nf-img-check" style="border:0;padding:0;">
             <input type="checkbox" name="chk27" id="item27" value="tsering" class="hidden" autocomplete="off">
    @endif
           </label>
         </div>
         <div class="col-xs-3">
    @if($girls->yangchen)
           <label class="btn btn-success" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/yangchen.png" alt="..." class="img-thumbnail nf-img-check nf-checked" style="border:0;padding:0;">
    @else
           <label class="btn btn-primary" style="padding:0; margin-bottom:10px;">
             <img src="/img/girls/yangchen.png" alt="..." class="img-thumbnail nf-img-check" style="border:0;padding:0;">
             <input type="checkbox" name="chk28" id="item28" value="yangchen" class="hidden" autocomplete="off">
    @endif
           </label>
         </div>    
       </div>


       </div>
</div>
       


       </div>
       <div class="col-sm-4" style="margin-top:21px;">

         <div class="form-group">
           <label for="email">Email</label>
           <input type="email" class="form-control" name="email" placeholder="jsmith@exapmle.com">
         </div>
    <div class="row">
    <div class="col-sm-12">
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
         <button type="submit" class="btn btn-lg btn-success">Donate</button>
       </form>
       
       </div>
       </div>

       </div>
       </section>

    @endsection