@php
    $background_image = "style=\"background-image: url('".get_field('background-image', 'options')."');\"";
@endphp
<div class="topline">
    <div class="container">
        @if (has_nav_menu('secondary_navigation'))
            {!! wp_nav_menu(['theme_location' => 'secondary_navigation', 'menu_class' => 'nav-sec__list', 'container' => 'nav', 'container_class' => 'nav-sec']) !!}
        @endif

        {!! get_search_form(false) !!}
    </div>
</div>
<header class="banner" {!! $background_image or "" !!}>
      <button type="button" id="navigation-toggle" class="button-toggle collapsed-js"
            data-target="#navbar-collapse-primary">
        <span class="sr-only">Toggle navigation</span>
        <span class="button-toggle__bar button-toggle__bar--top"></span>
        <span class="button-toggle__bar button-toggle__bar--mid"></span>
        <span class="button-toggle__bar button-toggle__bar--bottom"></span>
    </button>
    <nav id="navbar-collapse-primary" class="nav-primary hide-overlay-js">
        <div class="container">
            @if (has_nav_menu('primary_navigation'))
                {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav-prim__list', 'container' => 'nav', 'container_class' => 'nav-prim']) !!}
            @endif
        </div>
    </nav>

</header>
