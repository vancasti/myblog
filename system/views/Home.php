<?php require_once SYS_PATH . '/inc/header.php'; ?>
<form class="content container clearfix">

<!-- start navigation -->
<input class="nav-menu" id="all" type="radio" name="filter" checked="checked"/>
<label for="all">All</label>

<input class="nav-menu" id="illustrations" type="radio" name="filter"/>
<label for="illustrations">Illustration</label>

<input class="nav-menu" id="posters" type="radio" name="filter"/>
<label for="posters">Posters Design</label>

<input class="nav-menu" id="typography" type="radio" name="filter"/>
<label for="typography">Typography</label>

<input class="nav-menu" id="packaging" type="radio" name="filter"/>
<label for="packaging">Packaging</label>
<!-- end navigation -->

<!-- start portfolio -->
<section class="portfolio">
	<figure class="four columns all poster" data-category="poster">
		<img src="<?php echo $app->get('images_path'); ?>/image-1.jpg"/>
		<figcaption>
			<h4>Lorem Ipsum</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie lobortis magna eget sagittis.</p>
		</figcaption>
	</figure>
	<figure class="four columns all illustration" data-category="illustration">
		<img src="<?php echo $app->get('images_path'); ?>/image-2.jpg"/>
		<figcaption>
			<h4>Lorem Ipsum</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie lobortis magna eget sagittis.</p>
		</figcaption>
	</figure>
	<figure class="four columns all poster" data-category="poster">
		<img src="<?php echo $app->get('images_path'); ?>/image-3.jpg"/>
		<figcaption>
			<h4>Lorem Ipsum</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie lobortis magna eget sagittis.</p>
		</figcaption>
	</figure>
	<figure class="four columns all typography" data-category="typography">
		<img src="<?php echo $app->get('images_path'); ?>/image-4.jpg"/>
		<figcaption>
			<h4>Lorem Ipsum</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie lobortis magna eget sagittis.</p>
		</figcaption>
	</figure>
	<figure class="four columns all illustration" data-category="illustration">
		<img src="<?php echo $app->get('images_path'); ?>/image-5.jpg"/>
		<figcaption>
			<h4>Lorem Ipsum</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie lobortis magna eget sagittis.</p>
		</figcaption>
	</figure>
	<figure class="four columns all poster" data-category="poster">
		<img src="<?php echo $app->get('images_path'); ?>/image-6.jpg"/>
		<figcaption>
			<h4>Lorem Ipsum</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie lobortis magna eget sagittis.</p>
		</figcaption>
	</figure>
	<figure class="four columns all illustration" data-category="illustration">
		<img src="<?php echo $app->get('images_path'); ?>/image-7.jpg"/>
		<figcaption>
			<h4>Lorem Ipsum</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie lobortis magna eget sagittis.</p>
		</figcaption>
	</figure>
	<figure class="four columns all typography" data-category="typography">
		<img src="<?php echo $app->get('images_path'); ?>/image-8.jpg"/>
		<figcaption>
			<h4>Lorem Ipsum</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie lobortis magna eget sagittis.</p>
		</figcaption>
	</figure>
	<figure class="four columns all package" data-category="package">
		<img src="<?php echo $app->get('images_path'); ?>/image-9.jpg"/>
		<figcaption>
			<h4>Lorem Ipsum</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie lobortis magna eget sagittis.</p>
		</figcaption>
	</figure>
	<figure class="four columns all poster" data-category="poster">
		<img src="<?php echo $app->get('images_path'); ?>/image-10.jpg"/>
		<figcaption>
			<h4>Lorem Ipsum</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie lobortis magna eget sagittis.</p>
		</figcaption>
	</figure>
	<figure class="four columns all package" data-category="package">
		<img src="<?php echo $app->get('images_path'); ?>/image-11.jpg"/>
		<figcaption>
			<h4>Lorem Ipsum</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie lobortis magna eget sagittis.</p>
		</figcaption>
	</figure>
	<figure class="four columns all illustration" data-category="illustration">
		<img src="<?php echo $app->get('images_path'); ?>/image-12.jpg"/>
		<figcaption>
			<h4>Lorem Ipsum</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie lobortis magna eget sagittis.</p>
		</figcaption>
	</figure>
</section>
<!-- end portfolio -->
</form>
<!-- end container -->
<?php require_once SYS_PATH . '/inc/footer.php'; ?>