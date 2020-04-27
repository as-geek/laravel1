<div class="menu">
    <ul>
        <li><a href="{{route('home')}}">Главная</a></li>
        <li><a href="{{route('news::rubrics')}}">Новости</a></li>
        <li><a href="{{route('news::partnerRubrics')}}">Новости партнёров</a></li>
        @guest
            <li><a href="{{route('login')}}">Вход</a></li>
            <li><a href="{{route('social::login-vk')}}">Вход через VK</a></li>
            <li><a href="{{route('register')}}">Регистрация</a></li>
        @else
            <li><a href="{{route('profile::index')}}">Профиль</a></li>
            @if(\Illuminate\Support\Facades\Auth::user()->is_admin)
                <li><a href="{{route('admin')}}">Админка</a></li>
            @endif
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ 'Выход' }}
                </a>
            </li>
        @endguest
    </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
    </form>
</div>
