<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-light" style="background-color:#add8e6">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/"><i class="fas fa-dove"></i>&nbsp;&nbsp;Microposts</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    {{-- ユーザ一覧ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('users.index', 'Users', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            {{-- ユーザ詳細ページへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('users.show', 'My page', ['user' => Auth::id()])!!}</li>
                            <li class="dropdown-divider"></li>
                            {{-- favoriteへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('users.favorites', 'Favorites', ['id' => Auth::id()])!!}</li>
                            <li class="dropdown-divider"></li>
                            {{-- settingへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('users.edit', 'Profile', ['user' => Auth::id()])!!}</li>
                            <li class="dropdown-divider"></li>
                            {{-- ログアウトへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'Logout') !!}</li>
                        </ul>
                    </li>
                @else
                    {{-- ユーザ登録ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>
