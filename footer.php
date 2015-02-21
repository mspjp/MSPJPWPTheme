        </div>
        <!-- /Main Container -->
    </div>
    <!-- /Main -->
    <footer>
        <div class="container">
            <div class="box">
                <div class="box__left">
                  <div class="box">
                    <div class="box__left">
                      <img class="msplogo" src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="">
                    </div>
                    <div class="box__right" style="margin:30px 0 0 20px;"> <!-- box in box -->
                      <h3>このサイトについて</h3>
                      <p>&copy; Copyrights 2013<?php if (date("Y")!=2013) echo date("-Y"); ?> <?php bloginfo('name'); ?> All Rights Reserved.</p>
                      <p>このサイトはMSPメンバーが作り運営している<br>なんか凄いサイトです。</p>
                    </div>
                  </div>
                </div>
                <div class="box__right">
                    <div class="social-icons">
                        <i class="fa fa-twitter fa-3x"></i>
                        <i class="fa fa-facebook fa-3x"></i>
                        <i class="fa fa-envelope fa-3x"></i>
                    </div>
                </div>
            </div>
            <p class="copyright">Copyright &copy; Microsoft Student Partners JAPAN All Right Reserved.</p>
        </div>
        <!-- /footer -->
        <?php wp_footer(); ?>
    </footer>
</body>
</html>
