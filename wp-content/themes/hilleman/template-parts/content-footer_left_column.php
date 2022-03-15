<?php
$footer_text    =  get_post_meta(get_the_id(),'footer_text',true);
$row_image_1    =  get_post_meta(get_the_id(),'image_1',true);
if(!empty($row_image_1))
{
	$image_1    =   wp_get_attachment_image_src($row_image_1['ID'],'full');
}

$row_image_2    =   get_post_meta(get_the_id(),'image_2',true);
if(!empty($row_image_2))
{
	$image_2    =   wp_get_attachment_image_src($row_image_2['ID'],'full');
}

$address_line_1 =   get_post_meta(get_the_id(),'address_line_1',true);
$address_line_2 =   get_post_meta(get_the_id(),'address_line_2',true);
$copyright_text =   get_post_meta(get_the_id(),'copyright_text',true);

$footer_link_text_1 =   get_post_meta(get_the_id(),'footer_link_text_1',true);
$footer_link_url_1  =   get_post_meta(get_the_id(),'footer_link_url_1',true);
$footer_link_text_2 =   get_post_meta(get_the_id(),'footer_link_text_2',true);
$footer_link_url_2  =   get_post_meta(get_the_id(),'footer_link_url_2',true);

$liked_in_url   =   get_post_meta(get_the_id(),'liked_in_url',true);
$twitter_url    =   get_post_meta(get_the_id(),'twitter_url',true);
$facebook_url   =   get_post_meta(get_the_id(),'facebook_url',true);

?>
<div class="hl-footer__left-sec">
    <?php if(!empty( $footer_text )): ?>
        <div class="hl-footer__footer-text"><?php echo esc_html( $footer_text ); ?></div>
    <?php endif; ?>
    <div class="hl-footer__icons">
        <?php if(!empty($image_1)): ?>
            <img src="<?php echo esc_url($image_1[0]); ?>" class="hl-footer__msd-logo">
        <?php endif; ?>
        <?php if(!empty($image_2)): ?>
            <img src="<?php echo esc_url($image_2[0]); ?>" class="hl-footer__wel-logo">
        <?php endif; ?>
    </div>
</div>


<div class="hl-footer__right-sec">
    <div class="hl-footer__text-sec">
        <div class="hl-footer__footer-text"><?php echo esc_html($address_line_1); ?><br /> <?php echo esc_html( $address_line_2 ) ?><br /><?php echo esc_html( $copyright_text ); ?> 
            <?php if(!empty($footer_link_text_1)): ?>
                | <a href="<?php echo esc_url( (!empty($footer_link_url_1))? $footer_link_url_1: '#' ); ?>" class="hl-footer__anchor"><?php echo esc_html( $footer_link_text_1 ); ?></a>
            <?php endif; ?>
            <?php if(!empty($footer_link_text_2)): ?>
                | <a href="<?php echo esc_url( (!empty($footer_link_url_2))? $footer_link_url_2: '#' ); ?>" class="hl-footer__anchor"><?php echo esc_html( $footer_link_text_2 ); ?></a>
            <?php endif; ?>
        </div>
    </div>
    <div class="hl-footer__ss">
        <?php if(!empty($liked_in_url)): ?>
        <a href="<?php echo esc_url( $liked_in_url ); ?>" target="_blank" class="hl-footer__social-icon"><svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="https://www.w3.org/2000/svg"><path d="M31.3086 20.998V31.0957H25.4542V21.6747C25.4542 19.3092 24.6089 17.6938 22.4892 17.6938C20.8716 17.6938 19.9107 18.7814 19.4863 19.8344C19.3322 20.2108 19.2924 20.7334 19.2924 21.2613V31.0953H13.4376C13.4376 31.0953 13.5162 15.1392 13.4376 13.4876H19.2929V15.9827C19.2811 16.0024 19.2645 16.0216 19.254 16.0404H19.2929V15.9827C20.0709 14.7856 21.4584 13.0741 24.5692 13.0741C28.4209 13.0741 31.3086 15.5907 31.3086 20.998ZM7.31294 5C5.31024 5 4 6.31461 4 8.04181C4 9.73233 5.27226 11.0849 7.2361 11.0849H7.27408C9.31607 11.0849 10.5857 9.73233 10.5857 8.04181C10.5469 6.31461 9.31607 5 7.31294 5ZM4.34797 31.0957H10.2006V13.4876H4.34797V31.0957Z" fill="#259B97"/></svg></a>
        <?php endif; ?>
        
        <?php if(!empty( $twitter_url )): ?>
        <a href="<?php echo esc_url( $twitter_url ); ?>" target="_blank" class="hl-footer__social-icon"><svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="https://www.w3.org/2000/svg"><path d="M32.5355 9.74536C31.4859 10.2108 30.3568 10.5256 29.1727 10.6661C30.3817 9.94183 31.3095 8.79575 31.7474 7.42787C30.6162 8.09893 29.3627 8.58574 28.0297 8.84814C26.9618 7.71079 25.4402 7 23.7554 7C20.5228 7 17.901 9.6218 17.901 12.8544C17.901 13.3133 17.9529 13.7599 18.0534 14.1887C13.1879 13.9446 8.87379 11.614 5.9861 8.07099C5.48226 8.93546 5.19323 9.94183 5.19323 11.0146C5.19323 13.0452 6.22754 14.8379 7.79757 15.8875C6.83835 15.8574 5.93502 15.5941 5.14608 15.1544C5.14564 15.1793 5.14564 15.2042 5.14564 15.2286C5.14564 18.0653 7.16449 20.4312 9.84218 20.9687C9.35144 21.1031 8.83319 21.1743 8.3001 21.1743C7.922 21.1743 7.55569 21.1381 7.19855 21.0699C7.94339 23.3953 10.105 25.088 12.6674 25.1356C10.6634 26.706 8.13943 27.6417 5.39582 27.6417C4.92429 27.6417 4.45712 27.6142 4 27.5596C6.58949 29.2213 9.66753 30.1901 12.9735 30.1901C23.7418 30.1901 29.6307 21.2695 29.6307 13.5324C29.6307 13.2788 29.6251 13.026 29.6137 12.7754C30.7585 11.9502 31.7509 10.9194 32.5355 9.74536Z" fill="#259B97"/></svg></a>
        <?php endif; ?>

        <?php if(!empty( $facebook_url )): ?>
        <a href="<?php echo esc_url( $facebook_url ); ?>" target="_blank" class="hl-footer__social-icon"><svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="https://www.w3.org/2000/svg"><path d="M22.557 18.4778H19.2943V30H14.351V18.4778H12V14.4285H14.351V11.8081C14.351 9.93427 15.2744 7 19.3383 7L23 7.01477V10.9453H20.3432C19.9074 10.9453 19.2947 11.1552 19.2947 12.0491V14.4323H22.9889L22.557 18.4778Z" fill="#259B97"/></svg></a>
        <?php endif; ?>
    </div>
</div>