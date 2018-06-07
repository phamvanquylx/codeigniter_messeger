			<div class="main-content">
				<div class="user-list">
					<div class="user-list__body">
						<div class="user-list__info">
							<form action="<?= base_url('My_profile') ?>" method="post">
								<?php if(validation_errors() !== '') { ?>
									<div class="s-alert s-alert--air">
										<?php echo validation_errors(); ?>
									</div>
								<?php } ?>								
								<div class="user-list__upload-image text-center">
									<div class="upload-image__old">
										<img src="<?= base_url(); ?>vendor/images/avatar.png" alt="sdfsdf">
									</div>
									<div class="s-form-control">
										<input type="file" name="profile_images" class="s-btn-upload" id="" accept="image/gif, image/jpeg, image/png, image/jpg">
									</div>
								</div>
								<div class="user-list__input">
									<div class="s-form-control">
										<label for="">Name</label>
										<input type="text" name="user_account" class="s-input-form" value="<?= $admin_login->name; ?>">
									</div>
									<div class="s-form-control">
										<label for="">Account</label>
										<input type="text" name="user_about_me" class="s-input-form" value="<?= $admin_login->account; ?>" disabled>
									</div>
									<div class="s-form-control">
										<label for="">Password</label>
										<input type="password" name="user_password" class="s-input-form" placeholder="*********">
									</div>
									<div class="s-form-control">
										<label for="">Email</label>
										<input type="text" name="user_email" class="s-input-form" value="<?= $admin_login->email; ?>" disabled>
									</div>
									<div class="s-form-control text-center">
										<input type="submit" value="Save" class="s-btn-form">
										<input type="reset" value="Reset" class="s-btn-form">
									</div>	
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>