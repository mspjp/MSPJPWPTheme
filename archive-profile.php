<?php get_header(); ?>
    <script type="text/javascript">
        $(function(){
            $('.div-section').css('opacity','0');
            $('.div-section').on('inview',function(event, isInView, visiblePartX, visiblePartY){
                var target = $(this);
                setTimeout(function(){
                    if(isInView){
                        target.stop().animate({
                            opacity:1
                        },500);
                    }else{
                    }
                },500);

            });
        });
    </script>

    <div class="container-fluid">
        <div class="row div-section">
            <div class="div-section-title div-archiveprofile-section-title">
                <div>
                    <p>Microsoft Studnet Partnersとは</p>
                </div>
            </div>

        </div>
        <div class="row div-section div-archiveprofile-section">
            <div class="col-sm-5">
                <img src="<?php echo get_template_directory_uri() . "/img/profile_intro.jpg" ?>" width="100%">
            </div>
            <div class="col-sm-7">
                <p class="p-archiveprofile-section-caption p-archiveprofile-section-caption-intro">Microsoft Student
                    Partners(MSP)とはMicrosoftテクノロジーの良さを学生に知ってもらうために活動を行っている学生団体です</p>
            </div>
        </div>
        <div class="row div-section div-archiveprofile-section2">
            <div class="col-sm-7">
                <p class="p-archiveprofile-section-title"><i class="fa fa-laptop" aria-hidden="true"></i> セミナー活動</p>
                <p class="p-archiveprofile-section-caption p-archiveprofile-section-caption-seminar">
                    MSPは学生に向けて、Microsoftのテクノロジーを楽しく使ってもらうために全国で勉強会やハンズオンを開いています</p>
                <div class="div-section-button">
                    <a class="btn a-section-button a-archiveprofile-section-button-seminar" href="<?php get_seminar_url() ?>" target="_blank">
                        <p>勉強会情報 <i class="fa fa-angle-right" aria-hidden="true"></i></p>
                    </a>
                </div>
            </div>
            <div class="col-sm-5">
                <img src="<?php echo get_template_directory_uri() . "/img/profile_seminar.jpg" ?>" width="100%">
            </div>
        </div>
        <div class="row div-section div-archiveprofile-section">
            <div class="col-sm-5">
                <img src="<?php echo get_template_directory_uri() . "/img/profile_pr.jpg" ?>" width="100%">
            </div>
            <div class="col-sm-7">
                <p class="p-archiveprofile-section-title"><i class="fa fa-newspaper-o" aria-hidden="true"></i> 広報活動</p>
                <p class="p-archiveprofile-section-caption p-archiveprofile-section-caption-intro">
                    Microsoftの学生向け情報をより多くの学生の皆様に届くように、WebサイトやSNSでの広報活動を行っています</p>
                <div class="div-section-button">
                    <a class="btn a-section-button a-archiveprofile-section-button-pr" href="/blog">
                        <p>Web記事 <i class="fa fa-angle-right" aria-hidden="true"></i></p>
                    </a>
                    <a class="btn a-section-button a-archiveprofile-section-button-pr" href="<?php echo get_twitter_url() ?>">
                        <p>SNS <i class="fa fa-angle-right" aria-hidden="true"></i></p>
                    </a>
                    <a class="btn a-section-button a-archiveprofile-section-button-pr">
                        <p>海外向け <i class="fa fa-angle-right" aria-hidden="true"></i></p>
                    </a>
                </div>
            </div>

        </div>
        <div class="row div-section div-archiveprofile-section2">
            <div class="col-sm-7">
                <p class="p-archiveprofile-section-title"><i class="fa fa-trophy" aria-hidden="true"></i> コンテスト支援</p>
                <p class="p-archiveprofile-section-caption p-archiveprofile-section-caption-contest">
                    MicrosoftテクノロジーのITコンテストであるImagineCupに、学生がより気軽に出場できるように支援を行っています</p>
                <div class="div-section-button">
                    <a class="btn a-section-button a-archiveprofile-section-button-contest" href="<?php echo get_imagine_url() ?>">
                        <p>ImagineCup情報 <i class="fa fa-angle-right" aria-hidden="true"></i></p>
                    </a>
                </div>
            </div>
            <div class="col-sm-5">
                <img src="<?php echo get_template_directory_uri() . "/img/profile_contest.jpg" ?>" width="100%">
            </div>
        </div>
        <div class="row div-section div-archiveprofile-section">
            <div class="col-sm-5">
                <img src="<?php echo get_template_directory_uri() . "/img/profile_lab.jpg" ?>" width="100%">
            </div>
            <div class="col-sm-7">
                <p class="p-archiveprofile-section-title"><i class="fa fa-flask" aria-hidden="true"></i> 研究活動</p>
                <p class="p-archiveprofile-section-caption p-archiveprofile-section-caption-lab">
                    MSPでは内部に研究グループを設け、コンピュータ・サイエンスに特化したメンバーによる最新技術の技術研究を行っています</p>
                <div class="div-section-button">
                    <a class="btn a-section-button a-archiveprofile-section-button-lab">
                        <p>研究情報 <i class="fa fa-angle-right" aria-hidden="true"></i></p>
                    </a>
                </div>
            </div>

        </div>
        <div class="row div-section">
            <div class="div-section-title div-archiveprofile-section-title">
                <div>
                    <p>MSP<?php echo date("Y"); ?> メンバー</p>
                </div>
            </div>
            <?php
            $members = array();
            $department_list = array();
            if (have_posts()) : // WordPress ループ
                query_posts($query_string . "&posts_per_page=-1");
                while (have_posts()) : the_post(); // 繰り返し処理開始
                    $post_param = array(
                        'permalink' => get_permalink(),
                        'thumbnail_url' => get_thumbnail_url(has_post_thumbnail()),
                        'title' => mb_substr(get_the_title(), 0, 30)
                    );
                    $fields_param = get_fields();
                    $params = array_merge($post_param, $fields_param);
                    array_push($members, $params);

                    $department = get_field('department');
                    if (!in_array($department, $department_list)):
                        array_push($department_list, $department);
                    endif;

                endwhile; // 繰り返し処理終了
            else : // ここから記事が見つからなかった場合の処理
                include('no-article.php');
            endif;
            ?>
            <ul class="nav nav-tabs ul-archiveprofile">
                <?php
                $active = 'active';
                foreach ($department_list as $department):

                    $field = get_field_object('department');
                    $department_name = $field['choices'][$department];
                    ?>
                    <li class="nav-item <?php echo $active ?>">
                        <a class="nav-link" data-toggle="tab"
                           href="#<?php echo 'div-' . $department ?>"><?php echo $department_name ?></a>
                    </li>

                    <?php
                    $active = '';
                endforeach;
                ?>

            </ul>
            <div class="tab-content">
                <?php
                $active = 'active';
                foreach ($department_list as $department):
                    $field = get_field_object('department');
                    $department_name = $field['choices'][$department];
                    ?>

                    <div class="tab-pane div-archiveprofile-tabpane <?php echo $active ?>" id="<?php echo 'div-' . $department ?>">
                        <ul class="list-group">
                            <?php
                            foreach ($members as $member):
                                $thumbnail_url = $member['thumbnail_url'];
                                $name = $member['title'];
                                $catchcopy = $member['catchcopy'];
                                $current_department = $member['department'];
                                $link = $member['permalink'];
                                if ($department == $current_department):
                                    ?>
                                    <li class="list-group-item li-archiveprofile-member">
                                        <a class="btn" href="<?php echo $link ?>">
                                            <div class="div-archiveprofile-iconwrap" style="background-image: url(<?php echo $thumbnail_url ?>)">
                                            </div>
                                            <div class="p-archiveprofile-wrap">
                                                <p class="p-archiveprofile-name"><?php echo $name ?></p>
                                                <p class="p-archiveprofile-catch"><?php echo $catchcopy ?></p>
                                            </div>
                                        </a>
                                    </li>
                                    <?php
                                endif;
                                ?>
                                <?php
                            endforeach;
                            ?>
                        </ul>
                    </div>

                    <?php
                    $active = '';
                endforeach;
                ?>
            </div>
        </div>
        <div class="row div-section">
            <div class="div-section-title div-archiveprofile-section-title">
                <div>
                    <p>Join Us!</p>
                </div>
            </div>
            <p class="p-archiveprofile-hire">Microsoft Student PartnersはMicrosoftテクノロジーを学生に広めたいという強い意志を持ち、自発的に活動をしてくれる学生を募集しています。気になった方は <a href="<?php get_twitter_url() ?>">@_mspjp</a> までご連絡ください</p>
            <img src="<?php echo get_template_directory_uri() . "/img/profile_all.jpg" ?>" width="70%">
        </div>
    </div>

<?php get_footer(); ?>