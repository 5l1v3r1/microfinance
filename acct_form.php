<form method="post" action="">
  <div class="form-group">
<label for="acct_name">Account Name</label>
<input type="text" name="acct_name" class="form-control" id="acct_name" placeholder="Account Name">
</div>
<div class="form-group">
<label for="emp_id">Employee ID</label>
<input type="text" name="emp_id" class="form-control" id="emp_id" placeholder="Employee ID">
</div>
<div class="form-group">
<label for="acct_type">Account Type</label>
<select name="acct_type" class="form-control" id="acct_type">
<option value="1">
  Thrift Account
</option>
<option value="2">
  Special Account
</option>
</select>
</div>
<div class="form-group">
  <input type="submit" class="btn btn-primary" value="Create Account">
</div>
</form>