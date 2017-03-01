@extends('layouts.admin')

@section('content')
<!-- Main section-->
          <section>
         <!-- Page content-->
                      <div class="content-wrapper">
                <div class="row">
                   <!-- Blog Content-->
                   <div class="col-lg-9">
                      <div class="panel panel-default">
                         <div class="panel-heading">
                            <div class="bb">
    <h2 class="text-lg">{{ $post->title }}</h2>
                               <p class="clearfix">
                                  <span class="pull-left">
    <small class="mr-sm">By <a href="">{{ $post->user->name }}</a>
                                     </small>
<small class="mr-sm">{{ $post->created_at->toFormattedDateString() }}</small>
                                     <small>
                                        <strong>0</strong>
                                        <span>Comments</span>
                                     </small>
                                  </span>
                               </p>
                            </div>
                         </div>
                         <div class="panel-body text-md">
{{ $post->content }}
                            <hr>
                            <div role="group" aria-label="..." class="btn-group">
                               <button type="button" class="btn btn-default">
                                  <em class="fa fa-facebook text-muted"></em>
                               </button>
                               <button type="button" class="btn btn-default">
                                  <em class="fa fa-twitter text-muted"></em>
                               </button>
                               <button type="button" class="btn btn-default">
                                  <em class="fa fa-google-plus text-muted"></em>
                               </button>
                               <button type="button" class="btn btn-default">
                                  <em class="fa fa-tumblr text-muted"></em>
                               </button>
                               <button type="button" class="btn btn-default">
                                  <em class="fa fa-pinterest text-muted"></em>
                               </button>
                               <button type="button" class="btn btn-default">
                                  <em class="fa fa-share-alt text-muted"></em>
                               </button>
                            </div>
                         </div>
                      </div>
                      <div class="panel">
                         <div class="panel-heading">3 Comments</div>
                         <div class="panel-body">
                            <div class="media">
                               <div class="media-left">
                                  <a href="#">
                                     <img src="img/user/01.jpg" class="media-object img-circle thumb64">
                                  </a>
                               </div>
                               <div class="media-body">
                                  <h4 id="media-heading" class="media-heading"><a href="">Susan Grant</a>
                                     <small>10 min</small>
                                     <a href="#media-heading" class="anchorjs-link">
                                        <span class="anchorjs-icon"></span>
                                     </a>
                                  </h4>
    <p>Donec ac massa tortor. In hac habitasse platea dictumst. Nam blandit fringilla faucibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae nisi eget metus semper congue.</p>
    <p>Fusce ullamcorper placerat tortor, placerat consequat diam cursus posuere.</p>
                               </div>
                            </div>
                            <hr>
                            <div class="media">
                               <div class="media-left">
                                  <a href="#">
                                     <img src="img/user/03.jpg" class="media-object img-circle thumb64">
                                  </a>
                               </div>
                               <div class="media-body mb-lg">
                                  <h4 id="media-heading" class="media-heading"><a href="">Dustin Dunn</a>
                                     <small>20 min</small>
                                     <a href="#media-heading" class="anchorjs-link">
                                        <span class="anchorjs-icon"></span>
                                     </a>
    </h4>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec
                                  lacinia congue felis in faucibus.
                                  <hr>
                                  <div class="media">
                                     <div class="media-left">
                                        <a href="#">
                                           <img src="img/user/06.jpg" class="media-object img-circle thumb64">
                                        </a>
                                     </div>
                                     <div class="media-body">
                                        <h4 id="nested-media-heading" class="media-heading"><a href="">Marcus Gomez</a>
                                           <small>1 hour</small>
                                           <a href="#nested-media-heading" class="anchorjs-link">
                                              <span class="anchorjs-icon"></span>
                                           </a>
                                        </h4>Integer ac nisl et urna gravida malesuada. Vivamus fermentum libero vel felis aliquet interdum.</div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="panel">
                         <div class="panel-heading">
                            <em class="fa fa-pencil mr"></em>Add your Comment</div>
                         <div class="panel-body">
                            <form action="/" class="form-horizontal">
                               <div class="form-group">
                                  <div class="col-xs-12">
                                     <textarea id="post-comment" name="post-comment" rows="4" placeholder="Comment here.." class="form-control"></textarea>
                                  </div>
                               </div>
                               <div class="form-group">
                                  <div class="col-xs-12">
                                     <button type="submit" class="btn btn-effect-ripple btn-primary">Send Comment</button>
                                  </div>
                               </div>
                            </form>
                         </div>
                      </div>
                   </div>
                   <!-- Blog Sidebar-->
                   <div class="col-lg-3">
                      <!-- Search-->
                      <div class="panel panel-default">
                         <div class="panel-heading">Search</div>
                         <div class="panel-body">
                            <form class="form-horizontal">
                               <div class="input-group">
                                  <input type="text" placeholder="Search for..." class="form-control">
                                  <span class="input-group-btn">
                                     <button type="button" class="btn btn-default">
                                        <em class="fa fa-search"></em>
                                     </button>
                                  </span>
                               </div>
                            </form>
                         </div>
                      </div>
                      <!-- Categories-->
                      <div class="panel panel-default">
                         <div class="panel-heading">Categories</div>
                         <div class="panel-body">
                            <ul class="list-unstyled">
                               <li>
                                  <a href="">
                                     <em class="fa fa-angle-right fa-fw"></em>Smartphones</a>
                               </li>
                               <li>
                                  <a href="">
                                     <em class="fa fa-angle-right fa-fw"></em>Mobiles</a>
                               </li>
                               <li>
                                  <a href="">
                                     <em class="fa fa-angle-right fa-fw"></em>Tech</a>
                               </li>
                               <li>
                                  <a href="">
                                     <em class="fa fa-angle-right fa-fw"></em>Inpiration</a>
                               </li>
                               <li>
                                  <a href="">
                                     <em class="fa fa-angle-right fa-fw"></em>Workspace</a>
                               </li>
                            </ul>
                         </div>
                      </div>
                      <!-- Tag Cloud-->
                      <div class="panel panel-default">
                         <div class="panel-heading">Tag Cloud</div>
                         <div class="panel-body">
                            <div id="jqcloud" class="center-block"></div>
                         </div>
                      </div>
                      <!-- Ads-->
                      <div class="panel panel-default">
                         <div class="panel-heading">Ads</div>
                         <div class="panel-body">
                            <a href="">
                               <img src="img/mockup.png" class="img-responsive img-thumbnail">
                            </a>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </section>
    
@endsection