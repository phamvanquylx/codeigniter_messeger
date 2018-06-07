                <?php
                    // Begin Call Database
                    $ci=& get_instance();
                    $ci->load->database();
                    // End Call Database
                    $user_fiend      = [];
                    $user_list       = $ci->db->select('*')->get('users_list')->result();
                    $user_fiend_list = $ci->db->select('*')->get('users_friend')->result();
                ?>
                <div class="sideber-left">
                    <div class="sideber__top__wrapper">
                        <a href="<?= base_url('My_profile'); ?>">
                            <img src="<?= base_url('vendor/images/avatar.png') ?>" alt="">
                        </a>
                        <div class="sideber__top__name"><?= $admin_login->name; ?></div>
                        <div class="sideber__top__desc">...</div>
                    </div>
                    <div class="sideber__search">
                        <form action="<?= base_url('search') ?>" method="post">
                            <input type="text" name="search_user">
                            <button><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="sideber__link">
                        <ul class="menu">
                            <li class="active"><a href="<?= base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                            <li><a href="<?= base_url('Users'); ?>"><i class="fa fa-user-plus"></i> User</a></li>
                            <li><a href="<?= base_url('Create_account'); ?>"><i class="fa fa-plus"></i> Creat</a></li>
                        </ul>
                    </div>
                    <div class="sideber__nav">                     
                    <?php
                    foreach ($user_fiend_list as $value)
                    {
                        if($value->u_id == $admin_login->id)
                        {
                            $user_fiend[] = $value->add_id;
                        }
                    }
                    foreach ($user_list as $value)
                    { 
                        $status = 'offline';
                        foreach ($results as $data) {
                            if($value->id == $data->id)
                            {
                                $status = 'online';
                            }
                        }
                        if($value->id != $admin_login->id)
                        {
                            foreach ($user_fiend as $values)
                            {
                                if($value->id == $values)
                                {
                    ?>
                    <ul class="users-list">
                        <li>
                            <a href="<?= base_url('Messenger/view/'). encode_value($value->id) ; ?>">
                                <img src="<?= base_url('vendor/images/avatar.png') ?>" alt="">
                                <div class="users-list__name"><?= $value->name ?></div>
                                <div class="users-list__status <?= $status ?>">status</div>
                            </a>
                        </li>
                    </ul>
                    <?php
                                }            
                            }
                        }
                    }


?>
                    </div>
                </div>                
