<x-header data="User Component Header" />
<h1>Hello users</h1>

@if($user == "rooh")
    <h3>Hi {{$user}}</h3>
@elseif($user == "khan")
    <h3>Hello {{$user}}</h3>
@else
    <h3>Unknown User</h3>
@endif
@foreach($users as $user)
    <h4>{{$user}}</h4>
@endforeach
