			<div class="main-content">
				<div class="user-list">
					<div class="user-list__body">
						<table class="table table-inverse table-striped" id="list_acc">
							<thead>
								<tr>
									<th><input type="checkbox"></th>
									<th>Id</th>
									<th>Name</th>
									<th>Account</th>
									<th>status</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($data_result as $value) : ?>
								<tr>
									<td><input type="checkbox" name="id_acc[]" value="<?= $value->id; ?>"></td>
									<td><?= $value->id; ?></td>
									<td><?= $value->name; ?></td>
									<td><?= $value->account; ?></td>
									<?php if($value->status == 1) { ?>
										<td>admin</td>
									<?php } else if($value->status == 2) { ?>
										<td>user</td>
									<?php } else { ?>
										<td>Inactive</td>
									<?php } ?>
								</tr>
								<?php endforeach  ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>