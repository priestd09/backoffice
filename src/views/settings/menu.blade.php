<ul class="nav nav-sidebar">
  @foreach ($groups as $group)
  <li class="{{Request::is($group['url'])?'active':''}}"><a href="{{url($group['url'])}}">{{$group['name']}}</a></li>
  @endforeach
</ul>