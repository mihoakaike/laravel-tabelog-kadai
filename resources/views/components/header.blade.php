<nav class="navbar navbar-expand-md navbar-light shadow-sm header-container">
    
<div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
    <i class="fa-solid fa-utensils"></i>
    </a>
 
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
        <ul class="navbar-nav ms-auto mr-5 mt-2">
                 
        <!-- ゲスト -->
        @guest
            <li class="nav-item mr-5">
            <a class="nav-link" href="{{ route('register') }}">登録</a>
            </li>
            <li class="nav-item mr-5">
            <a class="nav-link" href="{{ route('login') }}">ログイン</a>
            </li>

        <!-- ログインユーザー -->
            @else
            <li class="nav-item mr-5">
            <a class="nav-link" href="{{ route('mypage') }}">
            <label>マイページ</label>
            </a>
            </li>
            
            <li class="nav-item mr-5">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            ログアウト
            </a>
 
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
            </li>
        
        @endguest
        
        </ul>
    </div>
</div>

</nav>