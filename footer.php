<?php global $lico_option; ?>
	<footer>
		<div class="container">
			<div class="butn">	
				<a href="<?php echo $lico_option['bio_button']; ?>" class="btn">Разместить биографию</a>
				<a href="<?php echo $lico_option['fback_button']; ?>" class="btn btn_small">Связаться с нами</a>
			</div>

				<ul class="social">
                <?php if ($lico_option['facebook']){ ?>
                    <li><a href="<?php echo esc_html($lico_option['facebook']); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.svg" alt=""></a></li>
                <?php }; ?>

                <?php if ($lico_option['instagramm']){ ?>    
                    <li><a href="<?php echo esc_html($lico_option['instagramm']); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.svg" alt=""></a></li>
                <?php }; ?>

                <?php if ($lico_option['twitter']){ ?>
                    <li><a href="<?php echo esc_html($lico_option['twitter']); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter.svg" alt=""></a></li>
                <?php }; ?>

                <?php if ($lico_option['vk']){ ?>
                    <li><a href="<?php echo esc_html($lico_option['vk']); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/vk.svg" alt=""></a></li>
                <?php }; ?>

                <?php if ($lico_option['telegram']){ ?>
                    <li><a href="<?php echo esc_html($lico_option['telegram']); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/telegram.svg" alt=""></a></li>
                <?php }; ?>
            </ul>
			<div class="copyright">
				<p><?php echo $lico_option['copyright']; ?></p>
				<p><?php echo $lico_option['copyright_small']; ?></p>
			</div>
		</div>
		<?php wp_footer(); ?>
	</footer>	
</body>
</html>