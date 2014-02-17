<div class="container">
	<?php
		# Show an alert here if user submitted wrong credentials
		if($invalid) {
	?>
	<div class="alert alert-danger"><strong>Invalid username and/or password.</strong> Please try again.</div>
	<?php
		}
	?>
	<div class="row">
		<?php echo form_open(site_url('user/login'), array("class"=>"form-signin text-center col-md-offset-4 col-md-4", "role"=>"form")) ?>
		  <h2 class="form-signin-heading text-center">Sign in to continue</h2>
		  <p>Don't have an account? <a href="<?php echo site_url('user/register') ?>">Why not register for one?</a></p>
		  <div class="input-group">
			<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
			<input type="text" class="form-control" name="login-username" placeholder="Username" required autofocus>
		  </div>
		  <div class="input-group">
			<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
			<input type="password" class="form-control" name="login-password" placeholder="Password" required>
		  </div>
		  <div class="form-actions">
			<button class="btn btn-primary pull-center" type="submit">Sign in</button>
		  </div>
		</form>
	</div>
</div>