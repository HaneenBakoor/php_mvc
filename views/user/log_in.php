<h1>log_in</h1>
<form method="post" action="?action=log_in">
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name"value="<?php if (isset($_COOKIE["user"])){echo $_COOKIE["user"];}?>">
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email"value="<?php if (isset($_COOKIE["email"])){echo $_COOKIE["email"];}?>">
    </div>
    <input type="checkbox" name="remember" value="REMEMBER ME">

    <button>Log_In</button>
</form>
