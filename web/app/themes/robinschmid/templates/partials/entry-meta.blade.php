<div class="post-meta">
    <time class="postmeta__updated" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>
    <span class="postmeta__author vcard">
        {{ __('von', 'sage') }} <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn">
        {{ get_the_author() }}
        </a>
    </span>
</div>
<div class="post-cats">
    @foreach(get_the_category() as $cat)
        <span class="post-cats__label">
            {{$cat->name}}
        </span>
    @endforeach
</div>
