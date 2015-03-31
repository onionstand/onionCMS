<div class="row">
	<div class="large-12 columns">
		<div class="nav-bar right">
			<ul class="button-group">
				<li><a href="#" class="button">Link 1</a></li>
				<li><a href="#" class="button">Link 2</a></li>
				<li><a href="#" class="button">Link 3</a></li>
				<li><a href="#" class="button">Link 4</a></li>
			</ul>
		</div>
		<h1>Blog <small>This is my blog. It's awesome.</small></h1>
		<hr/>
	</div>
</div>

<div class="row">
	<div class="large-9 columns" role="content">
        <?php include "blog_temp.php";?>
        <?php echo $this->render(Base::instance()->get('paginate_browse_pos')); ?>
    </div>
    <aside class="large-3 columns">
    	<h5>Categories</h5>
    	<ul class="side-nav">
    		<li><a href="#">News</a></li>
    		<li><a href="#">Code</a></li>
    		<li><a href="#">Design</a></li>
    		<li><a href="#">Fun</a></li>
    		<li><a href="#">Weasels</a></li>
    	</ul>
    	<div class="panel">
    		<h5>Featured</h5>
    		<p>Pork drumstick turkey fugiat. Tri-tip elit turducken pork chop in. Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow.</p>
    		<a href="#">Read More →</a>
    	</div>
    </aside>
</div>

<footer class="row">
	<div class="large-12 columns">
		<hr/>
		<div class="row">
			<div class="large-6 columns">
				<p>© Copyright no one at all. Go to town.</p>
			</div>
			<div class="large-6 columns">
				<ul class="inline-list right">
					<li><a href="#">Link 1</a></li>
					<li><a href="#">Link 2</a></li>
					<li><a href="#">Link 3</a></li>
					<li><a href="#">Link 4</a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>
