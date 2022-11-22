
    <div class="firstbar">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <div class="brand">
                        <a href="/">
                            <h4>Company</h4>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <form class="search" autocomplete="off">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="q" class="form-control"
                                    placeholder="Type something here">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary"><i class="ion-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                @if (Route::has('login'))
                    <div class="col-md-3 col-sm-12 text-right">
                        <ul class="nav-icons">
                            @auth
                            @else
                                <li>
                                    <a href="{{ route('login') }}"><i class="ion-person"></i>
                                        <div>Đăng nhập</div>
                                    </a>

                                </li>
                                <li>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}"><i class="ion-person-add"></i>
                                            <div>Đăng ký</div>
                                        </a>
                                    @endif
                                </li>
                            @endauth
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
