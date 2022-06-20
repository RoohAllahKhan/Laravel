<h1>User Login</h1>
<form action="users" method="post">
    @csrf
    <input type="text" name="username" placeholder="Enter user id" value='{{old("username")}}'> <br>
    <span style="color: red; font-size: 12px">@error('username'){{$message}}@enderror</span><br>
    <input type="password" name="userpassword" placeholder="Enter user password here" value='{{old("userpassword")}}'><br>
    <span style="color: red; font-size: 12px">@error('userpassword'){{$message}}@enderror</span><br><br>
    <button type="submit">Login</button>
</form>
