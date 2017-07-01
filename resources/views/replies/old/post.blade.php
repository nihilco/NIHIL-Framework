                            <div class="panel">
                                 @if(false)
                                 <a href="/posts/{{ $post->id }}">
                                  <img src="" class="img-responsive">
                               </a>
                                 @else
                                                                  <a href="/posts/{{ $post->id }}">
                               <div class="panel-body bg-<?php $items = ['primary', 'purple', 'green', 'pink', 'warning', 'success', 'info', 'inverse']; echo $items[array_rand($items)]; ?>">
                                 <h3 class="mv-lg">{{ $post->title }}</h3>
                               </div>
</a>
                                 @endif

                               <div class="panel-body">
                                  <p class="clearfix">
                                     <span class="pull-left">
                                 <small class="mr-sm">By <a href="">{{ $post->user->name }}</a>
                                        </small>
<small class="mr-sm">{{ $post->created_at->toFormattedDateString() }}</small>
                                     </span>
                                     <span class="pull-right">
                                        <small>
                                 <strong>0</strong>
                                           <span>Comments</span>
                                        </small>
                                     </span>
                                  </p>
                                 @if(false)
<h4> <a href="/post/{{ $post->id }}">{{ $post->title }}</a>
                                 @endif
                                  </h4>
{{ $post->description }}
                               </div>
                            </div>