			<div class="main-content">
				<div class="user-chatbox">
					<div class="user-chatbox__body">
						<div class="user-chatbox__id">
							<img src="<?= base_url(); ?>vendor/images/avatar.png" alt="sdfsdf" class="users-list__images">
							<span class="users-list__name"><?= $userFriend->name; ?></span>
							<span class="users-list__status offline">offline</span>							
						</div>
						<div class="user-chatbox__content">
							<div class="today_chat text-center">
								<span><?= date("d F Y") ?></span>
							</div>						
							<div class="user-chatbox__messenger s-messenger">
							<?php

							if($messenger){
								$data_messenger = json_decode($messenger->content);
								$id 			= $_SESSION['user_login']['id'];
								foreach ($data_messenger as $value) {
									if($value->i_id == $id)
									{
							?>
								<div class="s-messenger__wrapper">
									<div class="m-messenger__message messenger-send">
										<div class="m-messenger__text">
											<?= $value->content; ?>
										</div>
									</div>
									<div class="s-messenger__time">
										<span><?= date("H:i",$value->time); ?></span>
									</div>									
								</div>
							<?php
									}else{
							?>
								<div class="s-messenger__wrapper">
									<div class="m-messenger__message messenger-receive">
										<div class="m-messenger__avata">
											<img src="<?= base_url(); ?>vendor/images/avatar.png" alt="sdfsdf" class="users-list__images">
										</div>
										<div class="m-messenger__text">
											<?= $value->content; ?>
										</div>
									</div>
									<div class="s-messenger__time">
										<span><?= date("H:i",$value->time); ?></span>
									</div>
								</div>
							<?php
									}
								}
							}
							?>
							</div>

							<div class="user-chatbox__input">
								<form action="" method="post">
									<textarea class="btn-send__content" placeholder="Send..." data-id-send="<?= $userFriend->id; ?>"></textarea>
									<button type="button" class="btn-send__messenger"><i class="fa fa-smile-o"></i> Send</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>