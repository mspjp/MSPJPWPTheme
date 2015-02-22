                <?php if ( is_active_sidebar( 'sidebar-top' ) ) :
                dynamic_sidebar( 'sidebar-top' );
                else: ?>
                <div class="tmpbox">
                    <h2>No Widget</h2>
                    <p>ウィジットは設定されていません。</p>
                </div>
                <?php
                endif;
                ?>
                <?php if ( is_active_sidebar( 'sidebar-bottom' ) ) :
                dynamic_sidebar( 'sidebar-bottom' );
                else: ?>
                <div class="tmpbox">
                    <h2>No Widget</h2>
                    <p>ウィジットは設定されていません。</p>
                </div>
                <?php
                endif;
                ?>
