<?php
//Load CSS and scripts
function theme_styles() { 
	wp_enqueue_style( 'theme-styles', get_template_directory_uri() . '/style.css', array(), false, 'all' );
	wp_enqueue_script( 'isotope-layout', 'https://unpkg.com/isotope-layout@3.0.3/dist/isotope.pkgd.min.js', array('jquery'), '3.0.3', true );
	wp_enqueue_script( 'imagesloaded', 'https://unpkg.com/imagesloaded@4.1.1/imagesloaded.pkgd.min.js', array('jquery'), '4.1.1', true );
	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/main.js', array ( 'jquery' ), true);
	wp_enqueue_script( 'rellax', get_template_directory_uri() . '/js/rellax.min.js', true); 
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

add_theme_support('post-thumbnails');
add_theme_support( 'menus' );

function wpb_custom_new_menu() {
  register_nav_menu('my-custom-menu',__( 'Main site navigation' ));
}
add_action( 'init', 'wpb_custom_new_menu' );

function my_nav_wrap() {
  $thispost = get_the_ID();
  $thispostlink = get_permalink( $thispost );
			if(strpos($thispostlink,'nl')>0)
			{
				$thislanguage = 'Nederlands';
				$thatlanguage = 'English';
			} else {
				$thislanguage = 'English';
				$thatlanguage = 'Nederlands';
			}
			$thatpostlink = get_field('language_switch', $thispost);
  // default value of 'items_wrap' is <ul id="%1$s" class="%2$s">%3$s</ul>'
  // open the <ul>, set 'menu_class' and 'menu_id' values
  $wrap  = '<ul id="%1$s" class="%2$s">';
  // get nav items as configured in /wp-admin/
  $wrap .= '%3$s';
  // the static link 
  if($thatpostlink != ''){
  	$wrap .= '<li class=""><a href="' . $thatpostlink .'">'. $thatlanguage . '</a></li>';
  } else if ($thislanguage == 'Nederlands'){
	$wrap .= '<li class=""><a href="https://bohemiaamsterdam.com/en">'. $thatlanguage . '</a></li>';  
  } else if ($thislanguage == 'English'){
	$wrap .= '<li class=""><a href="https://bohemiaamsterdam.com/nl">'. $thatlanguage . '</a></li>';  
  }
  // close the <ul>
  $wrap .= '</ul>';
  // return the result
  return $wrap;
}

// Images
function html5_insert_image( $html, $id, $caption, $title, $align, $url, $size, $alt ) {
  $src  = wp_get_attachment_image_src( $id, $size, false );
  $html5 = "<figure>";
  if ( $url ) {
    $html5 .= "<a href=\"$url\"><img src=\"$src[0]\" alt=\"$alt\" /></a>";
  } else {
    $html5 .= "<img src=\"$src[0]\" alt=\"$alt\" />";
  }
  if ( $caption ) {
    $html5 .= "<figcaption>$caption</figcaption>";
  }
  $html5 .= "</figure>";
  return $html5;
}

add_filter( 'image_send_to_editor', 'html5_insert_image', 10, 9 );

// To check for the blog page
function is_blog () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}

// Gallery format
// Remove default gallery style
add_filter( 'use_default_gallery_style', '__return_false' );

// Allow SVG uploads
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// add classes to links for next and prev posts pagination
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="button-load-more"';
}

// Blockquote shortcode
function quote_showcase($atts) {
   extract(shortcode_atts(array(
      'imgid' => quote,
      'text' => quote,
	  'name' => quote,
	  'info' => quote
   ), $atts));
	$nameimg = wp_get_attachment_image_src( $imgid, 'thumbnail');
return '<blockquote class="col-lg-10"><div class="row">' . $text . '</div><div class="author-wrapper row middle-xs"><img src="' . $nameimg[0] . '" alt="' . $name . ' width="54" height="54"><div class="author-inner"><div class="row">' . $name . '</div><div class="row">' . $info . '</div></div></div></blockquote>';
}

add_shortcode('quote', 'quote_showcase');

// title tag
add_theme_support( 'title-tag' );

//speed up Contact form 7 by loading associated javascript files ONLY on the contact form itself.
add_action( 'wp_print_scripts', 'my_deregister_javascript', 100 );
function my_deregister_javascript() {
	if ( !is_front_page() && !is_page('Contact') ) {wp_deregister_script( 'contact-form-7' );}}
