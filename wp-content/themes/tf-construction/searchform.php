<form role="search" method="get" id="searchform" class="search-form tf-construction-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="col-md-12 form-group">
		<label  class="search-label">
			<span class="screen-reader-text"><?php _e('Search for:','tf-construction'); ?></span>
			<input type="search" placeholder="<?php esc_attr_e('What do you want to find?','tf-construction'); ?>" id="s" name="s" class="input-text input-search">
		</label>
	</div>
</form>