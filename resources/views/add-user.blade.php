<h1>Add Members</h1>
@if(session('user'))
    <h3 style="color: green">{{session('user')['name']}} user has been added</h3>
@endif
<form action="add" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Enter Name"><br><br>
    <input type="text" name="email" placeholder="Enter Email"><br><br>
    <input type="text" name="address" placeholder="Enter Address"><br><br>
    <button type="submit">Add Member</button>
</form>
