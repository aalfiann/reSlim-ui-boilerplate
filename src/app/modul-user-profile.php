<?php spl_autoload_register(function ($classname) {require ( $classname . ".php");});
$datalogin = Core::checkSessions();?>
<!DOCTYPE html>
<html lang="<?php echo Core::getInstance()->setlang?>">
<head>
    <?php include_once 'global-meta.php';?>    
    <title><?php echo Core::lang('user_profile')?> - <?php echo Core::getInstance()->title?></title>
</head>

<body class="fix-sidebar fix-header card-no-border">
    <?php include_once 'global-preloader.php';?>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <?php include_once 'navbar-header.php';?>
        <?php include_once 'sidebar-left.php';?>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><?php echo Core::lang('user_profile')?></h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo Core::lang('app')?></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo Core::lang('user')?></a></li>
                        <li class="breadcrumb-item active"><?php echo Core::lang('user_profile')?></li>
                    </ol>
                </div>
                <div>
                    <button class="right-side-toggle waves-effect waves-light btn-themecolor btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div id="report-changepass"></div>
                <?php
                    if (isset($_POST['submitupdate'])){
                        $post_array = array(
                        	'Username' => $_POST['username'],
                            'Fullname' => $_POST['fullname'],
                            'Address' => $_POST['address'],
                            'Phone' => $_POST['phone'],
                            'Email' => $_POST['email'],
                            'Aboutme' => $_POST['aboutme'],
                            'Avatar' => $_POST['avatar'],
                            'Role' => Core::getRole($datalogin['token']),
                            'Status' => '1',
                            'Token' => $datalogin['token']
                        );
                        Core::update(Core::getInstance()->api.'/user/update',$post_array);
                    } 
                ?>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <?php 
                    $url = Core::getInstance()->api.'/user/profile/'.$datalogin['username'].'/'.$datalogin['token'];
                    $data = json_decode(Core::execGetRequest($url));
                    if (!empty($data)){
                        if ($data->{'status'} == "success"){
                            echo '<!-- Row -->
                            <div class="row">
                                <!-- Column -->
                                <div class="col-lg-4 col-xlg-3 col-md-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <center class="m-t-30"> <img src="'.(empty($data->result[0]->Avatar)?Core::getInstance()->assetspath.'/images/users/no-pic.jpg':$data->result[0]->Avatar).'" class="img-circle" width="150" />
                                                <h4 class="card-title m-t-10">'.$datalogin['username'].'</h4>
                                                <h6 class="card-subtitle">'.$data->result[0]->Role.'</h6>
                                            </center>
                                        </div>
                                        <div>
                                            <hr> </div>
                                        <div class="card-body">
                                            <small class="text-muted">'.Core::lang('email_address').' </small>
                                            <h6>'.$data->result[0]->Email.'</h6>
                                            
                                            <small class="text-muted p-t-10 db">'.Core::lang('phone').'</small>
                                            <h6>'.$data->result[0]->Phone.'</h6>
                                            
                                            <small class="text-muted p-t-10 db">'.Core::lang('address').'</small>
                                            <h6>'.$data->result[0]->Address.'</h6>
                                            <hr>
                                            <small class="text-muted">'.Core::lang('total').' '.Core::lang('post').' : </small>
                                            <h4 id="totalpost" class="pull-right">0</h4> 
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                                
                                <!-- Column -->
                                <div class="col-lg-8 col-xlg-9 col-md-7">
                                    <div class="card">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs profile-tab" role="tablist">
                                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">'.Core::lang('profile').'</a> </li>
                                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">'.Core::lang('edit').'</a> </li>
                                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#changepassword" role="tab">'.Core::lang('change_password').'</a> </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <!--first tab-->
                                            <div class="tab-pane active" id="profile" role="tabpanel">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-3 col-xs-6 b-r"> <strong>'.Core::lang('fullname').'</strong>
                                                            <br>
                                                            <p class="text-muted">'.$data->result[0]->Fullname.'</p>
                                                        </div>
                                                        <div class="col-md-3 col-xs-6 b-r"> <strong>'.Core::lang('status').'</strong>
                                                            <br>
                                                            <p class="text-muted">'.$data->result[0]->Status.'</p>
                                                        </div>
                                                        <div class="col-md-3 col-xs-6 b-r"> <strong>'.Core::lang('registered').'</strong>
                                                            <br>
                                                            <p class="text-muted">'.$data->result[0]->Created_at.'</p>
                                                        </div>
                                                        <div class="col-md-3 col-xs-6"> <strong>'.Core::lang('last_updated').'</strong>
                                                            <br>
                                                            <p class="text-muted">'.$data->result[0]->Updated_at.'</p>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <h5>'.Core::lang('about_me').'</h5>
                                                    <p class="m-t-30">'.$data->result[0]->Aboutme.'</p>
                                                </div>
                                            </div>

                                            <!--second tab-->
                                            <div class="tab-pane" id="settings" role="tabpanel">
                                                <div class="card-body">
                                                    <form class="form-horizontal form-material" method="post" action="'.$_SERVER['PHP_SELF'].'">
                                                        <div class="form-group">
                                                            <label class="col-md-12">'.Core::lang('tb_username').'</label>
                                                             <div class="col-md-12">
                                                                <input name="username" type="text" placeholder="'.Core::lang('input_username').'" class="form-control form-control-line" value="'.$data->result[0]->Username.'" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-12">'.Core::lang('fullname').'</label>
                                                            <div class="col-md-12">
                                                                <input name="fullname" type="text" placeholder="'.Core::lang('input_fullname').'" class="form-control form-control-line" value="'.$data->result[0]->Fullname.'">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="example-email" class="col-md-12">'.Core::lang('email_address').'</label>
                                                            <div class="col-md-12">
                                                                <input name="email" type="email" placeholder="'.Core::lang('input_email').'" class="form-control form-control-line" name="email" value="'.$data->result[0]->Email.'">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-12">'.Core::lang('phone').'</label>
                                                            <div class="col-md-12">
                                                                <input name="phone" type="text" placeholder="'.Core::lang('input_phone').'" class="form-control form-control-line" value="'.$data->result[0]->Phone.'">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-12">'.Core::lang('avatar').'</label>
                                                            <div class="col-md-12">
                                                                <input name="avatar" type="text" placeholder="'.Core::lang('input_avatar').'" class="form-control form-control-line" value="'.$data->result[0]->Avatar.'">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-12">'.Core::lang('address').'</label>
                                                            <div class="col-md-12">
                                                                <textarea name="address" rows="5" style="resize: vertical;" class="form-control form-control-line">'.$data->result[0]->Address.'</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-12">'.Core::lang('about_me').'</label>
                                                            <div class="col-md-12">
                                                                <textarea name="aboutme" rows="5" style="resize: vertical;" class="form-control form-control-line">'.$data->result[0]->Aboutme.'</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <button name="submitupdate" type="submit" class="btn btn-success">'.Core::lang('update').' '.Core::lang('profile').'</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <!--third tab-->
                                            <div class="tab-pane" id="changepassword" role="tabpanel">
                                                <div class="card-body">
                                                    <form class="form-horizontal form-material" id="changepass" action="#">
                                                        <div class="form-group">
                                                            <label class="col-md-12">'.Core::lang('tb_username').'</label>
                                                             <div class="col-md-12">
                                                                <input id="username" type="text" placeholder="'.Core::lang('input_username').'" class="form-control form-control-line" value="'.$data->result[0]->Username.'" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-12">'.Core::lang('password').'</label>
                                                            <div class="col-md-12">
                                                                <input id="password1" type="password" class="form-control form-control-line" required>
                                                                <span class="help-block text-muted"><small>'.Core::lang('notice_change_password').'</small></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-12">'.Core::lang('new_password').'</label>
                                                            <div class="col-md-12">
                                                                <input id="password2" type="password" class="form-control form-control-line" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-12">'.Core::lang('confirm_new_password').'</label>
                                                            <div class="col-md-12">
                                                                <input id="password3" type="password" class="form-control form-control-line" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <button type="submit" class="btn btn-success">'.Core::lang('submit').'</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="card">
                                         <!-- Nav tabs -->
                                        <ul class="nav nav-tabs profile-tab" role="tablist">
                                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#mypost" role="tab">'.Core::lang('post').'</a> </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <!--first tab-->
                                            <div class="tab-pane active" id="mypost" role="tabpanel">
                                                <div class="card-body">
                                                    <ul id="mylist" class="list-unstyled">
                                                        
                                                    </ul>
                                                    <center><button id="loadbtn" type="button" class="btn btn-themecolor" onclick="loadPost();">'.Core::lang('loadmore').'</button></center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- Column -->
                            </div>
                            <!-- Row -->';
                        } else {
                            echo '<div class="row page-titles">
                                <div class="col-md-5 col-8 align-self-center">
                                    <h3 class="text-themecolor m-b-0 m-t-0">'.Core::lang('message').':</h3>
                                    <p class="text-muted">'.$data->{'message'}.'</p>
                                </div>
                            </div>';
                        }
                    } else {
                        echo '<div class="row page-titles">
                        <div class="col-md-5 col-8 align-self-center">
                            <h3 class="text-themecolor m-b-0 m-t-0">'.Core::lang('message').':</h3>
                            <p class="text-muted">'.Core::lang('core_not_connected').'</p>
                        </div>
                    </div>';
                    }?>
                
                
                
                    
                <?php include_once 'sidebar-right.php';?>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <?php include_once 'global-footer.php';?>
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <?php include_once 'global-js.php';?>
    <script>
        /* Change password start */
        $("#changepass").on("submit",sendnewpass);
        function sendnewpass(e){
            console.log("Process change password...");
            e.preventDefault();
            var that = $(this);
            that.off("submit"); /* remove handler */
            var div = document.getElementById("report-changepass");
            if ($("#password2").val() === $("#password3").val()){
                $.ajax({
                    url: Crypto.decode("<?php echo base64_encode(Core::getInstance()->api.'/user/changepassword')?>"),
                    data : {
                        Username: $("#username").val(),
                        Password: $("#password1").val(),
                        NewPassword: $("#password3").val(),
                        Token: "<?php echo $datalogin['token']?>"
                    },
                    dataType: "json",
                    type: "POST",
                    success: function(data) {
                        div.innerHTML = "";
                        if (data.status == "success"){
                            div.innerHTML = messageHtml("success","<?php echo Core::lang('core_change_password_success')?>");
                            /* clear from */
                            $("#changepassword")
                            .find("input,textarea,select")
                            .val("")
                            .end()
                            .find("input[type=checkbox]")
                            .prop("checked", "")
                            .end()
                            .find("button[type=submit]")
                            .attr("disabled", "disabled")
                            .end();
                            console.log("Process change password success! You have to re-login now.");
                        } else {
                            div.innerHTML = messageHtml("danger","<?php echo Core::lang('core_change_password_failed')?>",data.message);
                            that.on("submit", sendnewpass); /* add handler back after ajax */
                        }
                    },
                    error: function(x, e) {}
                });   
            } else {
                div.innerHTML = messageHtml("danger","<?php echo Core::lang('not_match_password')?>");
                that.on("submit", sendnewpass); /* add handler back after ajax */
            }
        }
        /* Change password end */

        /* Custom Format Date */
        function customFormatDate(date='',delimiterdate='-',displaytime=false,midspace=' ',delimitertime=':') {
        if (date == '' || date == null){
    		date = new Date();
	    } else {
		    date = new Date(date);	
    	}
  
        var monthNames = [
            "Jan", "Feb", "Mar",
            "Apr", "May", "Jun", "Jul",
            "Aug", "Sep", "Oct",
            "Nov", "Dec"
        ];

        var dd = date.getDate().toString();
        var monthIndex = date.getMonth();
        var year = date.getFullYear();
  
        var hh = date.getHours().toString();
        var mm = date.getMinutes().toString();
        var ss = date.getSeconds().toString();
  
        var ddChars = dd.split('');
        var hhChars = hh.split('');
        var mmChars = mm.split('');
        var ssChars = ss.split('');
        if (displaytime==false){
            return (ddChars[1]?dd:"0"+ddChars[0]) + delimiterdate + monthNames[monthIndex] + delimiterdate + year;		
        }
        return (ddChars[1]?dd:"0"+ddChars[0]) + delimiterdate + monthNames[monthIndex] + delimiterdate + year + midspace +(hhChars[1]?hh:"0"+hhChars[0])+delimitertime+(mmChars[1]?mm:"0"+mmChars[0])+delimitertime+(ssChars[1]?ss:"0"+ssChars[0]);
    }

        /* Initial page for loadmore */
        var pages = 1;
        /* Initial item for loadmore */
        var items = 3;

        /* Load more Post */
        function loadPost(){
            $(function(){
                var btn = "loadbtn";
                disableClickButton(btn);
                $.ajax({
                    url: Crypto.decode("<?php echo base64_encode(Core::getInstance()->api.'/page/data/written/'.$datalogin['username'].'/'.$datalogin['token'].'/'.$datalogin['username'])?>")+"/"+pages+"/"+items+"/desc/?query=&_="+randomText(10),
                    dataType: "json",
                    type: "GET",
                    success: function(data) {
                        if (data.status == "success"){
                            if(pages == 1) $('#totalpost').html(data.metadata.records_total);
                            if( pages <= data.metadata.page_total){
                                $.each(data.results, function(index, value){
                                    var tags = value.Tags.split(',');
                                    var datatags = "";
                                    $.each(tags, function(indextag, valuetag){
                                        datatags += '<a href="blog/'+slugify(valuetag)+'" title="<?php echo Core::lang('pages_search_label')?> '+$.trim(valuetag)+'" target="_blank">#'+$.trim(valuetag)+'</a>, ';
                                    });
                                    $('#mylist').append('<li class="media">\
                                            <div class="media-body">\
                                                <h3 class="mt-0 mb-1"><a href="post/'+value.PageID+'/'+slugify(value.Title)+'" title="'+value.Title+'" target="_blank">'+value.Title+'</a></h3>\
                                                <p class="text-muted">\
                                                    '+datatags.slice(0,-2)+' | <i class="mdi mdi-calendar-clock"></i> '+customFormatDate(value.Created_at,' ',true,', ')+' | <i class="mdi mdi-eye"></i> '+value.Viewer+'\
                                                </p><hr>\
                                                '+value.Description+'\
                                            </div>\
                                        </li>');
                                });
                                if(pages == data.metadata.page_total) $('#loadbtn').hide();
                                pages = pages+1;
                            }                                                     
                        } else {
                            $('#mylist').append('<li class="media">\
                                    <div class="media-body">\
                                        <h3 class="mt-0 mb-1">'+data.message+'</h3>\
                                    </div>\
                                </li>');
                            $('#loadbtn').hide();
                        }
                    },
                    complete: function(){
                        disableClickButton(btn,false);
                    },
                    error: function(x, e) {}
                });
            });
        }
        /* Load Post */
        loadPost(pages,items);
    </script>
</body>

</html>
