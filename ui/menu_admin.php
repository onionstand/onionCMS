<nav class="top-bar" data-topbar>
  		<ul class="title-area">
  			<li class="name">
  				<h1><a href="#">You are: <?php echo  $BACKEND_USER;?></a></h1>
  			</li>
  			<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
  			<li class="toggle-topbar menu-icon">
  				<a href="#"><span>Meni</span></a>
  			</li>
  		</ul>
  		<section class="top-bar-section">
  			<!-- Right Nav Section -->
  			<ul class="right">
          <li>
            <a href="#">Admin Home</a>
          </li>
          <li class="divider"></li>
  				<li>
  					<a href="add_page">Add page</a>
  				</li>
          <li class="divider"></li>
          <li>
            <a href="administration/add_news">Add news</a>
          </li>
          <li class="divider"></li>
  			</ul>
        <ul class="left">
          <li>
            <a href="">Test</a>
          </li>
          <li class="divider"></li>
          <li>
            <a href="administration/edit_user">Edit Users</a>
          </li>
          <li class="divider"></li>
          <li>
            <a href="logout">Logout</a>
          </li>
        </ul>
  		</section>
</nav>