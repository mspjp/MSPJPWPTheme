<footer>
    <div class="div-footer-social row">
        <div class="col-sm-3">
            <a class="btn" href="<?php echo get_twitter_url() ?>" target="_blank">
                <i class="fa fa-twitter-square" aria-hidden="true"></i>
            </a>
        </div>
        <div class="col-sm-3">
            <a class="btn" href="<?php echo get_facebook_url() ?>" target="_blank">
                <i class="fa fa-facebook-square" aria-hidden="true"></i>
            </a>
        </div>
        <div class="col-sm-3">
            <a class="btn" href="<?php echo get_rss_url() ?>" target="_blank">
                <i class="fa fa-rss-square" aria-hidden="true"></i>
            </a>
        </div>
        <div class="col-sm-3">
            <a class="btn" href="<?php echo get_github_url() ?>" target="_blank">
                <i class="fa fa-github-square" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <div class="div-footer-copyright row">
        <a class="footer-name" href="/">Microsoft Student Partners Japan</a>
        <p>このサイトはMicrosoft Student Partners Japanに所属する学生が運営している公式サイトです。</p>
        <p>お問い合わせは<a href="<?php echo get_twitter_url() ?>">@_mspjp</a>までお寄せください</p>
        <p class="copyright">&copy; 2015<?php if (date("Y") != 2015) echo date("-Y"); ?> Microsoft Student Partners
            Japan. All Rights Reserved.</p>
    </div>

</footer>
<?php wp_footer(); ?>
</body>
</html>