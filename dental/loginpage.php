
<div class="outer">
<div class="wrap">
<h2 class="title" style="">เข้าสู่ระบบ</h2>
<form action="login.php" method="post" class="form">

<p><label class="label" for="email">อีเมล์:</label>
<input id="email" type="text" name="email" size="30" maxlength="60" 
value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" > </p>

<p><label class="label" for="password">รหัสผ่าน:</label>
<input id="psword" type="password" name="password" size="30" maxlength="60" 
value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" > 

<p><input id="submit" type="submit" name="submit" value="ยืนยัน"></p>
</form>

</div>
</div>


