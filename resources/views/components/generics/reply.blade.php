<div class="card card-active mt-2 mb-2">
    <div class="card-body">
        <h3 class="card-title">{{ $reply->creator->name }}
            <span class="card-subtitle">{{ $reply->created_at->diffForHumans()}}</span>
        </h3>
        {!!$reply->body !!}
    </div>
</div>
