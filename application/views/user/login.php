<div class="container" style="max-width: 640px">
	<?php
		# Show an alert here if user submitted wrong credentials
		if($invalid) {
	?>
	<div class="alert alert-danger"><strong>Invalid username and/or password.</strong> Please try again.</div>
	<?php
		}
	?>
	<div class="row">
		<?php echo form_open(site_url('user/login'), array("class"=>"form-signin", "role"=>"form")) ?>
		  <h2 class="form-signin-heading text-center">Sign in to continue</h2>
		  <p class="text-center">Don't have an account? <a href="<?php echo site_url('user/register') ?>">Why not register for one?</a></p>
		  <input type="text" class="form-control" name="login-username" placeholder="Username" required autofocus>
		  <input type="password" class="form-control" name="login-password" placeholder="Password" required>
		  <label for="login-remember" class="checkbox">
			<input type="checkbox" name="login-remember" value="remember-me"> Remember Me
		  </label>
		  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		</form>
	</div>
</div>