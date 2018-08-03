<!-- ============================================================== -->
    <!-- Lazyload Image or iFrame -->
    <!-- ============================================================== -->
    <script src="js/lazysizes.min.js"></script>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo Core::getInstance()->assetspath?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo Core::getInstance()->assetspath?>/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo Core::getInstance()->assetspath?>/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo Core::getInstance()->assetspath?>/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo Core::getInstance()->assetspath?>/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo Core::getInstance()->assetspath?>/plugins/styleswitcher/jQuery.style.switcher.js"></script>

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
            setMetaTheme(getTheme);
            console.log("Saving theme "+getTheme+"...");
        }
        function checkActiveTheme(classTheme){
            var selection = document.getElementById("themecolors") !== null;
            if (selection){
                document.getElementById("themecolors").querySelector("ul > li > a."+classTheme+"-theme").className = classTheme+"-theme working";
            }
        }
        function setMetaTheme(getTheme){var a="";a="blue"===getTheme?"#1976d2":"green"===getTheme?"#00acc1":"red"===getTheme?"#f62d51":"purple"===getTheme?"#7460ee":"megna"===getTheme?"#00897b":"default-dark"===getTheme?"#009efb":"green-dark"===getTheme?"#00acc1":"red-dark"===getTheme?"#f62d51":"blue-dark"===getTheme?"#1e88e5":"purple-dark"===getTheme?"#7460ee":"megna-dark"===getTheme?"#00897b":"default"===getTheme?"#455a64":"#1976d2";changeMeta("name","theme-color",a)}
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
        setMetaTheme(getTheme);
        checkActiveTheme(getTheme);
        /* Cryptography */
		var Crypto={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(a){var b="",d,e,f,g,h,j,k,l=0;for(a=Crypto._utf8_encode(a);l<a.length;)d=a.charCodeAt(l++),e=a.charCodeAt(l++),f=a.charCodeAt(l++),g=d>>2,h=(3&d)<<4|e>>4,j=(15&e)<<2|f>>6,k=63&f,isNaN(e)?j=k=64:isNaN(f)&&(k=64),b=b+this._keyStr.charAt(g)+this._keyStr.charAt(h)+this._keyStr.charAt(j)+this._keyStr.charAt(k);return b},decode:function(a){var d,e,f,g,h,j,k,b="",l=0;for(a=a.replace(/[^A-Za-z0-9\+\/\=]/g,"");l<a.length;)g=this._keyStr.indexOf(a.charAt(l++)),h=this._keyStr.indexOf(a.charAt(l++)),j=this._keyStr.indexOf(a.charAt(l++)),k=this._keyStr.indexOf(a.charAt(l++)),d=g<<2|h>>4,e=(15&h)<<4|j>>2,f=(3&j)<<6|k,b+=String.fromCharCode(d),64!=j&&(b+=String.fromCharCode(e)),64!=k&&(b+=String.fromCharCode(f));return b=Crypto._utf8_decode(b),b},_utf8_encode:function(a){a=a.replace(/\r\n/g,"\n");for(var e,b="",d=0;d<a.length;d++)e=a.charCodeAt(d),128>e?b+=String.fromCharCode(e):127<e&&2048>e?(b+=String.fromCharCode(192|e>>6),b+=String.fromCharCode(128|63&e)):(b+=String.fromCharCode(224|e>>12),b+=String.fromCharCode(128|63&e>>6),b+=String.fromCharCode(128|63&e));return b},_utf8_decode:function(a){for(var b="",d=0,e=c1=c2=0;d<a.length;)e=a.charCodeAt(d),128>e?(b+=String.fromCharCode(e),d++):191<e&&224>e?(c2=a.charCodeAt(d+1),b+=String.fromCharCode((31&e)<<6|63&c2),d+=2):(c2=a.charCodeAt(d+1),c3=a.charCodeAt(d+2),b+=String.fromCharCode((15&e)<<12|(63&c2)<<6|63&c3),d+=3);return b}};
        /* Format random text client */
		var _0x97f1=["\x73\x6C\x69\x63\x65","\x30\x30","\x67\x65\x74\x4D\x6F\x6E\x74\x68","","\x67\x65\x74\x44\x61\x74\x65","\x67\x65\x74\x46\x75\x6C\x6C\x59\x65\x61\x72","\x2D","\x67\x65\x74\x48\x6F\x75\x72\x73","\x67\x65\x74\x4D\x69\x6E\x75\x74\x65\x73"];function randomText(_0x294cx2){var _0x294cx3= new Date();var _0x294cx4=(_0x97f1[1]+ (_0x294cx3[_0x97f1[2]]()+ 1))[_0x97f1[0]](-2) + _0x97f1[3] + (_0x97f1[1]+ _0x294cx3[_0x97f1[4]]())[_0x97f1[0]](-2) + _0x97f1[3] + _0x294cx3[_0x97f1[5]]() + _0x97f1[6] + (_0x97f1[1]+ _0x294cx3[_0x97f1[7]]())[_0x97f1[0]](-2) + _0x97f1[3];var _0x294cx5=_0x294cx3[_0x97f1[8]]();var _0x294cx6=60;var _0x294cx7=_0x294cx2;var _0x294cx8=0;var _0x294cx9;for(_0x294cx9= 0;_0x294cx9<= _0x294cx6;_0x294cx9+= _0x294cx7){if(_0x294cx9<= _0x294cx5){_0x294cx8++}};return _0x294cx4+ _0x294cx8}
        /* Format text to ucwords */
        function ucwords(a){return a=a.toLowerCase().replace(/^[\u00C0-\u1FFF\u2C00-\uD7FF\w]|\s[\u00C0-\u1FFF\u2C00-\uD7FF\w]/g,function(b){return b.toUpperCase()}),a}
        /* Format date to human readable */
        function formatDate(a='',b=!1){a=''==a||null==a?new Date:new Date(a);var c=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],d=a.getDate().toString(),e=a.getMonth(),f=a.getFullYear(),g=a.getHours().toString(),h=a.getMinutes().toString(),i=a.getSeconds().toString(),j=d.split(''),k=g.split(''),l=h.split(''),m=i.split('');return!1==b?(j[1]?d:'0'+j[0])+'-'+c[e]+'-'+f:(j[1]?d:'0'+j[0])+'-'+c[e]+'-'+f+' '+(k[1]?g:'0'+k[0])+':'+(l[1]?h:'0'+l[0])+':'+(m[1]?i:'0'+m[0])}
        /* Format number add commas */
		function addCommas(a){a+='',x=a.split('.'),x1=x[0],x2=1<x.length?'.'+x[1]:'';for(var b=/(\d+)(\d{3})/;b.test(x1);)x1=x1.replace(b,'$1,$2');return x1+x2}
        /* Limit round decimal with nearest point */
        function limitRound(a,b=0.5){var c=0;return c=a-Math.floor(a)>=b?1:0,Math.floor(a+c)}
        /* Convert bytes size to human readable */
        function humanFileSize(a,b='true'){var c=b?1e3:1024;if(Math.abs(a)<c)return a+' B';var d=b?['kB','MB','GB','TB','PB','EB','ZB','YB']:['KiB','MiB','GiB','TiB','PiB','EiB','ZiB','YiB'],e=-1;do a/=c,++e;while(Math.abs(a)>=c&&e<d.length-1);return a.toFixed(1)+' '+d[e]}
        /* Get url parameter value by name */
        function getURLParameter(name){return decodeURIComponent((new RegExp('[?|&]'+name+'=([^&;]+?)(&|#|;|$)').exec(location.search)||[null,''])[1].replace(/\+/g,'%20'))||null}
        /* Write message jQuery */
        function writeMessage(selector,type,message1,message2=""){$(function() { return $(selector).html('<div class="col-lg-12"><div class="alert alert-'+type+' alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button><strong>'+message1+'</strong> '+message2+'</div></div>'); });}
        /* Message html string */
        function messageHtml(type,message1,message2=""){return '<div class="col-lg-12"><div class="alert alert-'+type+' alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button><strong>'+message1+'</strong> '+message2+'</div></div>'; }
        /* Validation Regex. Default is alphanumeric. */
        function validationRegex(a,b="alphanumeric",c=!1){b="required"===b?/.*\S.*/:"date"===b?/([123456789]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/:"timestamp"===b?/^\d\d\d\d-(0?[1-9]|1[0-2])-(0?[1-9]|[12][0-9]|3[01]) (00|[0-9]|1[0-9]|2[0-3]):([0-9]|[0-5][0-9]):([0-9]|[0-5][0-9])$/:"alphanumeric"===b?/^[a-zA-Z0-9]+$/:"alphabet"===b?/^[a-zA-Z]+$/:"notzero"===b?/^[1-9][0-9]*$/:"decimal"===b?/^[+-]?[0-9]+(?:\.[0-9]+)?$/:"numeric"===b?/^[0-9]+$/:"double"===b?/^[+-]?[0-9]+(?:,[0-9]+)*(?:\.[0-9]+)?$/:"username"===b?/^[a-zA-Z0-9]{3,20}$/:"email"===b?/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/:b;var d="";return d=c?document.getElementById(a).value:a,!1!=b.test(d)}
        /* Slugify */
        function slugify(a){a=a.replace(/^\s+|\s+$/g,""),a=a.toLowerCase();for(var b="\xC1\xC4\xC2\xC0\xC3\xC5\u010C\xC7\u0106\u010E\xC9\u011A\xCB\xC8\xCA\u1EBC\u0114\u0206\xCD\xCC\xCE\xCF\u0147\xD1\xD3\xD6\xD2\xD4\xD5\xD8\u0158\u0154\u0160\u0164\xDA\u016E\xDC\xD9\xDB\xDD\u0178\u017D\xE1\xE4\xE2\xE0\xE3\xE5\u010D\xE7\u0107\u010F\xE9\u011B\xEB\xE8\xEA\u1EBD\u0115\u0207\xED\xEC\xEE\xEF\u0148\xF1\xF3\xF6\xF2\xF4\xF5\xF8\xF0\u0159\u0155\u0161\u0165\xFA\u016F\xFC\xF9\xFB\xFD\xFF\u017E\xFE\xDE\u0110\u0111\xDF\xC6a\xB7/_,:;",d=0,e=b.length;d<e;d++)a=a.replace(new RegExp(b.charAt(d),"g"),"AAAAAACCCDEEEEEEEEIIIINNOOOOOORRSTUUUUUYYZaaaaaacccdeeeeeeeeiiiinnooooooorrstuuuuuyyzbBDdBAa------".charAt(d));return a=a.replace(/[^a-z0-9 -]/g,"").replace(/\s+/g,"-").replace(/-+/g,"-"),a}
        /* Disable button by id */
        function disableClickButton(selectorid,todo=!0,buttontext=''){btn=document.getElementById(selectorid),btn.disabled=todo,''!=buttontext&&(btn.innerHTML=buttontext)}
        /* Change meta */
        function changeMeta(type="name",name,content){for(var a=document.getElementsByTagName("meta"),b=0;b<a.length;b++)a[b].getAttribute(type)&&a[b].getAttribute(type)===name&&a[b].setAttribute("content",content)}
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
        /* Request Fullscreen on some element id */
        function setFullscreen(elementid){
            var el = document.getElementById(elementid);
            if ((document.fullScreenElement && document.fullScreenElement !== null) || (!document.mozFullScreen && !document.webkitIsFullScreen)) {
                if (el.requestFullscreen) {
                    el.requestFullscreen();
                } else if (el.mozRequestFullScreen) {
                    el.mozRequestFullScreen();
                } else if (el.webkitRequestFullscreen) {
                    el.webkitRequestFullscreen();
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
            $("head").append("<style>.lazyload {opacity: 0;} .lazyloading {opacity: 1;transition: opacity 300ms;background: #f7f7f7 url(<?php echo Core::getInstance()->assetspath?>/images/blank.gif) no-repeat center;}</style>");
            $('iframe').attr('data-src', function() { return $(this).attr('src'); }).removeAttr('src').addClass("lazyload");
			$('img').attr('data-src', function() { return $(this).attr('src'); }).removeAttr('src').addClass("lazyload");
            <?php if(!empty($datalogin)) {
                echo '/* Get user information */
                $.ajax({
                    url: Crypto.decode("'.base64_encode(Core::getInstance()->api.'/user/profile/'.$datalogin['username'].'/'.$datalogin['token']).'")+"?_="+randomText(10),
                    dataType: "json",
                    type: "GET",
                    success: function(data) {
                        if (data.status == "success"){
                            if (!$.trim(data.result[0].Avatar)){
                                $("#my_image_navbar").attr("src","'.Core::getInstance()->assetspath.'/images/users/no-pic.jpg");
                                $("#my_image_navbar_small").attr("src","'.Core::getInstance()->assetspath.'/images/users/no-pic.jpg");
                                $("#my_image_sidebar").attr("src","'.Core::getInstance()->assetspath.'/images/users/no-pic.jpg");
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
                            if (validationRegex("username","username",true)){
                                $.ajax({
                                    url: Crypto.decode("'.base64_encode(Core::getInstance()->api.'/user/register/public').'"),
                                    data : {
                                        Username: $("#username").val(),
                                        Email: $("#email").val(),
                                        Password: $("#password2").val(),
                                        Fullname: $("#username").val(),
                                        Address: "",
                                        Phone: "",
                                        Aboutme: "",
                                        Avatar: "",
                                        Role: Crypto.decode("'.base64_encode('5').'")
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
                                            $("#usercheck").html("");
                                            $("#emailcheck").html("");
                                            $("#passwordcheck1").html("");
                                            $("#passwordcheck2").html("");
                                            $("#securitycheck").html("");
                                            console.log("Process sending register success! Thank you...");
                                        } else {
                                            div.innerHTML = messageHtml("danger","'.Core::lang('core_register_failed').'",data.message);
                                            that.on("submit", sendingregister); /* add handler back after ajax */
                                        }
                                    },
                                    error: function(x, e) {}
                                });
                            } else {
                                div.innerHTML = messageHtml("danger","'.Core::lang('core_register_failed').'","'.Core::lang('username_check_format').'");
                                that.on("submit", sendingregister); /* add handler back after ajax */
                            }
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

            <?php 
                if (!empty(Core::getInstance()->googleanalytics)){
					echo '/* Google Analytics */
					(function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){
						(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
						m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
					})(window,document,\'script\',\'https://www.google-analytics.com/analytics.js\',\'ga\');
					ga(\'create\', \''.Core::getInstance()->googleanalytics.'\', \'auto\');
					ga(\'send\', \'pageview\');';
                }
            ?>
        });
        
        <?php if(empty($datalogin)) {
                echo '/* Global Search */
                    var selection = document.querySelector("#globalsearch") !== null;
                    if(selection){
                        document.querySelector("#globalsearch").addEventListener("keypress", function (e) {
                            var key = e.which || e.keyCode;
                            if (key === 13) {
                                window.location.href = "blog/"+document.getElementById("globalsearch").value;
                            }
                        });
                    }';
            }
        ?>
    </script>