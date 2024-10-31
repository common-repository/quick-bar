<?php
// Load the options
if ( ! defined( 'ABSPATH' ) ) exit;
if (isset($_POST['xyz_qbr_html']))
{
    if (
        ! isset( $_REQUEST['_wpnonce'] )
        || ! wp_verify_nonce( $_REQUEST['_wpnonce'],'add-setting' )
        ) {
            wp_nonce_ays( 'add-setting');
            exit;
            
        }
        $_POST=stripslashes_deep($_POST);
        $xyz_qbr_iframe=intval($_POST['xyz_qbr_iframe']);
        $xyz_qbr_bg_opacity=intval($_POST['xyz_qbr_bg_opacity']);
        $xyz_qbr_repeat_interval_timing=intval($_POST['xyz_qbr_repeat_interval_timing']); // for mintue and hours
        $xyz_qbr_html=stripslashes($_POST['xyz_qbr_html']);
        
        $xyz_qbr_width=abs(intval($_POST['xyz_qbr_width']));
        $xyz_qbr_height=abs(intval($_POST['xyz_qbr_height']));
        
        $xyz_qbr_delay=abs(intval($_POST['xyz_qbr_delay']));
        $xyz_qbr_page_count=abs(intval($_POST['xyz_qbr_page_count']));
        $xyz_qbr_repeat_interval=abs(intval($_POST['xyz_qbr_repeat_interval']));
        $xyz_qbr_mode=sanitize_text_field($_POST['xyz_qbr_mode']);
        $xyz_qbr_z_index=intval($_POST['xyz_qbr_z_index']);
        $xyz_qbr_display_user=intval($_POST['xyz_qbr_display_user']);
        $xyz_qbr_showing_option="0,0,0";
        
        $xyz_qbr_bg_color=sanitize_text_field($_POST['xyz_qbr_bg_color']);
        $xyz_qbr_corner_radius=abs(intval($_POST['xyz_qbr_corner_radius']));
        
        $xyz_qbr_width_dim=sanitize_text_field($_POST['xyz_qbr_width_dim']); //for px or %
        $xyz_qbr_height_dim=sanitize_text_field($_POST['xyz_qbr_height_dim']);
        $xyz_qbr_border_color=sanitize_text_field($_POST['xyz_qbr_border_color']);
        $xyz_qbr_border_width=intval($_POST['xyz_qbr_border_width']);
        $xyz_qbr_page_option=intval($_POST['xyz_qbr_page_option']); //Placement mechanism
        $xyz_qbr_close_button_option=$_POST['xyz_qbr_close_button_option'];
        //$xyz_qbr_positioning=$_POST['xyz_qbr_positioning'];
        $xyz_qbr_position_predefined=intval($_POST['xyz_qbr_position_predefined']); //Choose a position
        if($xyz_qbr_page_option==2)
        {
            $qbr_pgf=0;
            $qbr_pof=0;
            $qbr_hp=0;
            if(isset($_POST['xyz_qbr_pages']))
                $qbr_pgf=1;
                if(isset($_POST['xyz_qbr_posts']))
                    $qbr_pof=1;
                    if(isset($_POST['xyz_qbr_hp']))
                        $qbr_hp=1;
                        
                        $xyz_qbr_showing_option=$qbr_pgf.",".$qbr_pof.",".$qbr_hp;
                        update_option('xyz_qbr_showing_option',$xyz_qbr_showing_option);
        }
        $old_page_count=get_option('xyz_qbr_page_count');
        $old_repeat_interval=get_option('xyz_qbr_repeat_interval');
        if(isset($_POST['xyz_qbr_cookie_resett']))
        {
            ?>
	<script language="javascript">

 var cookie_date = new Date ( );  // current date & time
 cookie_date.setTime ( cookie_date.getTime() - 1 );

  document.cookie = "_xyz_qbr_pc=; expires=" + cookie_date.toGMTString()+ ";path=/";
  document.cookie = "_xyz_qbr_until=; expires=" + cookie_date.toGMTString()+ ";path=/";
</script>
<?php
}
		update_option('xyz_qbr_html',$xyz_qbr_html);
		update_option('xyz_qbr_width',$xyz_qbr_width);
		update_option('xyz_qbr_height',$xyz_qbr_height);
		update_option('xyz_qbr_delay',$xyz_qbr_delay);
		update_option('xyz_qbr_page_count',$xyz_qbr_page_count);
		update_option('xyz_qbr_repeat_interval',$xyz_qbr_repeat_interval);
		update_option('xyz_qbr_repeat_interval_timing',$xyz_qbr_repeat_interval_timing);
		update_option('xyz_qbr_mode',$xyz_qbr_mode);
		update_option('xyz_qbr_z_index',$xyz_qbr_z_index);
		update_option('xyz_qbr_corner_radius',$xyz_qbr_corner_radius);
		update_option('xyz_qbr_height_dim',$xyz_qbr_height_dim);
		update_option('xyz_qbr_width_dim',$xyz_qbr_width_dim);
		update_option('xyz_qbr_border_color',$xyz_qbr_border_color);
		update_option('xyz_qbr_border_width',$xyz_qbr_border_width);
		update_option('xyz_qbr_bg_color',$xyz_qbr_bg_color);
		update_option('xyz_qbr_page_option',$xyz_qbr_page_option);
		update_option('xyz_qbr_close_button_option',$xyz_qbr_close_button_option);
		update_option('xyz_qbr_iframe',$xyz_qbr_iframe);
		update_option('xyz_qbr_bg_opacity',$xyz_qbr_bg_opacity);
		update_option('xyz_qbr_display_user',$xyz_qbr_display_user);
		update_option('xyz_qbr_position_predefined',$xyz_qbr_position_predefined);
		?><br>
<div  class="system_notice_area_style1" id="system_notice_area">Settings updated successfully.<span id="system_notice_area_dismiss">Dismiss</span></div>
<?php
}
?>
<style type="text/css">
label{
cursor:default;
}
</style>
<script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery('#qbrbordercolorpicker').hide();
    jQuery('#qbrbordercolorpicker').farbtastic("#xyz_qbr_border_color");
    jQuery("#xyz_qbr_border_color").click(function(){jQuery('#qbrbordercolorpicker').slideToggle();});

    jQuery('#qbrbgcolorpicker').hide();
    jQuery('#qbrbgcolorpicker').farbtastic("#xyz_qbr_bg_color");
    jQuery("#xyz_qbr_bg_color").click(function(){jQuery('#qbrbgcolorpicker').slideToggle();});
  //  jQuery('#qbrqbrcolorpicker').hide();
    //jQuery('#qbrqbrcolorpicker').farbtastic("#xyz_qbr_title_color");
 //   jQuery("#xyz_qbr_title_color").click(function(){jQuery('#qbrqbrcolorpicker').slideToggle();});
  });
  function bgchange()
  {
	  var v;
v=document.getElementById('xyz_qbr_page_option').value;
if(v==1)
{
	document.getElementById('automatic').style.display='block';
	document.getElementById('shopt').style.display='none';
	document.getElementById('shortcode').style.display='none';
}
if(v==2)
{
	document.getElementById('shopt').style.display='block';
	document.getElementById('shortcode').style.display='none';
	document.getElementById('automatic').style.display='none';
}

if(v==3)

{
	document.getElementById('shortcode').style.display='block';
	document.getElementById('shopt').style.display='none';
	document.getElementById('automatic').style.display='none';
}
  }
  function cdcheck()
  {

	 var display_mech;
	 display_mech=document.getElementById('xyz_qbr_mode').value;
	 if(display_mech=="delay_only")
	 {

		 document.getElementById('xyz_qbr_delaysec').style.display='';
		 document.getElementById('xyz_qbr_pages').style.display='none';
	 }
	 if(display_mech=="page_count_only")
	 {

		 document.getElementById('xyz_qbr_delaysec').style.display='none';
		 document.getElementById('xyz_qbr_pages').style.display='';
	 }
	 if(display_mech=="both")
	 {

		 document.getElementById('xyz_qbr_delaysec').style.display='';
		 document.getElementById('xyz_qbr_pages').style.display='';
	 }
  }
