<h1>User Login</h1>
<form action="users" method="post">
    @csrf
    <input type="text" name="username" placeholder="Enter user id"> <br><br>
    <input type="password" name="userpassword" placeholder="Enter user password here">
    <button type="submit">Login</button>
</form>
