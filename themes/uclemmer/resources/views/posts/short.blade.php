        <div class="blog-post">
             <h2 class="blog-post-title">{{ $post->title }}</h2>
<p class="blog-post-meta">by <a href="#">{{ $post->user->name }}</a> on {{ $post->published_at }}</p>

<p>{{ $post->description }}</p>
        </div><!-- /.blog-post -->