</script>
<div >
<?php
$xyz_qbr_height_dim=get_option('xyz_qbr_height_dim');
$xyz_qbr_width_dim=get_option('xyz_qbr_width_dim');
$xyz_qbr_close_button_option=get_option('xyz_qbr_close_button_option');
$xyz_qbr_cookie_resett=get_option('xyz_qbr_cookie_resett');
$xyz_qbr_iframe=get_option('xyz_qbr_iframe');
$xyz_qbr_bg_opacity=get_option('xyz_qbr_bg_opacity');
$xyz_qbr_display_user=get_option('xyz_qbr_display_user');
$xyz_qbr_position_predefined=get_option('xyz_qbr_position_predefined');
?>
<h2>Quick Bar  - Popup Notification Bar Settings</h2>
<form method="post" >
<?php wp_nonce_field( 'add-setting' );?>
<?php
$xyz_qbr_showing_option=get_option('xyz_qbr_showing_option');
$xyz_qbr_sh_arr=explode(",", $xyz_qbr_showing_option);
?>
<table  class="widefat" style="width:98%">
<tr valign="top" >
<td  scope="row" style="width: 50%" ><h3>  Content</h3></td>
<td></td>
</tr>

<tr valign="top" class="disable">
<td scope="row" colspan="1"><label>Show referrer URL based messages? </label></td><td>
<select>
<option style="display: none;">Yes </option>
<option style="display: none;">No </option>
</select>
</td>
</tr>

