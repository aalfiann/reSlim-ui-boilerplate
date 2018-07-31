<div class="col-lg-4 col-md-12 col-sm-12 p-20">
    <div class="stickyside">
        <form action="blog" method="get">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="<?php echo Core::lang('pages_placeholder_search')?>">
                    <span class="input-group-btn">
                        <button class="btn btn-themecolor" type="submit"><?php echo Core::lang('search')?>!</button>
                    </span>
                </div>
            </div>
        </form>
        <div id="trendingpost"></div>
        <div id="tagcloud"></div>
        <?php 
            if(Core::isPageMatch('modul-blog-post.php')) {
                if(!empty(Core::getInstance()->sharethis)){
                    echo '<p class="text-muted m-t-5 m-b-5">'.Core::lang('pages_widget_sharethis').'</p><hr class="m-t-5 m-b-10"><div class="sharethis-inline-share-buttons"></div><br>';
                }
                
            }
            if(Core::isPageMatch('modul-blog.php') || Core::isPageMatch('modul-blog-post.php')) {
                echo '<div class="card card-body bg-light">
                        <b>'.Core::getInstance()->title.'</b>
                        <hr class="m-t-0 m-b-0" style="display:block;height: 1px;border: 0;border-top: 1px solid #ccc;margin: 1em 0;padding: 0;">
                        '.Core::getInstance()->description;
                if (!empty(Core::getInstance()->facebook) || !empty(Core::getInstance()->twitter) || !empty(Core::getInstance()->gplus) || !empty(Core::getInstance()->email)){
                    echo '<p class="m-t-10 m-b-0">';
                    echo (!empty(Core::getInstance()->facebook)?'<a href="'.Core::getInstance()->facebook.'" target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a>':'');
                    echo (!empty(Core::getInstance()->twitter)?' <a href="'.Core::getInstance()->twitter.'" target="_blank"><i class="fa fa-twitter-square fa-2x"></i></a>':'');
                    echo (!empty(Core::getInstance()->gplus)?' <a href="'.Core::getInstance()->gplus.'" target="_blank"><i class="fa fa-google-plus-square fa-2x"></i></a>':'');
                    echo (!empty(Core::getInstance()->email)?' <a href="mailto:'.Core::getInstance()->email.'"><i class="fa fa-envelope-square fa-2x"></i></a>':'');
                    echo '</p>';
                }
                echo '<small><p class="m-t-10 m-b-5">Powered by - <a href="https://github.com/aalfiann/reslim-ui-boilerplate" target="_blank">reSlim UI Boilerplate</a></p></small>';
                echo '</div>';
            }
        ?>
    </div>
</div>