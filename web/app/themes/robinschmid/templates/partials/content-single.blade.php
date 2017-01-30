<article @php(post_class())>
  <header>
    <h1 class="post__title">{{ get_the_title() }}</h1>
    @include('partials/entry-meta')
  </header>
  <div class="post__content">
    @php(the_content())
  </div>
  <footer>
    {!! wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  @php(comments_template('/templates/partials/comments.blade.php'))
</article>