<tr valign="top" >
<td colspan="2" >
<?php wp_editor(get_option('xyz_qbr_html'),'xyz_qbr_html');?></td>
</tr>
<tr valign="top" id="xyz_qbr_pos"><td scope="row" colspan="2"><h3> Position Settings</h3></td></tr>
<tr valign="top" id="xyz_qbr_predefined">
<td scope="row" colspan="1"><label for="xyz_qbr_position_predefined">Choose a position </label>	</td><td>
<select name="xyz_qbr_position_predefined" id="xyz_qbr_position_predefined"  >

<option value ="1" <?php if($xyz_qbr_position_predefined=='1') echo 'selected'; ?> >On top left corner </option>

<option value ="2" <?php if($xyz_qbr_position_predefined=='2') echo 'selected'; ?> >On left center </option>
<option value ="3" <?php if($xyz_qbr_position_predefined=='3') echo 'selected'; ?> >On bottom left cornor</option>


<option value ="4" <?php if($xyz_qbr_position_predefined=='4') echo 'selected'; ?> >On bottom center </option>

<option value ="5" <?php if($xyz_qbr_position_predefined=='5') echo 'selected'; ?> >On bottom right corner </option>
<option value ="6" <?php if($xyz_qbr_position_predefined=='6') echo 'selected'; ?> >On right center</option>
<option value ="7" <?php if($xyz_qbr_position_predefined=='7') echo 'selected'; ?> >On top right corner </option>

<option value ="8" <?php if($xyz_qbr_position_predefined=='8') echo 'selected'; ?> >On top center </option>

</select>
</td>

</tr>

<tr valign="top" id="xyz_qbr_pos_width">
<td scope="row"><label for="xyz_qbr_width"> Width</label></td>
<td><input class="xyz_qbr_width" name="xyz_qbr_width" type="text" id="xyz_qbr_width"  value="<?php print(get_option('xyz_qbr_width')); ?>" size="40" /><select  name="xyz_qbr_width_dim"   id="xyz_qbr_width_dim" >
<option value ="px" <?php if($xyz_qbr_width_dim=='px') echo 'selected'; ?>>px</option>
<option value ="%" <?php if($xyz_qbr_width_dim=='%') echo 'selected'; ?>>%</option>

</select>
</td>
</tr>
<tr valign="top" id="xyz_qbr_pos_height">
<td scope="row"><label for="xyz_qbr_height"> Height</label></td>
<td><input class="xyz_qbr_width" name="xyz_qbr_height" type="text" id="xyz_qbr_height"  value="<?php print(get_option('xyz_qbr_height')); ?>" size="40" /><select  name="xyz_qbr_height_dim"   id="xyz_qbr_height_dim" >
<option value ="px" <?php if($xyz_qbr_height_dim=='px') echo 'selected'; ?>>px</option>
<option value ="%" <?php if($xyz_qbr_height_dim=='%') echo 'selected'; ?>>%</option>

</select></td>
</tr>

<tr valign="top" class="disable"><td scope="row" colspan="2"><h3> Effect settings</h3></td></tr>
<tr valign="top" class="disable">
<td scope="row"><label> Fade In And Fade Out Effect</label></td>
<td><div>
<input type="radio"><label>Yes</label>
<input type="radio"><label>No</label>
</div></td>
</tr>

<?php
$xyz_qbr_mode=get_option('xyz_qbr_mode');
$xyz_qbr_page_option=get_option('xyz_qbr_page_option');
$xyz_qbr_repeat_interval_timing=get_option('xyz_qbr_repeat_interval_timing');
?>
<tr valign="top"><td scope="row" colspan="2"><h3> Display Logic Settings</h3></td></tr>

<tr valign="top" class="disable" >
<td scope="row"><label>Display control cookie name </label></td>
<td><input readonly qbr class="xyz_qbr_width"/>
</td>
</tr>

