<footer class="content-info">

    <div class="container">

        <div class="row">

            <address class="col-12 col-sm-6 col-md-3 address">
                {!! apply_filters('content', get_field('footer-address', 'options')) !!}
            </address>

            <div class="col-12 col-sm-6 col-md-6">
                <ul class="socialmedia">
                    @foreach(get_field('social-media-repeater', 'options') as $socialmedia)
                        <li class="socialmedia__el">
                            <a href="{{$socialmedia['social-url']}}" class="fa-stack fa-2x socialmedia__link">
                                <i class="fa fa-circle fa-stack-2x socialmedia__circle"></i>
                                <i class="fa fa-stack-1x fa-{{$socialmedia['social-type']}} socialmedia__icon"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-12">
                <div class="mobile-nav">
                    @if (has_nav_menu('secondary_navigation'))
                        {!! wp_nav_menu(['theme_location' => 'secondary_navigation', 'menu_class' => 'nav-sec__list', 'container' => 'nav', 'container_class' => 'nav-sec']) !!}
                    @endif
                    {!! get_search_form(false) !!}
                </div>
            </div>

        </div>

    </div>

</footer>