add_action( 'wp_print_styles', 'my_deregister_styles', 100 );
function my_deregister_styles() {
	if ( !is_front_page() && !is_page('Contact') ) {wp_deregister_style( 'contact-form-7' );}}


/*
function send_email_to_user() {
	if(isset($_POST['email']) && !empty($_POST['email'])){
		global $wpdb;
		$email_args['email'] = $_POST['email'];
		if(isset($_POST['detnawtsop'])){
			$post_id = $_POST['detnawtsop'];
			$email = $_POST["email"];
			
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			  $emailErr = __("Invalid email format from PHP", 'html5blank');
			  echo $emailErr;exit;
			}
			
			$post_file = get_post($post_id);
			
			if($post_file){
				$email_args['file_url'] = $post_file->guid;
				// send emails to admin and user
			    $ok = send_email($email_args);
			    if($ok){
					echo "thankyou";
			    }else{
					echo _('The email was not sent. Please try again.', 'html5blank');
				}
			}
		}else{
			echo _('There no file to be downloaded', 'html5blank');
		}
	}

	exit;
}

// send emails to admins when a visitor requests a masterclass
add_action( 'wp_ajax_nopriv_send_masterclass', 'send_masterclass' );
add_action( 'wp_ajax_send_masterclass', 'send_masterclass' );
function send_masterclass(){
	
	$post_id = $_POST['thePost'];
	$visitor_email = $_POST['email'];
	$masterclass_id = get_field('downloadable', $post_id );
	
	if( $masterclass_id ){
		$masterclass_id = $masterclass_id[0];
		$masterclass = get_post($masterclass_id);
		
		if($masterclass){
			$masterclass_title = $masterclass->post_title;
			$masterclass_subtitle = $masterclass->post_excerpt;
			$masterclass_intro = $masterclass->post_content;
			$file = get_field('downloadable_file', $masterclass_id);
			$admin_emails = 'sebastian@bohemiaamsterdam.com';

			//$masterclass_file = '';
			if($file && $admin_emails){
				$message = mail_code_template($file);
				$headers  = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type: text/html; charset=".get_bloginfo('charset')."" . "\r\n"; //text/html
				$headers .= "From: Bohemia Amsterdam <sebastian@bohemiaamsterdam.com>" . "\r\n";
				wp_mail( $visitor_email, 'Bohemia Amsterdam Downloadable request', $message, $headers );
				
				foreach($admin_emails as $email){
					$message = sprintf("Visitor with this email address %s requested this file: %s", $visitor_email, $file);
					wp_mail( $email, 'Bohemia Amsterdam downloadable request', $message, $headers );
				}
				echo 'thankyou';
			}
			
		}
	}
	exit;
}

add_action( 'wp_ajax_nopriv_send_email', 'send_email_to_user' );
add_action( 'wp_ajax_send_email', 'send_email_to_user' );

function send_email($email_args){
    require_once 'additional/class.phpmailer.php';

    $mail = new PHPMailer(true); //defaults to using php "mail()"; the true param means it will throw exceptions on errors, which we need to catch
    $mail->IsSMTP();
    $mail->SMTPSecure = 'ssl';
    // SMTP server
    $mail->Host = 's050.systemsunit.com';
    // enables SMTP debug information (for testing)
    $mail->SMTPDebug = false;
    // enable SMTP authentication
    $mail->SMTPAuth = true;
    // set the SMTP port for the GMAIL server
    $mail->Port = 465;
    // SMTP account username
    $mail->Username = 'development@octagram.ro';
    $mail->Password = 'devoctagr34';
	
	// send an email to user
	$adminEmail = 'info@bohemiaamsterdam.com';
	
    try {
        
        $mail->AddAddress($email_args['email'], get_bloginfo('name')); // name to be Changed
    
        $mail->SetFrom($adminEmail, get_bloginfo('name'));
		
        $mail->Subject = __('Your download request','html5blank');
		
        $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
        $body = html_mail_template($email_args['file_url']);
        
        $mail->MsgHTML($body);
		
        return $mail->Send(); // send the email
		
    } catch (phpmailerException $e) {
       //echo $e->errorMessage(); //Pretty error messages from PHPMailer
    } catch (Exception $e) {
       //echo $e->getMessage(); //Boring error messages from anything else!
    }
    
    // send an email to administrator
    try{
		
        $mail->AddReplyTo($adminEmail, get_bloginfo('name'));
        $mail->ClearAllRecipients( ); 
        $mail->AddAddress($adminEmail, 'Site Admin');
        $mail->SetFrom($adminEmail, get_bloginfo('name'));
        $mail->Subject = __('A file has been requested','html5blank');
        $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
        
        $body = sprintf( esc_html__( 'Email address: %s Requested file: <br/> <a href="%s">%s</a>', 'html5blank' ), $email_args['email'],  $email_args['file_url'],  $email_args['file_url']);
		
        $mail->MsgHTML($body);
        
        $ok = $mail->Send();
		
    } catch (phpmailerException $e) {
        echo $e->errorMessage(); //Pretty error messages from PHPMailer
    } catch (Exception $e) {
        echo $e->getMessage(); //Boring error messages from anything else!
    }
	
}

function html_mail_template( $file_url ){
	//global $blog_id;
	//$current_blog_details = get_blog_details( array( 'blog_id' => $blog_id ) );
	$string = '<table cellspacing="0" style="width:550px;">
            <tr>
                <td style="padding:30px;">
                    '.__('Dear Sir/Madam,', 'html5blank') .' <br/><br/>
					Thank you for your interest. Here\'s the direct link to the file you requested:<br/>
					 <a href="'. $file_url .'">'. $file_url .'</a><br/><br/>
                </td>
				
            </tr>
			<tr>
                <td style="padding:0px 30px;">
					If you have any questions, don\'t be afraid to reach out.<br/>
					All the best,
				</td>
			</tr>
			<tr>
                <td style="padding:15px 30px;">
					'. get_bloginfo('name'). '<br/>
					
				</td>
			</tr>
			</table>';
	
	return $string;
}

function mail_code_template( $file ){ // the email sent when an user requests a file
    $string = '
        <div marginwidth="0" marginheight="0" style="font:14px/20px \'Helvetica\',Arial,sans-serif;margin:0;padding:75px 0 0 0;text-align:center;background-color:#fdce00">
  <center>
    <table border="0" cellpadding="20" cellspacing="0" height="100%" width="100%" style="background-color:#fdce00">
      <tbody>
        <tr>
          <td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="600" style="border-radius:6px;background-color:none">
              <tbody>
                <tr>
                  <td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="600">
                      <tbody>
                        <tr>
                          <td><h1 style="font-size:28px;line-height:110%;margin-bottom:30px;margin-top:0;padding:0">
                              <div style="text-align:center"><a href="http://aatvos.com" style="color:#3f3f38" target="_blank"><img src="https://gallery.mailchimp.com/0837d9e51a7ef903f9de37857/images/b8cb0feb-2dfc-47f2-b84c-83ea544204e9.png" alt="Aatvos" border="0" width="296" height="32"></a></div>
                            </h1></td>
                        </tr>
                      </tbody>
                    </table></td>
                </tr>
                <tr>
                  <td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="600" style="border-radius:6px;background-color:#fdce00">
                      <tbody>
                        <tr>
                          <td align="left" valign="top" style="line-height:150%;font-family:Helvetica;font-size:16px;color:#000000;padding:20px"><h2 style="font-size:22px;line-height:28px;margin:0 0 12px 0">Thank you for your interest in my work. Below you find the direct download link to the file you requested.</h2>
                            <a href="'. $file .'" style="color:#ffffff!important;display:inline-block;font-weight:500;font-size:16px;line-height:42px;font-family:\'Helvetica\',Arial,sans-serif;width:auto;white-space:nowrap;height:42px;margin:12px 5px 12px 0;padding:0 22px;text-decoration:none;text-align:center;border:0;border-radius:3px;vertical-align:top;background-color:#000000!important" target="_blank"><span style="display:inline;font-family:\'Helvetica\',Arial,sans-serif;text-decoration:none;font-weight:500;font-style:normal;font-size:16px;line-height:42px;border:none;background-color:#000000!important;color:#ffffff!important">Download PDF</span></a> <br>
                            <div>
                              <p>By downloading this file I assume that you are interested in more information and work from me. So I added you to my newsletter. You receive a separate e-mail for confirmation, so if you want to be kept informed about all the interesting things I do, please subscribe.</p>
                              <p>&nbsp;</p>
                              <p style="padding:0 0 10px 0">If you have any questions, please contact:&nbsp;<a href="mailto:news@aatvos.com" style="color:#3f3f38" target="_blank">news@aatvos.com</a></p>
                            </div></td>
                        </tr>
                      </tbody>
                    </table></td>
                </tr>
              </tbody>
            </table></td>
        </tr>
      </tbody>
    </table>
  </center>
</div>
    ';
    return $string;
}*/
?>