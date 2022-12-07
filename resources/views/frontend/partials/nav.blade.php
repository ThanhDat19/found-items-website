<nav class="menu">
    <div class="container">
        <div class="brand">
            <a href="#">
                <h4>Company</h4>
            </a>
        </div>
        <div class="mobile-toggle">
            <a href="#" data-toggle="menu" data-target="#menu-list"><i class="ion-navicon-round"></i></a>
        </div>
        <div class="mobile-toggle">
            <a href="#" data-toggle="sidebar" data-target="#sidebar"><i class="ion-ios-arrow-left"></i></a>
        </div>
        <div id="menu-list">
            <ul class="nav-list">
                <li class="for-tablet nav-title"><a>Menu</a></li>
                <li class="for-tablet"><a href="login.html">Login</a></li>
                <li class="for-tablet"><a href="register.html">Register</a></li>

                @php
                    $categories = App\Models\Category::where('active', 1)
                        ->orderByDesc('id')
                        ->get();
                @endphp
                @foreach ($categories as $category)
                    <li>
                        <a href="/posts/{{ $category->slug }}">{{ $category->name }}<i
                                class="ion-ios-arrow-right"></i></a>
                    </li>
                @endforeach
                @if (Auth::user())
                    <li class="dropdown magz-dropdown">
                        <a id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                            <i class="ion-ios-arrow-right"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                {{ __('Đăng xuất') }}
                            </a>
                            <a class="dropdown-item" href="/profile/edit/{{ Auth::user()->id }}">
                                Thông tin cá nhân
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('posts-list', ['id' => Auth::user()->id] ) }}">Quản lý bài đăng<i class="ion-ios-arrow-right"></i></a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
