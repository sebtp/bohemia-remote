<aside class="col-xs col-sm-4 col-md-3">
					<div>
						<h4>Newsletter</h4>
						<?php
							$sb = get_page_by_title( 'Sidebar' );
							$sbpage = get_post($sb); 
							$sbtxt = $sbpage->post_content;
						?>
						<p><?php echo $sbtxt ?></p>
						<!-- Begin MailChimp Signup Form -->
						<div id="mc_embed_signup">
							<form action="//bohemiaamsterdam.us2.list-manage.com/subscribe/post?u=ff7aa484f44598d638542407c&amp;id=00529f1a03" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
								<div id="mc_embed_signup_scroll">

									<div class="mc-field-group">
										<label for="mce-EMAIL">Email Address<span class="asterisk">*</span></label>
										<input type="email" value="" name="EMAIL" class="required email type" id="mce-EMAIL">
									</div>
									<div class="mc-field-group input-group">								
										<ul>
											<li>
												<input type="radio" value="1" name="group[16389]" id="mce-group[16389]-16389-0">
												<label for="mce-group[16389]-16389-0">Director</label>
											</li>
											<li>
												<input type="radio" value="2" name="group[16389]" id="mce-group[16389]-16389-1">
												<label for="mce-group[16389]-16389-1">Manager</label>
											</li>
											<li>
												<input type="radio" value="4" name="group[16389]" id="mce-group[16389]-16389-2">
												<label for="mce-group[16389]-16389-2">Creative</label>	</li>
										</ul>
									</div>
									<div id="mce-responses" class="clear">
										<div class="response" id="mce-error-response" style="display:none"></div>
										<div class="response" id="mce-success-response" style="display:none"></div>
									</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->

									<div class="clear"><input type="submit" value="sign up" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
								</div>
							</form>
						</div>
						<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
						<!--End mc_embed_signup-->			
					</div>
					<div>
						<h4>Share</h4>
						<div>
							<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>"	target="popup" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title();?>','popup','width=600,height=720,scrollbars=no,resizable=no'); return false;">
								<svg id="ic-widget-fb" data-name="Facebook" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 58"><title>Facebook</title><path d="M0,0V58H64V0ZM36.78,29.42H33.52v11H28.64v-11H26.21V25.63h2.44V23.35c0-3.09,1.38-4.93,5.29-4.93h3.25v3.79h-2c-1.52,0-1.62.53-1.62,1.52v1.9h3.69Z"/></svg>
							</a>
							<a href="http://www.linkedin.com/shareArticle?mini=true&amp;title=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>"	target="popup" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;title=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>','popup','width=600,height=720,scrollbars=no,resizable=no'); return false;">
								<svg id="ic-widget-in" data-name="LinkedIn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 58"><title>LinkedIn</title><path d="M0,0V58H64V0ZM25.57,39.25H20.86V24.71h4.71Zm-2.23-16.8h0a2.52,2.52,0,1,1,.06-5,2.52,2.52,0,1,1,0,5Zm19.37,17H38V31.64c0-2-.68-3.29-2.39-3.29a2.59,2.59,0,0,0-2.42,1.77A3.39,3.39,0,0,0,33,31.3v8.12H28.33s.06-13.18,0-14.54H33v2.06a4.66,4.66,0,0,1,4.25-2.4c3.1,0,5.42,2.08,5.42,6.54Z"/></svg>
							</a>
							<a href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>"	target="popup" onclick="window.open('http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>','popup','width=600,height=720,scrollbars=no,resizable=no'); return false;">
								<svg id="ic-widget-tw" data-name="Twitter" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 58"><title>Twitter</title><path d="M0,0V58H64V0ZM43.63,22.48a10.82,10.82,0,0,1-1.11,1.29c-.89.92-.94,1-.94,1.79a18,18,0,0,1-1.08,5A14.43,14.43,0,0,1,35.2,37.1a12.92,12.92,0,0,1-10.43,1.24,11.87,11.87,0,0,1-3.07-1.48,4.52,4.52,0,0,1,1.3-.13,8.66,8.66,0,0,0,4.26-1.24l.86-.54-1-.35a4.89,4.89,0,0,1-3-2.75c-.1-.35-.06-.37.83-.37l.92,0-.78-.39A5.24,5.24,0,0,1,23,28.93a6.23,6.23,0,0,1-.57-2.25c0-.05.37.05.75.18,1.1.42,1.24.32.6-.39a5,5,0,0,1-1-5l.27-.81,1,1.09a12.72,12.72,0,0,0,7.57,3.89l.79.1,0-.82v-.1l0-.45v-.28h0v.28l0,.45V25a4.81,4.81,0,0,1,3.1-4.83,5.21,5.21,0,0,1,2.78-.07,6.37,6.37,0,0,1,1.35.74l.78.55.86-.29a8.64,8.64,0,0,0,1.4-.57c.27-.15.51-.23.51-.18a4.92,4.92,0,0,1-1.08,1.79c-.67.75-.48.82.87.32C43.77,22.16,43.79,22.16,43.63,22.48Z"/></svg>
							</a>
						</div>
					</div>
				</aside>