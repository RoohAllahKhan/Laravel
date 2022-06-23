<h1>Members List</h1>
@if(session('user'))
    <h3 style="color: green">{{session('user')['name']}} user has been deleted succesfully</h3>
@endif
<table border="1">
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Email</td>
        <td>Address</td>
        <td>Operation</td>
    </tr>
    @foreach($members as $member)
    <tr>
        <td>{{$member['id']}}</td>
        <td>{{$member['name']}}</td>
        <td>{{$member['email']}}</td>
        <td>{{$member['address']}}</td>
        <td><a href={{"delete/".$member['id']}}>Delete</a></td>
    </tr>
    @endforeach
</table>
<span>
    {{$members->links()}}
</span>
<style>
    .w-5{
        display: none;
    }
</style>
