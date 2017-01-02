<?php get_header(); ?>


    <div class="container">
        <div class="row div-section">
            <div class="div-section-title div-profile-section-title">
                <div>
                    <p>Microsoft Studnet Partnersとは</p>
                </div>
            </div>

        </div>
        <div class="row div-section div-profile-section">
            <div class="col-sm-5">
                <img src="<?php echo get_template_directory_uri() . "/img/profile_intro.jpg" ?>" width="100%">
            </div>
            <div class="col-sm-7">
                <p class="p-profile-section-caption p-profile-section-caption-intro">Microsoft Student
                    Partners(MSP)とはMicrosoftテクノロジーの良さを学生に知ってもらうために活動を行っている学生団体です</p>
            </div>
        </div>
        <div class="row div-section div-profile-section2">
            <div class="col-sm-7">
                <p class="p-profile-section-title"><i class="fa fa-laptop" aria-hidden="true"></i> セミナー活動</p>
                <p class="p-profile-section-caption p-profile-section-caption-seminar">
                    MSPは学生に向けて、Microsoftのテクノロジーを楽しく使ってもらうために全国で勉強会やハンズオンを開いています</p>
                <div class="div-section-button">
                    <a class="btn a-section-button a-profile-section-button-seminar">
                        <p>勉強会情報 <i class="fa fa-angle-right" aria-hidden="true"></i></p>
                    </a>
                </div>
            </div>
            <div class="col-sm-5">
                <img src="<?php echo get_template_directory_uri() . "/img/profile_seminar.jpg" ?>" width="100%">
            </div>
        </div>
        <div class="row div-section div-profile-section">
            <div class="col-sm-5">
                <img src="<?php echo get_template_directory_uri() . "/img/profile_pr.jpg" ?>" width="100%">
            </div>
            <div class="col-sm-7">
                <p class="p-profile-section-title"><i class="fa fa-newspaper-o" aria-hidden="true"></i> 広報活動</p>
                <p class="p-profile-section-caption p-profile-section-caption-intro">
                    Microsoftの学生向け情報をより多くの学生の皆様に届くように、WebサイトやSNSでの広報活動を行っています</p>
                <div class="div-section-button">
                    <a class="btn a-section-button a-profile-section-button-pr">
                        <p>Web記事 <i class="fa fa-angle-right" aria-hidden="true"></i></p>
                    </a>
                    <a class="btn a-section-button a-profile-section-button-pr">
                        <p>SNS <i class="fa fa-angle-right" aria-hidden="true"></i></p>
                    </a>
                    <a class="btn a-section-button a-profile-section-button-pr">
                        <p>海外向け <i class="fa fa-angle-right" aria-hidden="true"></i></p>
                    </a>
                </div>
            </div>

        </div>
        <div class="row div-section div-profile-section2">
            <div class="col-sm-7">
                <p class="p-profile-section-title"><i class="fa fa-trophy" aria-hidden="true"></i> コンテスト支援</p>
                <p class="p-profile-section-caption p-profile-section-caption-contest">
                    MicrosoftテクノロジーのITコンテストであるImagineCupに、学生がより気軽に出場できるように支援を行っています</p>
                <div class="div-section-button">
                    <a class="btn a-section-button a-profile-section-button-contest">
                        <p>勉強会情報 <i class="fa fa-angle-right" aria-hidden="true"></i></p>
                    </a>
                </div>
            </div>
            <div class="col-sm-5">
                <img src="<?php echo get_template_directory_uri() . "/img/profile_contest.jpg" ?>" width="100%">
            </div>
        </div>
        <div class="row div-section div-profile-section">
            <div class="col-sm-5">
                <img src="<?php echo get_template_directory_uri() . "/img/profile_lab.jpg" ?>" width="100%">
            </div>
            <div class="col-sm-7">
                <p class="p-profile-section-title"><i class="fa fa-flask" aria-hidden="true"></i> 研究活動</p>
                <p class="p-profile-section-caption p-profile-section-caption-lab">
                    MSPでは内部に研究グループを設け、コンピュータ・サイエンスに特化したメンバーによる最新技術の技術研究を行っています</p>
                <div class="div-section-button">
                    <a class="btn a-section-button a-profile-section-button-lab">
                        <p>研究情報 <i class="fa fa-angle-right" aria-hidden="true"></i></p>
                    </a>
                </div>
            </div>

        </div>
        <div class="row div-section">
            <div class="div-section-title div-profile-section-title">
                <div>
                    <p>メンバー</p>
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
            <ul class="nav nav-tabs">
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

                    <div class="tab-pane <?php echo $active ?>" id="<?php echo 'div-' . $department ?>">
                        <ul class="list-group">
                            <?php
                            foreach ($members as $member):
                                $thumbnail_url = $member['thumbnail_url'];
                                $name = $member['title'];
                                $catchcopy = $member['catchcopy'];
                                $current_department = $member['department'];
                                if ($department == $current_department):
                                    ?>
                                    <li class="list-group-item">
                                        <a class="btn" href="">
                                            <img src="<?php echo $thumbnail_url ?>">
                                            <p><?php echo $name ?></p>
                                            == <p></p>
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
    </div>

    <script type="text/javascript">
        $panes = $('.tab-pane');
        alert($panes)
        $first = $panes.first();
    </script>

<?php get_footer(); ?>