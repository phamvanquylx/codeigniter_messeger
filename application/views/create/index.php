		<div class="main-content">
			<div class="create_user">
				<h1><?= $titlePage; ?></h1>
				<form action="<?= base_url() ?>Create_account" method="post">
                    <?php if(validation_errors() !== ''){ ?>
                        <div class="s-alert s-alert--danger">
                            <div class="s-alert__text">
                                <h3>Error</h3>
                                <span><?php echo validation_errors(); ?></span>
                            </div>
                        </div>
                    <?php } else if($this->session->flashdata('msg')){ ?>
                        <div class="s-alert s-alert--success">
                            <div class="s-alert__text">
                                <h3>Successful</h3>
                                <p><?php echo $this->session->flashdata('msg'); ?></p>
                            </div>
                        </div>
                	<?php } ?>                    
					<div class="s-form-control">
						<label for="user_account">Account</label>
						<input type="text" name="user_account" class="s-input-form" id="user_account">
					</div>
					<div class="s-form-control">
						<label for="user_password">Password</label>
						<input type="password" name="user_password" class="s-input-form" id="user_password">
					</div>
					<div class="s-form-control section">
						<label>Password</label>
						<select name="status_user">
							<option value="2">User</option>
							<option value="1">Admin</option>
							<option value="0">Close</option>
						</select>
					</div>
					<div class="s-form-control text-center">
						<input type="submit" value="Save" class="s-btn-form">
						<input type="reset" value="Reset" class="s-btn-form">
					</div>
				</form>
			</div>
		</div>
