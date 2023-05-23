<ul class="text-center row alphapager">
    @foreach(json_decode(setting("site.$slug")) as $letter)
        <li class=" margbtm20" style="display: inline-block;">
            <a class="alphapager-button" href="/store/{{ $slug }}?char={{$letter}}">{{$letter}}</a>
        </li>
    @endforeach
</ul>
