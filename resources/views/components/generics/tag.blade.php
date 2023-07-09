@props(['tag'])
<a href="{{route('posts_with_tag',['tag'=>$tag->name])}}">
    <span class="badge bg-blue-lt">#_{{$tag->name}}</span>
</a>
