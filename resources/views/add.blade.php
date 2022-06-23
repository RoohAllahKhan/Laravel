<h1>Add Member</h1>
@if(session('user'))
    <h3 style="color: green">{{session('user')}} user has been added</h3>
@endif
<form action="add-member" method="POST">
    @csrf
    <input type="text" name="user" placeholder="Enter user name"><br><br>
    <input type="password" name="password" placeholder="Enter User password"><br><br>
    <input type="text" name="email" placeholder="Enter User email"><br><br>
    <button>Add Member</button>
</form>
