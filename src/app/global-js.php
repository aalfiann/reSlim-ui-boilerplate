<!-- ============================================================== -->
    <!-- Lazyload Image or iFrame -->
    <!-- ============================================================== -->
    <script src="js/lazysizes.min.js"></script>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    <script>
        /* Init theme style */
        var getTheme = "blue";
        function loadTheme(themestyle="blue"){
            link=document.createElement("link");
            link.id="theme";
            link.href="css/colors/"+themestyle+".css";
            link.rel="stylesheet";
            document.getElementsByTagName("head")[0].appendChild(link);
        }
        function setTheme(getTheme){
            localStorage.setItem("<?php echo str_replace(' ','',Core::getInstance()->title)?>_theme",getTheme);
            console.log("Saving theme "+getTheme+"...");
        }
        function checkActiveTheme(classTheme){
            var selection = document.getElementById("themecolors") !== null;
            if (selection){
                document.getElementById("themecolors").querySelector("ul > li > a."+classTheme+"-theme").className = classTheme+"-theme working";
            }
        }
        /* Check localstorage */
		if (localStorage.getItem("<?php echo str_replace(' ','',Core::getInstance()->title)?>_theme") == "" || localStorage.getItem("<?php echo str_replace(' ','',Core::getInstance()->title)?>_theme") == "undefined") {
			console.log("Using default theme blue...");
			getTheme = "blue";
		} else {
			if (!localStorage.getItem("<?php echo str_replace(' ','',Core::getInstance()->title)?>_theme")) {
                localStorage.setItem("<?php echo str_replace(' ','',Core::getInstance()->title)?>_theme", "blue");
                getTheme = "blue";
                console.log("Using default theme blue...");
			} else {
                getTheme = localStorage.getItem("<?php echo str_replace(' ','',Core::getInstance()->title)?>_theme");
                console.log("Last time choosing theme: "+localStorage.getItem("<?php echo str_replace(' ','',Core::getInstance()->title)?>_theme"));
			}
        }
        loadTheme(getTheme);
        checkActiveTheme(getTheme);
        /* Cryptography */
		var Crypto={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(a){var b="",d,e,f,g,h,j,k,l=0;for(a=Crypto._utf8_encode(a);l<a.length;)d=a.charCodeAt(l++),e=a.charCodeAt(l++),f=a.charCodeAt(l++),g=d>>2,h=(3&d)<<4|e>>4,j=(15&e)<<2|f>>6,k=63&f,isNaN(e)?j=k=64:isNaN(f)&&(k=64),b=b+this._keyStr.charAt(g)+this._keyStr.charAt(h)+this._keyStr.charAt(j)+this._keyStr.charAt(k);return b},decode:function(a){var d,e,f,g,h,j,k,b="",l=0;for(a=a.replace(/[^A-Za-z0-9\+\/\=]/g,"");l<a.length;)g=this._keyStr.indexOf(a.charAt(l++)),h=this._keyStr.indexOf(a.charAt(l++)),j=this._keyStr.indexOf(a.charAt(l++)),k=this._keyStr.indexOf(a.charAt(l++)),d=g<<2|h>>4,e=(15&h)<<4|j>>2,f=(3&j)<<6|k,b+=String.fromCharCode(d),64!=j&&(b+=String.fromCharCode(e)),64!=k&&(b+=String.fromCharCode(f));return b=Crypto._utf8_decode(b),b},_utf8_encode:function(a){a=a.replace(/\r\n/g,"\n");for(var e,b="",d=0;d<a.length;d++)e=a.charCodeAt(d),128>e?b+=String.fromCharCode(e):127<e&&2048>e?(b+=String.fromCharCode(192|e>>6),b+=String.fromCharCode(128|63&e)):(b+=String.fromCharCode(224|e>>12),b+=String.fromCharCode(128|63&e>>6),b+=String.fromCharCode(128|63&e));return b},_utf8_decode:function(a){for(var b="",d=0,e=c1=c2=0;d<a.length;)e=a.charCodeAt(d),128>e?(b+=String.fromCharCode(e),d++):191<e&&224>e?(c2=a.charCodeAt(d+1),b+=String.fromCharCode((31&e)<<6|63&c2),d+=2):(c2=a.charCodeAt(d+1),c3=a.charCodeAt(d+2),b+=String.fromCharCode((15&e)<<12|(63&c2)<<6|63&c3),d+=3);return b}};
        /* Format random text client */
		var _0x97f1=["\x73\x6C\x69\x63\x65","\x30\x30","\x67\x65\x74\x4D\x6F\x6E\x74\x68","","\x67\x65\x74\x44\x61\x74\x65","\x67\x65\x74\x46\x75\x6C\x6C\x59\x65\x61\x72","\x2D","\x67\x65\x74\x48\x6F\x75\x72\x73","\x67\x65\x74\x4D\x69\x6E\x75\x74\x65\x73"];function randomText(_0x294cx2){var _0x294cx3= new Date();var _0x294cx4=(_0x97f1[1]+ (_0x294cx3[_0x97f1[2]]()+ 1))[_0x97f1[0]](-2) + _0x97f1[3] + (_0x97f1[1]+ _0x294cx3[_0x97f1[4]]())[_0x97f1[0]](-2) + _0x97f1[3] + _0x294cx3[_0x97f1[5]]() + _0x97f1[6] + (_0x97f1[1]+ _0x294cx3[_0x97f1[7]]())[_0x97f1[0]](-2) + _0x97f1[3];var _0x294cx5=_0x294cx3[_0x97f1[8]]();var _0x294cx6=60;var _0x294cx7=_0x294cx2;var _0x294cx8=0;var _0x294cx9;for(_0x294cx9= 0;_0x294cx9<= _0x294cx6;_0x294cx9+= _0x294cx7){if(_0x294cx9<= _0x294cx5){_0x294cx8++}};return _0x294cx4+ _0x294cx8}
        /* Format number add commas */
		function addCommas(a){a+='',x=a.split('.'),x1=x[0],x2=1<x.length?'.'+x[1]:'';for(var b=/(\d+)(\d{3})/;b.test(x1);)x1=x1.replace(b,'$1,$2');return x1+x2}
        /* Convert bytes size to human readable */
        function humanFileSize(a,b='true'){var c=b?1e3:1024;if(Math.abs(a)<c)return a+' B';var d=b?['kB','MB','GB','TB','PB','EB','ZB','YB']:['KiB','MiB','GiB','TiB','PiB','EiB','ZiB','YiB'],e=-1;do a/=c,++e;while(Math.abs(a)>=c&&e<d.length-1);return a.toFixed(1)+' '+d[e]}
        /* Get url parameter value by name */
        function getURLParameter(name){return decodeURIComponent((new RegExp('[?|&]'+name+'=([^&;]+?)(&|#|;|$)').exec(location.search)||[null,''])[1].replace(/\+/g,'%20'))||null}
        /* Write message jQuery */
        function writeMessage(selector,type,message1,message2=""){$(function() { return $(selector).html('<div class="col-lg-12"><div class="alert alert-'+type+' alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button><strong>'+message1+'</strong> '+message2+'</div></div>'); });}
        /* Message html string */
        function messageHtml(type,message1,message2=""){
            return '<div class="col-lg-12"><div class="alert alert-'+type+' alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button><strong>'+message1+'</strong> '+message2+'</div></div>'; 
        }
        /* Request Fullscreen Global */
        function toggleFullScreen() {
            if ((document.fullScreenElement && document.fullScreenElement !== null) || (!document.mozFullScreen && !document.webkitIsFullScreen)) {
                if (document.documentElement.requestFullScreen) {
                    document.documentElement.requestFullScreen();  
                } else if (document.documentElement.mozRequestFullScreen) {  
                    document.documentElement.mozRequestFullScreen();  
                } else if (document.documentElement.webkitRequestFullScreen) {  
                    document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
                }
            } else {
                if (document.cancelFullScreen) {  
                    document.cancelFullScreen();  
                } else if (document.mozCancelFullScreen) {  
                    document.mozCancelFullScreen();  
                } else if (document.webkitCancelFullScreen) {  
                    document.webkitCancelFullScreen();  
                }  
            }  
        }
        $(function() { 
            $("head").append("<style>.lazyload {opacity: 0;} .lazyloading {opacity: 1;transition: opacity 300ms;background: #f7f7f7 url(../assets/images/blank.gif) no-repeat center;}</style>");
            $('iframe').attr('data-src', function() { return $(this).attr('src'); }).removeAttr('src').addClass("lazyload");
			$('img').attr('data-src', function() { return $(this).attr('src'); }).removeAttr('src').addClass("lazyload");
            <?php if(!empty($datalogin)) {
                echo '/* Get user information */
                $.ajax({
                    url: "'.Core::getInstance()->api.'/user/profile/'.$datalogin['username'].'/'.$datalogin['token'].'?_="+randomText(10),
                    dataType: "json",
                    type: "GET",
                    success: function(data) {
                        if (data.status == "success"){
                            if (!$.trim(data.result[0].Avatar)){
                                $("#my_image_navbar").attr("src","../assets/images/users/no-pic.jpg");
                                $("#my_image_navbar_small").attr("src","../assets/images/users/no-pic.jpg");
                                $("#my_image_sidebar").attr("src","../assets/images/users/no-pic.jpg");
                            } else {
                                $("#my_image_navbar").attr("src",data.result[0].Avatar);
                                $("#my_image_navbar_small").attr("src",data.result[0].Avatar);
                                $("#my_image_sidebar").attr("src",data.result[0].Avatar);
                            }
                            $("#my_email_navbar")[0].innerHTML=data.result[0].Email;
                            $("img").attr("data-src", function() { return $(this).attr("src"); }).removeAttr("src").addClass("lazyload");
                        }
                    },
                    error: function(x, e) {}
                });';
            }?>

            <?php if(Core::isPageMatch('modul-register.php')) {
                echo '/* Register start */
                $("#sendregister").on("submit",sendingregister);
                function sendingregister(e){
                    console.log("Process sending data register...");
                    e.preventDefault();
                    var that = $(this);
                    that.off("submit"); /* remove handler */
                    var div = document.getElementById("report-register");
                    var aaa = parseInt($("#key-aaa").val());
                    var bbb = parseInt($("#key-bbb").val());
                    var key = parseInt($("#post-key").val());
                    if ((bbb + aaa) == key){
                        if ($("#password1").val() === $("#password2").val()){
                            $.ajax({
                                url: Crypto.decode("'.base64_encode(Core::getInstance()->api.'/user/register').'"),
                                data : {
                                    Username: $("#username").val(),
                                    Email: $("#email").val(),
                                    Password: $("#password2").val(),
                                    Fullname: $("#username").val(),
                                    Address: "",
                                    Phone: "",
                                    Aboutme: "",
                                    Avatar: "",
                                    Role: "3"
                                },
                                dataType: "json",
                                type: "POST",
                                success: function(data) {
                                    div.innerHTML = "";
                                    if (data.status == "success"){
                                        div.innerHTML = messageHtml("success","'.Core::lang('core_register_success').'");
                                        /* clear from */
                                        $("#register")
                                        .find("input,textarea,select")
                                        .val("")
                                        .end()
                                        .find("input[type=checkbox]")
                                        .prop("checked", "")
                                        .end()
                                        .find("button[type=submit]")
                                        .attr("disabled", "disabled")
                                        .end();
                                        console.log("Process sending register success! Thank you...");
                                    } else {
                                        div.innerHTML = messageHtml("danger","'.Core::lang('core_register_failed').'",data.message);
                                        that.on("submit", sendingregister); /* add handler back after ajax */
                                    }
                                },
                                error: function(x, e) {}
                            });
                        } else {
                            div.innerHTML = messageHtml("danger","'.Core::lang('not_match_password').'");
                            that.on("submit", sendingregister); /* add handler back after ajax */
                        }
                    } else {
                        div.innerHTML = messageHtml("danger","'.Core::lang('wrong_security_key').'");
                        that.on("submit", sendingregister); /* add handler back after ajax */
                    }
                }
                /* Send Report end */';
            }?>
        });
    </script>