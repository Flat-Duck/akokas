<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
            <div class="container-xl">
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item  ">
                            <a class="nav-link" href="{{ route('home') }}" >
                                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                                </span>
                                <span class="nav-link-title">
                                    {{ __('Home') }}
                                </span>
                            </a>
                        </li>
                            {{-- @can('view-any', App\Models\User::class)
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('users.index') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="ti ti-users" ></i>
                                        </span>
                                        <span class="nav-link-title">
                                            Home
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Post::class)
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('posts.index') }}">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <i class="ti ti-users" ></i>
                                        </span>
                                        <span class="nav-link-title">
                                            Posts
                                        </span>
                                    </a>
                                </li>
                            @endcan --}}
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</div>
