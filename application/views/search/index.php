			<div class="main-content">
				<div class="user-list">
					<div class="user-list__body">
						<h1>Search</h1>
						<div class="user-list__result">
							<?php if(isset($search_results) && $search_results) :
								$id = $_SESSION['user_login']['id'];
							?>
								<?php foreach($search_results as $value) : ?>
									<?php if($value->id != $id) : ?>
										<div class="user-list__id">
											<a href="#">
												<img src="<?= base_url(); ?>vendor/images/avatar.png" alt="sdfsdf" class="users-list__images">
											</a>
											<span class="users-list__name"><?= $value->account ?></span>
											<?php
												if(!empty($friends_list))
												{
													$icon = 'fa-plus';
													$user_postion = 'add';
													foreach($friends_list as $values)
													{
														if($values->add_id == $value->id)
														{
															$icon = 'fa-times';
															$user_postion = 'edit';
														}
													}
											?>
											<span class="<?= $user_postion ?>-friends" data-user="<?= $value->id; ?>"><i class="fa <?= $icon ?>"></i></span>
											<?php
												}
												else
												{
											?>
											<span class="add-friends" data-user="<?= $value->id; ?>"><i class="fa fa-plus"></i></span>
											<?php		
												}
											?>
										</div>
									<?php endif; ?>
								<?php endforeach  ?>
							<?php endif ?>
							<?php if(isset($empty_search_results)) : ?>
								<h3><?= $empty_search_results ?></h3>
							<?php endif  ?>
						</div>
					</div>
				</div>
			</div>