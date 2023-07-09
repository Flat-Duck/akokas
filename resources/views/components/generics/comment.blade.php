<div class="card card-borderless bg-transparent col-1" style="width:5.33%;">
    @livewire('vote',[$comment])
</div>

<div class="card card-borderless col-11" style="padding-left: 0px; padding-right:0px">
    @if ($comment->isApproved())
        <x-generics.approved-padge />
    @endif

    <div class="card-header">
        <a href="#" class="nav-link d-flex lh-1 text-reset p-0">
            <x-user.avatar />
            <div class="d-none d-xl-block ps-2">
                <h3 class="card-title">{{ $comment->creator->name }}
                    <span class="card-subtitle">{{ $comment->created_at->diffForHumans()}}</span>
                </h3>
            </div>
        </a>
    </div>
    <div class="card-body">
        {!! $comment->body !!}
    </div>
    <div class="card-footer mt-auto"  x-data="{ show: false }">
        <div class="d-flex row" >
            <div class="btn-list justify-content-start">
                <button class="btn" @click="show = true">
                    Reply <i class="ti ti-message-circle"></i>
                </button>
            </div>
        </div>

        <textarea x-show="show" id="content" class="form-control my-3" rows="3"></textarea>

        <div x-show="show" >
            <div class="d-flex">
                <button class="btn btn-link link-defualt" @click="show = false">Cancel</button>
                <button class="btn btn-primary" id="submit">Reply</button>
            </div>
        </div>

        @foreach ($comment->children as $reply)
        <div class="card card-active mt-2 mb-2">
            <div class="card-body">
                <h3 class="card-title">{{ $reply->creator->name }}
                    <span class="card-subtitle">{{ $reply->created_at->diffForHumans()}}</span>
                </h3>
                {!!$reply->body !!}
            </div>
        </div>
        @endforeach
    </div>
</div>
