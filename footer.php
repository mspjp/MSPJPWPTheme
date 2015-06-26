        </div>
        <!-- /Main Container -->
    </div>
    <!-- /Main -->
    <footer>
        <div class="container">
            <div class="box">
                <div class="box__left">
                  <div class="box">
                    <!-- box in box -->
                    <div class="box__left">
                        <img class="msplogo" src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="">
                    </div>
                    <div class="box__right">
                        <div class="footer-desc">
                            <h3>このサイトについて</h3>
                            <p>このサイトはMicrosoft Student Partners Japanが運営・管理している<br>MSPの活動を告知するための情報発信サイトです。</p>
                        </div>
                    </div>
                    <!-- end. box in box -->
                  </div>
                </div>
                <div class="box__right">
                    <div class="social-icons">
                        <a href="https://twitter.com/MSP_Japan" target="_blank"><i class="fa fa-twitter fa-3x"></i></a>
                        <a href="https://www.facebook.com/MicrosoftStudentPartnersJAPAN" target="_blank"><i class="fa fa-facebook fa-3x"></i></a>
                        <a href="mailto:mspjp@microsoft.com"><i class="fa fa-envelope fa-3x"></i></a>
                    </div>
                </div>
            </div>
            <p class="copyright">&copy; Copyrights 2015<?php if (date("Y")!=2015) echo date("-Y"); ?> <?php bloginfo('name'); ?> All Rights Reserved.</p>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>
