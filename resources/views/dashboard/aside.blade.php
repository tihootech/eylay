<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="{{asset('img/logo.png')}}" alt="Eylay">
        <div>
            <p class="app-sidebar__user-name">{{auth()->user()->name}}</p>
            <p class="app-sidebar__user-designation"> داشبورد شما </p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item @if(rn() == 'dashboard') active @endif" href="{{route("dashboard")}}">
                <i class="ml-2 material-icons">dashboard</i>
                <span class="app-menu__label">داشبورد</span>
            </a>
        </li>

        @include('dashboard.panel')

    </ul>
</aside>
