<article @php(post_class())>
  <header>
    <h2 class="post__title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>
    @include('partials/entry-meta')
  </header>
  <div class="post__summary">
    @php(the_excerpt())
  </div>
</article>
