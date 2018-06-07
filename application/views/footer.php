            </div>
            <footer>
                <div class="s-copyright text-center">
                    <span>Copyright <?= date('Y'); ?></span>
                </div>
            </footer>
            <?php echo message_box('success'); ?>
            <?php echo message_box('error');?>
            <?php echo message_box('warning');?>
            <?php echo message_box('info');?>
        </div>      
        <script src="<?= base_url() ?>vendor/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>vendor/js/custom.js" type="text/javascript"></script>
    </body>
    <!-- end::Body -->
    </html>