<div class="container">
    <div class="row">
        <div class="col-xs-6">
            <?php echo form_open(site_url('user/register'), array("class"=>"form-horizontal", "role"=>"form")) ?>
            <form class="form-horizontal" role="form">
                <h2 class="form-horizontal-heading text-center">Don't have an account?</h2>
                <p class="text-center">That's okay, everybody has to start somewhere.</p>
                <?php
                    if(validation_errors()) {
                ?>
                <div class="alert alert-danger">
                    <?php
                        echo validation_errors();
                    ?>
                </div>
                <?php
                    }
                ?>
                <?php
                    # There's an error in the username field
                    if(form_error('register-username')) {
                ?>
                <div class="form-group has-error has-feedback">
                    <label for="regInputUsername" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                <?php
                        $username_input = array(
                            'name'=>'register-username',
                            'value'=>set_value('register-username'),
                            'class'=>'form-control',
                            'id'=>'regInputUsername',
                            'placeholder'=>'Username'
                        );
                        echo form_input($username_input);
                ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                        <span class="help-block">Your username should consist of alphanumeric characters and should be between 5-30 characters in length.</span>
                    </div>
                </div>
                <?php
                    }
                    else {
                ?>
                <div class="form-group">
                    <label for="regInputUsername" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="register-username" value="<?php echo set_value('register-username')?>" id="regInputUsername" placeholder="Username"/>
                        <span class="help-block">Your username should consist of alphanumeric characters and should be between 5-30 characters in length.</span>
                    </div>
                </div>
                <?php
                    }
                    
                    # Check if the email field is all wrong
                    if(form_error('register-email')) {
                ?>
                <div class="form-group has-error has-feedback">
                    <label for="regInputEmail" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                <?php
                        $email_input = array(
                            'name'=>'register-email',
                            'value'=>set_value('register-email'),
                            'class'=>'form-control',
                            'id'=>'regInputEmail',
                            'placeholder'=>'Email'
                        );
                        echo form_input($email_input);
                ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                    <span class="help-block">You better use your own email address here! We'll be using it to verify your registration.</span>
                    </div>
                </div>
                <?php
                    }
                    else {
                ?>
                <div class="form-group">
                    <label for="regInputEmail" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="register-email" value="<?php echo set_value('register-email') ?>" id="regInputEmail" placeholder="Email"/>
                        <span class="help-block">You better use your own email address here! We'll be using it to verify your registration.</span>
                    </div>
                </div>
                <?php
                    }
                    if(form_error('register-password') or
                       form_error('register-passwordconf')) {
                ?>
                <div class="form-group has-error has-feedback">
                    <label for="regInputPassword" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                <?php
                        $password_input = array(
                            'name'=>'register-password',
                            'class'=>'form-control',
                            'id'=>'regInputPassword',
                            'placeholder'=>'Password'
                        );
                        $passwordconf_input = array (
                            'name'=>'register-passwordconf',
                            'class'=>'form-control',
                            'id'=>'regInputRepeatPassword',
                            'placeholder'=>'Repeat Password'
                        );
                        echo form_password($password_input);
                        echo form_password($passwordconf_input);
                ?>
                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                        <span class="help-block">Please use a real password. "password" isn't going to cut it.</span>
                    </div>
                </div>
                <?php
                    }
                    else {
                ?>
                <div class="form-group">
                    <label for="regInputPassword" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="register-password" id="regInputPassword" placeholder="Password"/>
                    <label for="regInputRepeatPassword" class="col-sm-2 control-label"></label>
                        <input type="password" class="form-control" name="register-passwordconf" id="regInputRepeatPassword" placeholder="Repeat Password"/>
                        <span class="help-block">Please use a real password. "password" isn't going to cut it.</span>
                    </div>
                </div>
                <?php
                    }
                ?>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Register!</button>
            </form>
        </div>
        <div class="col-xs-6">
            <h2>ShounenWatch Terms and Conditions</h2>
            <p>By registering for a badass account here at ShounenWatch, you hereby and are forcibly bound to agree to the following:</p>
            <ul>
                <li>You can only upload shounen anime to the service.</li>
                <li>You cannot upload anime that aren't shounen enough.</li>
                <li>You can upload anime that are one or more genres <strong>AND</strong> shounen. Wanna upload an ecchi-shounen-<i>whateverthefuck</i> anime? Sure, whatever floats your boat!</li>
                <li>You don't technically "own" the anime you submit, they're owned by whoever made them. You're just submitting them here to the database.</li>
                <li>If someone already submitted the anime you were about to submit, and their submission is clean and nice enough, don't bother uploading! Otherwise, report their sloppy submission and upload your own (hopefully it's better than theirs).</li>
                <li><strong>DO NOT post misleading, forged or outright wrong information.</strong> A squad of eagle-eyed badasses are looking out for violators of this rule.</li>
                <li>We badasses don't necessarily like nice people, but we don't like assholes even less! So don't be an asshole!</li>
            </ul>
            </br>
            <p>If you don't follow these rules, we're gonna find you and fuck your shit up! And that's a guarantee!</p>
        </div>
    </div>
</div>