<tr valign="top">
<td scope="row"><label for="xyz_qbr_mode"> Display logic </label></td>
<td><select  name="xyz_qbr_mode"   id="xyz_qbr_mode"  onchange="cdcheck()">
<option value ="delay_only" <?php if($xyz_qbr_mode=='delay_only') echo 'selected'; ?>>Based on delay </option>
<option value ="page_count_only" <?php if($xyz_qbr_mode=='page_count_only') echo 'selected'; ?>>Based on  number of pages browsed </option>
<option value ="both" <?php if($xyz_qbr_mode=='both') echo 'selected'; ?>>Based on both </option>
</select></td>
</tr>
<tr valign="top" id="xyz_qbr_delaysec">
<td scope="row"><label for="xyz_qbr_delay"> Delay in seconds before popup appears </label></td>
<td><input  class="xyz_qbr_width" name="xyz_qbr_delay" type="text" id="xyz_qbr_delay"  value="<?php print(get_option('xyz_qbr_delay')); ?>" size="40" /> sec</td>
</tr>

<tr valign="top" id="xyz_qbr_pages">
<td scope="row"><label for="xyz_qbr_page_count">Number of pages to browse before popup appears</label></td>
<td><input class="xyz_qbr_width" name="xyz_qbr_page_count" type="text" id="xyz_qbr_page_count"  value="<?php print(get_option('xyz_qbr_page_count')); ?>" size="40" /> pages</td>
</tr>
<tr valign="top">
<td scope="row"><label for="xyz_qbr_repeat_interval"> Repeat interval for a user </label></td>
<td ><input class="xyz_qbr_width" name="xyz_qbr_repeat_interval" type="text" id="xyz_qbr_repeat_interval"  value="<?php print(get_option('xyz_qbr_repeat_interval')); ?>" size="40" />

<select name="xyz_qbr_repeat_interval_timing" id="xyz_qbr_repeat_interval_timing" >
<option value ="1" <?php if($xyz_qbr_repeat_interval_timing=='1') echo 'selected'; ?> >Hrs </option>

<option value ="2" <?php if($xyz_qbr_repeat_interval_timing=='2') echo 'selected'; ?> >Minutes </option>
</select>
</td>
</tr>

<tr valign="top" class="disable">
<td scope="row"><label>Maximum number of times that the popup should display</label></td>
<td><input readonly type="text" class="xyz_qbr_width"/> </td>
</tr>

<tr valign="top" class="disable">
<td scope="row"><label>Reset counter ?</label></td>
<td><input class="checked_false" type="checkbox"/>
</td>
</tr>

<tr valign="top" >
<td scope="row"><label for="xyz_qbr_display_user">Do not show popup for logged in users ?</label></td>
<td><select name="xyz_qbr_display_user" id="xyz_qbr_display_user">
<option value ="1" <?php if($xyz_qbr_display_user=='1') echo 'selected'; ?>>Yes</option>
<option value ="0" <?php if($xyz_qbr_display_user=='0') echo 'selected'; ?>>No</option>
</select></td>
</tr>

<tr valign="top" class="disable">
<td scope="row"><label>Should popup expire ?</label></td>
<td>
<input class="checked_false" type="radio" /><label>Yes</label>
<input class="checked_false" type="radio" /><label>No</label>
</td>
</tr>

<tr class="disable" valign="top">
<td scope="row"><label>Display trigger </label></td>
<td>
<select>
<option class="disable_option" >On load</option>
<option class="disable_option" >On click</option>
</select></td>
</tr>

<tr valign="top" id="xyz_qbr_close">
<td scope="row" colspan="1"><label for="xyz_qbr_close_button_option"> Close button option </label></td><td>
<select name="xyz_qbr_close_button_option" id="xyz_qbr_close_button_option"  >
<option value ="1" <?php if($xyz_qbr_close_button_option=='1') echo 'selected'; ?> >Yes </option>
<option value ="0" <?php if($xyz_qbr_close_button_option=='0') echo 'selected'; ?> >No </option>
</select>
</td>
</tr>
<tr valign="top">
<td scope="row" colspan="1"><label for="xyz_qbr_iframe">Display as iframe </label></td><td>
<select name="xyz_qbr_iframe" id="xyz_qbr_iframe"  >
<option value ="1" <?php if($xyz_qbr_iframe=='1') echo 'selected'; ?> >Yes </option>
<option value ="0" <?php if($xyz_qbr_iframe=='0') echo 'selected'; ?> >No </option>
</select>
</td>
</tr>

