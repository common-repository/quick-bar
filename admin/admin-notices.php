<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function wp_qbar_admin_notice()
{
    add_thickbox();
    $sharelink_text_array_qbar = array
    (
        "I use Quick Bar - Popup Notification Bar wordpress plugin from @xyzscripts and you should too.",
        "Quick Bar - Popup Notification Bar wordpress plugin from @xyzscripts is awesome",
        "Thanks @xyzscripts for developing such a wonderful Quick Bar wordpress plugin",
        "I was looking for a Popup Notification Bar and I found this. Thanks @xyzscripts",
        "Its very easy to use Quick Bar - Popup Notification Bar wordpress plugin from @xyzscripts",
        "I installed Quick Bar - Popup Notification Bar - Popup Notification Bar from @xyzscripts,it works flawlessly",
        "Quick Bar - Popup Notification Bar wordpress plugin that i use works terrific",
        "I am using Quick Bar - Popup Notification Bar wordpress plugin from @xyzscripts and I like it",
        "The Quick Bar - Popup Notification Bar plugin from @xyzscripts is simple and works fine",
        "I've been using this Quick Bar - Popup Notification Bar plugin for a while now and it is really good",
        "Quick Bar - Popup Notification Bar wordpress plugin is a fantastic plugin",
        "Quick Bar - Popup Notification Bar wordpress plugin is easy to use and works great. Thank you!",
        "Good and flexible Popup Notification Bar plugin especially for beginners",
        "The best Popup Notification Bar wordpress plugin I have used ! THANKS @xyzscripts",
    );
    $sharelink_text_qbar = array_rand($sharelink_text_array_qbar, 1);
    $sharelink_text_qbar = $sharelink_text_array_qbar[$sharelink_text_qbar];
    $xyz_qbar_link = admin_url('admin.php?page=quickbar-basic-settings&qbar_blink=en');
    $xyz_qbar_link = wp_nonce_url($xyz_qbar_link,'qbar_blink');
    $xyz_qbar_notice = admin_url('admin.php?page=quickbar-basic-settings&qbar_notice=hide');
    $xyz_qbar_notice = wp_nonce_url($xyz_qbar_notice,'qbar_notice');
    echo '
	<script type="text/javascript">
			function xyz_qbar_shareon_tckbox(){
			tb_show("Share on","#TB_inline?width=500&amp;height=75&amp;inlineId=show_share_icons_qbar&class=thickbox");
		}
	</script>
	<div id="qbar_notice_td" class="error" style="color: #666666;margin-left: 2px; padding: 5px;line-height:16px;">
	<p>Thank you for using <a href="https://wordpress.org/plugins/quick-bar/" target="_blank"> Quick Bar popup </a> plugin from <a href="https://xyzscripts.com/" target="_blank">xyzscripts.com</a>. Would you consider supporting us with the continued development of the plugin using any of the below methods?</p>
	<p>
	<a href="https://wordpress.org/support/plugin/quick-bar/reviews" class="button xyz_rate_btn" target="_blank">Rate it 5★\'s on wordpress</a>';
    if(get_option('xyz_credit_link')=="0")
        echo '<a href="'.$xyz_qbar_link.'" class="button xyz_backlink_btn xyz_blink">Enable Backlink</a>';
        
        echo '<a class="button xyz_share_btn" onclick=xyz_qbar_shareon_tckbox();>Share on</a>
		<a href="https://xyzscripts.com/donate/5" class="button xyz_donate_btn" target="_blank">Donate</a>
            
	<a href="'.$xyz_qbar_notice.'" class="button xyz_show_btn">Don\'t Show This Again</a>
	</p>
	    
	<div id="show_share_icons_qbar" style="display: none;">
	<a class="button" style="background-color:#3b5998;color:white;margin-right:4px;margin-left:100px;margin-top: 25px;" href="http://www.facebook.com/sharer/sharer.php?u=https://xyzscripts.com/wordpress-plugins/quick-bar/&text='.$sharelink_text_qbar.'" target="_blank">Facebook</a>
	<a class="button" style="background-color:#00aced;color:white;margin-right:4px;margin-left:20px;margin-top: 25px;" href="http://twitter.com/share?url=https://xyzscripts.com/wordpress-plugins/quick-bar/&text='.$sharelink_text_qbar.'" target="_blank">Twitter</a>
	<a class="button" style="background-color:#007bb6;color:white;margin-right:4px;margin-left:20px;margin-top: 25px;" href="http://www.linkedin.com/shareArticle?mini=true&url=https://xyzscripts.com/wordpress-plugins/quick-bar/" target="_blank">LinkedIn</a>
	<a class="button" style="background-color:#dd4b39;color:white;margin-right:4px;margin-left:20px;margin-top: 25px;" href="https://plus.google.com/share?&hl=en&url=https://xyzscripts.com/wordpress-plugins/quick-bar/" target="_blank">Google+</a>
	</div>
	</div>';
        
}
$qbar_installed_date = get_option('qbar_installed_date');
if ($qbar_installed_date=="") {
    $qbar_installed_date = time();
}

if($qbar_installed_date < ( time() - (30*24*60*60)))
{
    if (get_option('xyz_qbar_dnt_shw_notice') != "hide")
    {
        add_action('admin_notices', 'wp_qbar_admin_notice');
    }
}
?>
