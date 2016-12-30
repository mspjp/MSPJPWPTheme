</div>
<!-- /Main Container -->
</div>
<!-- /Main -->
<footer>
    <div class="container">
        <div class="box" style="border:0px;">
            <div class="box__left" style="border:0px;">
                <div class="footer-desc">
                    <p><b>このサイトについて</b></p>
                    <p>Microsoft Student Partners Japanの学生が運営している、<br>MSPの活動をお伝えする情報発信サイトです。</p>
                </div>
            </div>
            <div class="box__right">
                <div class="social-icons">
                    <a href="https://twitter.com/_mspjp" target="_blank"
                       onclick='ga("send", "event", "Contact", "Click", "Twitter");'><i class="fa fa-twitter fa-3x"></i></a>
                    <a href="https://www.facebook.com/mspjp?fref=ts" target="_blank"
                       onclick='ga("send", "event", "Contact", "Click", "Facebook");'><i
                                class="fa fa-facebook fa-3x"></i></a>
                    <a href="mailto:mspjp@microsoft.com" onclick='ga("send", "event", "Contact", "Click", "Mail");'><i
                                class="fa fa-envelope fa-3x"></i></a>
                </div>
            </div>
        </div>
        <p class="copyright">&copy; 2015<?php if (date("Y") != 2015) echo date("-Y"); ?> Microsoft Student Partners
            Japan. All Rights Reserved.</p>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>