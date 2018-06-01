<form id="form1" name="form1" method="post">
<fieldset>
<legend>訂購人</legend>
<p>
<label for="user">姓名:</label>
<input type="text" name="user" id="user">
</p>
<p>
<label for="email">Email:</label>
<input type="email" name="email" id="email">
</p>
</fieldset>

<button type="button" onClick="formcheck()">同訂購人</button>

<fieldset>
<legend>收件人</legend>
<p>
<label for="user2">姓名:</label>
<input type="text" name="user2" id="user2">
</p>
<p>
<label for="email2">Email:</label>
<input type="email" name="email2" id="email2">
</p>
</fieldset>
<input type="submit" value="送出">
<button onClick="history.back()">&larr;</button>
</form>


<script>
function formcheck(){
var user_element=document.getElementById("user");
var user=user_element.value;
var email_element=document.getElementById("email");
var email=email_element.value;

document.form1.user2.value=user;
document.form1.email2.value=email;
}
</script>