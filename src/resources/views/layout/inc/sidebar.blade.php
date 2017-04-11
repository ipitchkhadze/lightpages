<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/vendor/lightpages/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <li class="active"><a href="{{route('pages.index')}}"><i class="fa fa-file-text-o"></i> <span>{{ trans('lightpages::lightpages.menu_link_pages') }}</span></a></li>     
            <li class="active"><a href="{{route('lang.index')}}"><i class="fa fa-language"></i> <span>{{ trans('lightpages::lightpages.menu_link_lang') }}</span></a></li>     
        </ul>
    </section>
</aside>