<tr class="disable" valign="top" >
<td scope="row" colspan="1"><label> If content is larger than window?   </label></td>
<td><select class="xyz_qbr_width">
<option class="disable_option" >Hide content </option>
<option class="disable_option" >Show scrollbar </option>
</select>
</td>
</tr>

<tr valign="top" class="disable">
<td scope="row" colspan="1"><label>Target display devices</label></td>
<td><select class="xyz_qbr_width">
<option class="disable_option" >Desktop only</option>
<option class="disable_option" >Both desktop and mobile </option>
</select>
</td>
</tr>


<tr valign="top" class="disable"><td scope="row" colspan="2"><h3> Popup Closing settings</h3></td></tr>
<tr valign="top" class="disable">
<td scope="row" colspan="1"><label> Close mode </label></td><td>
<select class="xyz_qbr_width">
<option class="disable_option" >When user  clicks overlay </option>
<option class="disable_option" >When user clicks close button</option>
</select>
</td>
</tr>
<tr valign="top" class="disable">
<td scope="row" colspan="1"><label> Auto close after timeout </label></td><td>
<select class="xyz_qbr_width">
<option class="disable_option" >No </option>
<option class="disable_option" >Yes </option>
</select>
</td>
</tr>

<tr valign="top" class="disable">
<td scope="row"><label>Don't show again element (Must be id of  element to indicate don't show again in  html content, not applicable in case of iframe display)</label></td>
<td><input readonly type="text" class="xyz_qbr_width"/> eg : #dontshow </td>
</tr>
<tr valign="top" class="disable">
<td scope="row"><label>Don't show again time period (in days)</label></td>
<td><input readonly type="text" class="xyz_qbr_width" />  </td>
</tr>
<tr valign="top" class="disable"><td scope="row" colspan="2"><h3> Javascript Callback Settings</h3></td></tr>
<tr valign="top" class="disable">
<td scope="row"><label>Callback on popup display</label></td>
<td><textarea readonly></textarea> </td>
</tr>
<tr valign="top" class="disable">
<td scope="row"><label>Callback on popup hide</label></td>
<td><textarea readonly></textarea> </td>
</tr>

<tr valign="top"><td scope="row" colspan="2"><h3> Style Settings</h3></td></tr>
<tr valign="top">
<td scope="row"><label for="xyz_qbr_z_index"> Z index</label></td>
<td><input class="xyz_qbr_width" name="xyz_qbr_z_index" type="text" id="xyz_qbr_z_index"  value="<?php print(get_option('xyz_qbr_z_index')); ?>" size="40" /> </td>
</tr>

<tr valign="top" class="disable">
<td scope="row" colspan="1"><label> Background image option </label></td><td>
<select>
<option class="disable_option" >Yes </option>
<option class="disable_option" >No </option>
</select>
</td>
</tr>

<tr valign="top">
<td scope="row"><label for="xyz_qbr_bg_opacity"> Background opacity(0-100)</label></td>
<td><input class="xyz_qbr_width" name="xyz_qbr_bg_opacity" type="text" id="xyz_qbr_bg_opacity" value="<?php print(get_option('xyz_qbr_bg_opacity'));?>"/> </td>
</tr>

<tr valign="top" >
<td scope="row"><label for="xyz_qbr_bg_color"> Background color</label></td>
<td><input  class="xyz_qbr_width" name="xyz_qbr_bg_color" type="text" id="xyz_qbr_bg_color"  value="<?php print(get_option('xyz_qbr_bg_color')); ?>" size="40" /> <div id="qbrbgcolorpicker"></div> </td>
</tr>
<tr valign="top">
<td scope="row"><label for="xyz_qbr_border_color"> Border color</label></td>
<td><input  class="xyz_qbr_width" name="xyz_qbr_border_color" type="text" id="xyz_qbr_border_color"  value="<?php print(get_option('xyz_qbr_border_color')); ?>" size="40" /> <div id="qbrbordercolorpicker"></div> </td>
</tr>
<tr valign="top">
<td scope="row"><label for="xyz_qbr_border_width">  Border width </label></td>
<td><input  class="xyz_qbr_width" name="xyz_qbr_border_width" type="text" id="xyz_qbr_border_width"  value="<?php print(get_option('xyz_qbr_border_width')); ?>" size="40" /> px </td>
</tr>
<tr valign="top" id="xyz_qbr_rad">
<td scope="row"><label for="xyz_qbr_corner_radius">  Border radius </label></td>
<td><input class="xyz_qbr_width" name="xyz_qbr_corner_radius" type="text" id="xyz_qbr_corner_radius"  value="<?php print(get_option('xyz_qbr_corner_radius')); ?>" size="40" /> px </td>
</tr>

