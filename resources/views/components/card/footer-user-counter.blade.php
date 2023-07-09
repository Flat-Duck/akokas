<div class="col-auto ms-auto">
    <div class="avatar-list avatar-list-stacked">
        @foreach ([0,1,2,3,4] as $i)
            @if (isset($users[$i]))
                <x-user.avatar class="avatar-sm rounded" :user="$users[$i]" />   
            @endif
        @endforeach
        @if(count($users) - 4 > 0)
        <span class="avatar avatar-sm rounded">+{{$users->count() - $i}}</span>
        @endif
    </div>
</div>