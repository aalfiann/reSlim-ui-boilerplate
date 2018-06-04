<?php
require_once realpath(__DIR__ . '/..').'/config.php';
$lang = [
    //core
    'core_register_success' => 'Process Register Successfully!',
    'core_register_failed' => 'Process Register Failed!',
    'core_update_success' => 'Process Update Successfully!',
    'core_update_failed' => 'Process Update Failed!',
    'core_delete_success' => 'Process Delete Successfully!',
    'core_delete_failed' => 'Process Delete Failed!',
    'core_upload_success' => 'Process Upload Successfully!',
    'core_upload_failed' => 'Process Upload Failed!',
    'core_login_failed' => 'Process Login Failed!',
    'core_not_connected' => 'Can not connected to the server!',
    'core_api_add_success' => 'Process Add new API Keys Successfully!',
    'core_api_add_failed' => 'Process Add new API Keys Failed!',
    'core_mail_reset_password1' => 'Request reset password',
    'core_mail_reset_password2' => 'You have already requested to reset password.',
    'core_mail_reset_password3' => 'Here is the link to reset:',
    'core_mail_reset_password4' => 'Just ignore this email if You don\'t want to reset password. Link will be expired 3days from now.',
    'core_mail_reset_password5' => 'Thank You',
    'core_reset_password_success1' => 'Request reset password hasbeen sent to your email!',
    'core_reset_password_success2' => 'If not, try to check spam folder or resend again later.',
    'core_reset_password_failed' => 'Process Forgot Password Failed!',
    'core_change_password_success' => 'Process Change Password Successfully!',
    'core_change_password_failed' => 'Process Change Password Failed!',
    'core_mail_send_success' => 'The message is successfully sent!',
    'core_mail_send_failed' => 'The message is failed to sent!',
    'core_try_again' => 'Please try again later!',
    'core_settings_changed' => 'Settings hasbeen changed!',
    'core_auto_refresh' => 'This page will automatically refresh at 2 seconds...',
    'core_clear_log_success' => 'Process Clear Log Successfuly!',
    'core_clear_log_failed' => 'Process Clear Log Failed!',
    'core_process_add' => 'Process Add',
    'core_process_update' => 'Process Update',
    'core_process_delete' => 'Process Delete',
    //development
    'app' => 'App',
    'system' => 'System',
    'master' => 'Master',
    'maintenance' => 'Maintenance',
    'extension' => 'Extension',
    'develop_process_title' => 'Under Constructions',
    'develop_process_info' => 'Sorry, this page still on process construction.',
    'maintenance_process_title' => 'Under Maintenance',
    'maintenance_process_info' => 'Sorry, this page still on process maintenance.',
    //http message
    'http_title_400' => 'You have Bad Request !',
    'http_title_401' => 'Error Unauthorized User !',
    'http_title_403' => 'This Page is Forbidden !',
    'http_title_404' => 'Page Not Found !',
    'http_title_429' => 'Too many Request !',
    'http_title_451' => 'Unavailable For Legal Reasons !',
    'http_message_400' => 'Please check your connection internet, maybe it is corrupt or something.',
    'http_message_401' => 'Sorry, You should make an authorization to access this page.',
    'http_message_403' => 'Sorry, this page is forbidden for you.',
    'http_message_404' => 'We failed to find any document, maybe it was removed or was deleted.',
    'http_message_429' => 'Sorry, your connection is limit to access this page',
    'http_message_451' => 'Sorry, this page is unavailable for Legal Reasons !',
    'http_back_home' => 'Back to Home',
    //theme
    'theme_panel' => 'Theme Panel',
    'theme_light' => 'Light Theme',
    'theme_dark' => 'Dark Theme',
    'fullscreen' => 'Fullscreen',
    //login
    'login' => 'Login',
    'form_login' => 'Form Login',
    //validation
    'val_numeric_html' => 'Input with number chars only!',
    'val_decimal_html' => 'Input with decimal format. Number and dot chars only!',
    'val_double_html' => 'Input with numeric chars!',
    'val_alphanumeric_html' => 'Input with alphanumeric chars only!',
    'val_email_html' => 'Input according to email address format!',
    //register
    'register' => 'Register',
    'form_register' => 'Form Register',
    'have_account' => 'Already have an account?',
    'username_check_format' => 'Username only alphanumeric 3-20 chars!',
    'username_check_ok' => 'Username is OK!',
    'username_check_found' => 'Username is already registered!',
    'username_check_not_found' => 'Username is not available!',
    'email_check_ok' => 'Email address is OK!',
    'email_check_no' => 'Email address is not available!',
    'email_check_invalid' => 'Email address format is invalid!',
    'pass_check_ok' => 'Password OK!',
    'pass_check_match' => 'Password is match!',
    'pass_check_no' => 'Password is not match!',
    //contact
    'contact_us' => 'Contact Us',
    'form_contact_us' => 'Form Contact Us',
    'send_message_failed' => 'Process Send Message Failed,',
    'wrong_security_key' => 'Wrong security key!',
    'send_message' => 'Send Message',
    //forgot password
    'reset_password' => 'Request Reset Password',
    'form_reset_password' => 'Form Request Reset Password',
    'submit_reset_password' => 'Reset Password',
    //verify password
    'verify_password' => 'Verify New Password',
    'form_verify_password' => 'Form Verify New Password',
    //dashboard
    'dashboard' => 'Dashboard',
    //api key
    'api_key' => 'API Key',
    'api_keys' => 'API Keys',
    //data user, edit, view profile
    'edit_user_profile' => 'Edit User Profile',
    'user_profile' => 'User Profile',
    'my_profile' => 'My Profile',
    'view_profile' => 'View Profile',
    //explore file
    'explore_file' => 'Explore File',
    'file_cloud' => 'File Cloud',
    'upload_file' => 'Upload File to Server',
    'upload_now' => 'Upload Now',
    'detail_file' => 'Detail File',
    'upload_here' => 'Upload files here...',
    'file' => 'File',
    //data page
    'page' => 'Page',
    'page_id' => 'Page ID',
    'image' => 'Image',
    'tags' => 'Tags',
    'description' => 'Description',
    'content' => 'Content',
    'data_page' => 'Data Page',
    'create_page' => 'Create New Page',
    'update_page' => 'Update Page',
    'save_page' => 'Publish Page',
    'form_editor' => 'Form Editor',
    //data branch
    'branch' => 'Branch',
    'branchid' => 'Branch ID',
    //helper page
    'helper_page_image' => 'Image url will be used for SEO Opengraph.',
    'helper_page_tags' => 'Tags is will make easy to reader to read related content.',
    'helper_page_title' => 'This title will be used as a <b>&#x3C;H1&#x3E;</b> tag.',
    'helper_page_description' => 'This is a summary from your content.',
    //user access
    'my_access' => 'My Access',
    'user_access' => 'User Access',
    'title_access' => 'Generated Token Access',
    'info_access' => 'Your token will automatically deleted when you are logout or reach the expired date.',
    'notice_access' => 'You can revoke the token immediately if you feel someone has stolen it.',
    'revoke_access' => 'Revoke',
    'revoke_access_all' => 'Revoke All Token',
    'active_access' => 'Token is being used now',
    'token' => 'Token',
    'date_login' => 'Date Login',
    'expired' => 'Expired',
    //settings
    'tools' => 'Tools',
    'settings' => 'Settings',
    'no_have_api' => 'Doesn\'t have any API Keys? You can create at least one API Key at',
    //label settings
    'label_settings_keyword' => 'Keyword',
    'label_settings_description' => 'Description',
    'label_settings_seopage' => 'Keyword Dynamic Page',
    'label_settings_seosite' => 'Keyword Competitor Site',
    'label_settings_homepath' => 'Frontend Path',
    'label_settings_disqus' => 'Disqus Username',
    'label_settings_sharethis' => 'Sharethis Key',
    'label_settings_facebook' => 'Facebook',
    'label_settings_twitter' => 'Twitter',
    'label_settings_gplus' => 'Google Plus',
    'label_settings_gpub' => 'Google Publisher',
    'label_settings_googleanalytics' => 'Google Analytics',
    'label_settings_googlewebmaster' => 'Google Webmaster',
    'label_settings_bingwebmaster' => 'Bing Webmaster',
    'label_settings_yandexwebmaster' => 'Yandex Webmaster',
    //helper settings
    'helper_settings_title' => 'This is default title name for your website.',
    'helper_settings_keyword' => 'This is default keyword tags for your website.',
    'helper_settings_description' => 'This is default description for your website.',
    'helper_settings_seopage' => 'This is for creating auto mirror link for SEO purpose.',
    'helper_settings_seosite' => 'This is for creating auto mirror link using competitor name for SEO purpose',
    'helper_settings_email' => 'This is will be used for mailing system to work.',
    'helper_settings_homepath' => 'Path must be full using http: or https:',
    'helper_settings_api' => 'This will be used for this website system to work with rest api server.',
    'helper_settings_basepath' => 'Path must be full using http: or https:',
    'helper_settings_disqus' => 'This is for using disqus comment system on your website.',
    'helper_settings_sharethis' => 'This is for using sharing system on your website.',
    'helper_settings_facebook' => 'Link must be full using http: or https:',
    'helper_settings_twitter' => 'Link must be full using http: or https:',
    'helper_settings_gplus' => 'Link must be full using http: or https:',
    'helper_settings_gpub' => 'Link must be full using http: or https:',
    'helper_settings_googleanalytics' => 'This is for tracking your visitor into google.',
    'helper_settings_googlewebmaster' => 'This is for SEO purpose on Google Search Engine.',
    'helper_settings_bingwebmaster' => 'This is for SEO purpose on Bing Search Engine.',
    'helper_settings_yandexwebmaster' => 'This is for SEO purpose on Yandex Search Engine...',
    //input settings
    'input_settings_keyword' => 'Please input the keyword of website separated with commas...',
    'input_settings_description' => 'Please input the description of website...',
    'input_settings_seopage' => 'Please input the keyword page separated with commas...',
    'input_settings_seosite' => 'Please input the keyword competitor site separated with commas...',
    'input_settings_homepath' => 'Please input url frontend folder of your website...',
    'input_settings_disqus' => 'Please input Your Disqus username here...',
    'input_settings_sharethis' => 'Please input Your Sharethis Key here...',
    'input_settings_facebook' => 'Please input Your Facebook page here...',
    'input_settings_twitter' => 'Please input Your Twitter page here...',
    'input_settings_gplus' => 'Please input Your Google Plus page here...',
    'input_settings_gpub' => 'Please input Your Google Publisher page here...',
    'input_settings_googleanalytics' => 'Please input Your ID Google Analytics here...',
    'input_settings_googlewebmaster' => 'Please input Your ID Google Webmaster here...',
    'input_settings_bingwebmaster' => 'Please input Your ID Bing Webmaster here...',
    'input_settings_yandexwebmaster' => 'Please input Your ID Yandex Webmaster here...',
    //error log
    'error_log' => 'Error Log',
    'error_log_title' => 'Error Log in API Server',
    'error_log_description' => 'Here is your data log which is recorded from API Server',
    'clear_log' => 'Clear Log',
    //terminal
    'terminal' => 'Terminal',
    'terminal_notice' => 'This feature is limited!',
    'terminal_notice_message' => 'You can\'t use command like <span class="badge badge-inverse">vi / vim</span>, <span class="badge badge-inverse">nano</span>, <span class="badge badge-inverse">top</span> or <span class="badge badge-inverse">ping</span>.<br>For more information about command and how to use, please read <a href="http://web-console.org" target="_blank">here <i class="fa fa-external-link"></i></a>.',
    //cache
    'cache' => 'Cache',
    'cache_title' => 'Cache as default is filebased and stored in HDD',
    'cache_description' => 'To disable cache system, You have to set <span class="badge badge-inverse">$runcache = false</span> which is hardcoded in <span class="badge badge-inverse">Auth</span> and <span class="badge badge-inverse">SimpleCache</span> class.',
    'cache_clear' => 'Clear Cache',
    'cache_files' => 'Cache File',
    'cache_used' => 'Cache Used',
    'cache_free' => 'Free Space',
    'cache_size' => 'Cache Size',
    'cache_status' => 'Cache Status',
    'cache_status_delete_total'=>'Total Deleted',
    'cache_status_delete_success' => 'Process delete cache is successfuly!',
    'cache_status_delete_failed' => 'Process delete cache is failed!',
    'cache_status_delete_msg_1' => 'Only cached files that have age more than',
    'cache_status_delete_msg_2' => 'seconds, will be deleted.',
    'cache_status_delete_process' => 'Time took for deleting cached file',
    'folder' => 'Folder',
    'notice_cache_onehour' => 'Data will be refreshed automatically per 1 hour.',
    'notice_cache_clear' => 'Clear your browser cache for the latest data.',
    //hdd
    'hdd_total_size' => 'Total Space',
    'hdd_used_size' => 'Used Space',
    'hdd_free_size' => 'Space Available',
    'hdd_use_status' => 'Used HDD Status',
    //backup-db
    'backup' => 'Backup',
    'backup_db' => 'Backup DB',
    'backup_now' => 'Backup Now',
    'backup_info' => 'If the Database size is larger than 1 million rows, then you should backup using command line.',
    'backup_success' => 'Backup DB Successfully!',
    'backup_failed' => 'Backup DB Failed!',
    //packager
    'packager' => 'Packager',
    'packager_detail' => 'Info Detail',
    'packager_install' => 'Install Module',
    'packager_install_success' => 'Installing Module Success',
    'packager_install_failed' => 'Installing Module Failed',
    'packager_install_date' => 'Install Date',
    'packager_zip_source' => 'Source Zip Archive',
    'packager_uninstall' => 'Uninstall Module',
    'packager_uninstall_success' => 'Uninstall Module Success',
    'packager_uninstall_failed' => 'Uninstall Module Failed',
    'packager_desc' => 'Packager is a module to help you to manage third party application.',
    'packager_dev_1' => 'How to create new your own module package?',
    'packager_dev_2' => 'You can start to learn from very simple source code <a href="https://github.com/aalfiann/reSlim-modules-first_mod" target="_blank">here</a>.',
    'packager_help_1' => 'Namespace must be written correctly.',
    'packager_help_2' => 'Source zip archive must be direct link.',
    'packager_running' => 'Used for this page!',
    //package
    'package' => 'Package',
    'package_version' => 'Version',
    'package_size' => 'Size',
    'package_link' => 'Visit Project',
    'package_link_fork' => 'Fork Project',
    'package_compatible' => 'Compatible',
    'package_author' => 'Author',
    'package_license' => 'License',
    'package_readme' => 'README.md',
    'module' => 'Module',
    'namespace' => 'Namespace',
    //general
    'deleted' => 'Deleted!',
    'delete_yes' => 'Yes, Delete It!',
    'delete_ok' => 'OK, Delete It!',
    'are_u_sure' => 'Are You Sure?',
    'deleted_file_warning' => 'Deleted data can not be restored.',
    'all' => 'All',
    'upload' => 'Upload',
    'download' => 'Download',
    'home' => 'Home',
    'username' => 'Username',
    'password' => 'Password',
    'confirm_password' => 'Confirm Password',
    'new_password' => 'New Password',
    'notice_change_password' => 'For security reason, you will automatically logout if you wrong to input your old password.',
    'confirm_new_password' => 'Confirm New Password',
    'change_password' => 'Change Password',
    'not_match_password' => 'Your password is not match!',
    'fullname' => 'Fullname',
    'address' => 'Address',
    'phone' => 'Phone',
    'fax' => 'Fax',
    'email' => 'Email',
    'owner' => 'Owner',
    'pic' => 'PIC',
    'tin' => 'TIN',
    'about_me' => 'About Me',
    'avatar' => 'Avatar',
    'security_key' => 'Security Key:',
    'name' => 'Name',
    'email_address' => 'Email Address',
    'subject' => 'Subject',
    'message' => 'Message',
    'remember_me' => 'Remember Me',
    'forgot_password' => 'Forgot Password?',
    'terms' => 'Terms Of Service',
    'i_agree' => 'I agree to the',
    'not_agree' => 'You are not agree to the terms of service!',
    'close' => 'Close',
    'submit' => 'Submit',
    'search' => 'Search',
    'add' => 'Add new',
    'cancel' => 'Cancel',
    'edit' => 'Edit',
    'manage' => 'Manage',
    'delete' => 'Delete',
    'domain' => 'Domain',
    'data' => 'Data',
    'total' => 'Total',
    'percentage' => 'Percentage',
    'chart' => 'Chart',
    'shows_no' => 'Shows no:',
    'from_total_data' => 'from total data:',
    'export' => 'Export',
    'status' => 'Status',
    'update' => 'Update',
    'user' => 'User',
    'profile' => 'Profile',
    'registered' => 'Registered',
    'last_updated' => 'Last Updated',
    'title' => 'Title',
    'alternate' => 'Alternate',
    'external_link' => 'External Link',
    'browse_file' => 'Browse File',
    'show_detail' => 'Show Detail',
    'base_path' => 'Base Path',
    'url_api' => 'Url API',
    'save' => 'Save',
    'info' => 'Info',
    'not_found' => 'Not Found',
    'logout' => 'Logout',
    'explore' => 'Explore',
    'here' => 'here',
    'status_success' => 'Successfully!',
    'status_failed' => 'Failed!',
    //general table
    'tb_no' => 'No',
    'tb_item_id' => 'Item ID',
    'tb_role' => 'Role',
    'tb_username' => 'Username',
    'tb_created_at' => 'Created',
    'tb_created_by' => 'Created by',
    'tb_updated_at' => 'Updated at',
    'tb_updated_by' => 'Updated by',
    'tb_date_upload' => 'Date Uploaded',
    'tb_upload_by' => 'Uploaded by',
    'tb_file_type' => 'File Type',
    'tb_file_size' => 'File Size',
    'tb_direct_link' => 'Direct Link',
    //datatables default
    'dt_not_found' => 'Sorry, Data is not found',
    'dt_display' => 'Display _MENU_ records per page',
    'dt_info' => 'Showing page _PAGE_ of _PAGES_',
    'dt_info_empty' => 'Showing 0 to 0 of 0 entries',
    'dt_filtered' => '(filtered from _MAX_ total records)',
    'dt_table_empty' => 'No records found',
    'dt_loading' => '<i class=\"fa fa-circle-o-notch fa-spin\"></i> Loading...',
    'dt_process' => '<i class=\"fa fa-cog fa-spin\"></i> Processing...',
    'dt_search' => 'Search:',
    'dt_thousands' => ',',
    'dt_first' => '<i class="mdi mdi-skip-backward"></i>',
    'dt_last' => '<i class="mdi mdi-skip-forward"></i>',
    'dt_next' => '<i class="mdi mdi-skip-next"></i>',
    'dt_prev' => '<i class="mdi mdi-skip-previous"></i>',
    'dt_sort_asc' => ': activate to sort column ascending',
    'dt_sort_desc' => ': activate to sort column descending',
    //datatables custom
    'dt_shows_page' => 'Shows page',
    'dt_of' => 'of',
    //general input form
    'input_username' => 'Your Username',
    'input_password' => 'Your Password',
    'input_name' => 'Your Name here...',
    'input_email' => 'Your Email Address here...',
    'input_subject' => 'Please input the subject here...',
    'input_message' => 'Please input the message here...',
    'input_security_key' => 'Answer this question here...',
    'input_confirm_password' => 'Repeat your Password',
    'input_fullname' => 'Your Fullname here...',
    'input_address' => 'Your Address here...',
    'input_phone' => 'Your Phone here...',
    'input_about_me' => 'Here can be your description...',
    'input_avatar' => 'Please input url image for Your Avatar.',
    'input_search' => 'Search here...',
    'input_domain' => 'Your domain here...',
    'input_api_key' => 'Your API Key here...',
    'input_image_page' => 'Please input url image for your page here...',
    'input_title_page' => 'Please input the title for your page here...',
    'input_tags_page' => 'Please input tags for your page separated with commas here...',
    'input_description_page' => 'Please input small description for your page here...',
    'input_content_page' => 'Please input the content for your page here...',
    'input_title_file' => 'Title name of your file...',
    'input_title_website' => 'Please input the title of your website...',
    'input_alternate_file' => 'Alternate name of your file...',
    'input_external_link' => 'Url to the external link...',
    'input_choose_file' => 'Choose File',
    'input_item_id' => 'The Item ID of your file...',
    'input_date_upload' => 'The Date Upload of your file...',
    'input_upload_by' => 'The username of the uploader...',
    'input_file_type' => 'The Type of your file...',
    'input_direct_link' => 'The url direct link of your file...',
    'input_base_path' => 'Please input url folder of Your website...',
    'input_url_api' => 'Please input url folder of Your Rest API...',
    'input_required' => 'This field must be filled!',
    'input_required_not_zero' => 'Can not be filled with zero!',
    //general modal
    'modal_terms' => '<p>You agree, through your use of this service, that you will not use this
    application to post any material which is knowingly false and/or defamatory,
    inaccurate, abusive, vulgar, hateful, harassing, obscene, profane, sexually
    oriented, threatening, invasive of a person\'s privacy, or otherwise violative
    of any law. You agree not to post any copyrighted material unless the
    copyright is owned by you.</p>
    
    <p>We as owner of this application also reserve the right to reveal your identity (or
    whatever information we know about you) in the event of a complaint or legal
    action arising from any message posted by you. We log all internet protocol
    addresses accessing this web site.</p>
    
    <p>Please note that advertisements, chain letters, pyramid schemes, and
    solicitations are inappropriate on this application.</p>
    
    <p>We reserve the right to remove any content for any reason or no reason at
    all. We reserve the right to terminate any membership for any reason or no
    reason at all.</p>
    
    <p>You must be at least 13 years of age to use this service.</p>'
];