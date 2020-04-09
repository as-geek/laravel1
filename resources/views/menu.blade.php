<div class="menu">
    <ul>
        <li><a href="{{route('home')}}">Главная</a></li>
        <li><a href="{{route('news::rubrics')}}">Новости</a></li>
        @guest
            <li><a href="{{route('login')}}">Вход</a></li>
            <li><a href="{{route('register')}}">Регистрация</a></li>
        @else
            <li><a href="{{route('profile::index')}}">Профиль</a></li>
            <li><a href="{{route('admin')}}">Админка</a></li>
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
