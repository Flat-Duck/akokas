<div class="card mb-4">
    {{-- <x-generics.post_header link="{{$post->cover_image}}" /> --}}
    <div class="card-header">
        <div>
            <div class="row align-items-center">
                <div class="col-auto">
                    <x-user.avatar user="{{$post->user}}" />
                </div>
                <div class="col">
                    <div class="card-title">{{$post->user->name}}</div>
                    <div class="card-subtitle">{{$post->user->email}}</div>
                </div>
            </div>
        </div>
        <div class="card-actions">
            <div class="dropdown">
                <a href="#" class="btn-action dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path><path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path><path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path></svg>
                </a>
                <div class="dropdown-menu dropdown-menu-end" style="">
                    {{-- <a class="dropdown-item" href="#">Edit user</a>
                    <a class="dropdown-item" href="#">Change permissions</a>
                    <a class="dropdown-item text-danger" href="#">Delete user</a> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="card-body  text-truncate" style="max-height: 300rem;">
        <img src="{{$post->screen}}">
        {{-- <a href="{{route('posts.show',['post'=>$post->id])}}"> <h1 class="card-title">{{ $post->title }}</h1></a> --}}
        {{-- {!! $post->content !!} --}}
    </div>
    <div class="card-footer d-flex align-items-center">
        <div class="row align-items-center">
            <livewire:comments :model="$post" />
            {{-- <x-card.footer-user-counter :users="$post->commenters()" /> --}}
        </div>
      </div>

</div>
