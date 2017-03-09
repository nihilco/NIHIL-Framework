@extends('layouts.master')

@section('content')

<section id="site-content">
    <div class="container">

    <div class="row">
    <div class="col-sm-12">
    <h1>Contact</h1>
    </div>
    </div>

    <div class="row">
    <div class="col-sm-6">

    <div class="row">
    <div class="col-sm-12">

    <div class="site-contact">

    <div class="row">
    <div class="col-sm-12">

                          <div class="site-contact">


    <p>
    Have questions, concerns, or comments?  Fill out the following form to contact us directly.  We want to hear from you.
    </p>

                              <div class="row">
                                  <div class="col-lg-12">
                                      <form id="contact-form" action="/web/20161103022433/http://taraloka.org/contact" method="post" role="form">
    <input type="hidden" name="_csrf" value="Qi1nRjVWRmwXHiVzAB0rMwZKKS95JRY6AVk3ckQiBTZzfy0JAD4hJQ==">                                      <div class="form-group field-contactform-name required">
    <label class="control-label" for="contactform-name">Name</label>
    <input type="text" id="contactform-name" class="form-control" name="ContactForm[name]">

    <p class="help-block help-block-error"></p>
    </div>                                      <div class="form-group field-contactform-email required">
    <label class="control-label" for="contactform-email">Email</label>
    <input type="text" id="contactform-email" class="form-control" name="ContactForm[email]">

    <p class="help-block help-block-error"></p>
    </div>                                      <div class="form-group field-contactform-body required">
    <label class="control-label" for="contactform-body">Body</label>
    <textarea id="contactform-body" class="form-control" name="ContactForm[body]" rows="6"></textarea>

    <p class="help-block help-block-error"></p>
    </div>                                       <div class="form-group">
                                              <button type="submit" class="btn btn-success btn-lg" name="contact-button">Submit</button>                                      </div>
                                      </form>                              </div>
                              </div>

                                                    </div>

                        </div>
    </div>

    </div>

    </div>
    </div>

    </div>
    <div class="col-sm-6" style="padding-top:15px;padding-bottom:10px;">

    <div class="row">
    <div class="col-xs-6">
    <address>
      <strong class="font-green">The Taraloka Foundation</strong><br>
      705 Northern Avenue<br />
    Signal Mountain, TN 37377<br />
    </address>
    </div>
    <div class="col-xs-6">
    <address>
      <strong class="font-green">The Sikkim Happiness Home</strong><br>
    Gangtok, Sikkim<br />
      India<br />
    </address>
    </div>
    </div>

    <div class="row">
    <div class="col-xs-12">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1816976.7652512228!2d88.3752781973191!3d27.19456428542012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e6a56a5805eafb%3A0x73d6132c501c8f20!2sGangtok%2C+Sikkim%2C+India!5e0!3m2!1sen!2sus!4v1408766346518" width="100%" height="450" frameborder="0" style="border:0"></iframe>
    </div>
    </div>



    </div>
    </div>


    </div>
    </section>
    
    @endsection