<tr valign="top" class="disable">
<td scope="row"><label> Border Shadow</label></td>
<td><div>
<input type="radio" class="checked_false"><label>Yes</label>
<input type="radio" class="checked_false"><label>No</label>
</div>
</td>
</tr>

<tr valign="top"><td scope="row" colspan="2"><h3> Placement Settings</h3></td></tr>
<tr valign="top" id="pgopt" ><td scope="row"><label for="xyz_qbr_page_option"> Placement mechanism </label></td>
<td>
<select name="xyz_qbr_page_option" id="xyz_qbr_page_option" onchange="bgchange()">
<option value ="1" <?php if($xyz_qbr_page_option=='1') echo 'selected'; ?> >Automatic </option>
<option value ="2" <?php if($xyz_qbr_page_option=='2') echo 'selected'; ?> >Specific Pages</option>
<option value ="3" <?php if($xyz_qbr_page_option=='3') echo 'selected'; ?> >Manual </option>
</select></td></tr>


<tr valign="top" ><td scope="row" ></td><td>
<span  id="automatic" >Popup will load in all pages</span>
<span  id="shopt" >
<input name="xyz_qbr_pages" value="<?php echo $xyz_qbr_sh_arr[0];?>"<?php if( $xyz_qbr_sh_arr[0]==1){?> checked="checked"<?php } ?> type="checkbox"> On Pages
<input name="xyz_qbr_posts" value="<?php echo  $xyz_qbr_sh_arr[1];?>"<?php if( $xyz_qbr_sh_arr[1]==1){?> checked="checked"<?php }?>  type="checkbox"> On Posts
<input name="xyz_qbr_hp" value="<?php echo  $xyz_qbr_sh_arr[2];?>"<?php if( $xyz_qbr_sh_arr[2]==1){?> checked="checked"<?php }?>  type="checkbox"> On Home page
</span>
<span  id="shortcode" >Use this short code in your pages - [xyz_qbr_default_code]</span>
</td>
</tr>


<!--  <tr valign="top" id="automatic"  style="display: none"><td scope="row" ></td><td >(Popup will load in all pages)</td>

</tr>

<tr valign="top" id="shortcode"  style="display: none"><td scope="row"></td><td>Use this short code in your pages - [xyz_qbr_default_code]</td>
</tr>-->


<tr valign="top">
<td scope="row"><label for="xyz_lcookie_resett"><h3>Reset cookies ? </h3>
 </label></td>
<td><input name="xyz_qbr_cookie_resett" type="checkbox" id="xyz_qbr_cookie_resett"   <?php  echo 'checked'; ?> />
(This is just for your testing purpose. If you want to see a popup  immediately after you make changes in any settings, you have to reset the cookies.)
 </td>
</tr>
<tr>
<td scope="row"> </td>
<td><br>
<input class="submit_qbr" type="submit" value=" Update Settings " /></td>
</tr>
</table>
</form>
</div>

<div id="xyz_premium_only_info">
	<label>Only available in Premium version</label>
</div>

<script type="text/javascript">
bgchange();
cdcheck();

jQuery(".disable").click(function(e){
	premiumClick(e);
	jQuery(".checked_false").prop("checked", false);
	
});

function premiumClick(e){
var left=e.pageX-170;
var top=e.pageY-30;
	
jQuery("#xyz_premium_only_info").css({"left" : left + "px", "top" : top + "px"});
jQuery("#xyz_premium_only_info").show();
jQuery("#xyz_premium_only_info").fadeIn( "slow", function() {
window.tooltip = setTimeout(function(){ jQuery("#xyz_premium_only_info").hide(); }, 2000);
});
return false;
}
</script>

<style>
#xyz_premium_only_info
{
display:none;
font-family:sans-serif;
font-size:13px;
text-align: center;
border-radius: 5px;
float: left;
background-color: rgb(51, 51, 51);
color: white; 
width: 98px; 
padding: 10px 20px;
position:absolute;
z-index:1000;
}
.disable select,.disable input,.disable input[type=radio]
{
cursor: not-allowed;
}
.disable{
	opacity:0.4;
	cursor:not-allowed;
}
.disable_option
{
display:none;
}
</style>
