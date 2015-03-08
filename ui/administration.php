<?php include "menu_admin.php";?>
<div class="row">
	<div class="small-12 large-12 columns">
		<h3>News</h3>
	</div>
	<div class="small-12 large-12 columns">
		<form method="post" action="add_news" data-abide>
			<table>
				<thead>
					<tr>
						<th>Delete</th>
						<th>ID</th>
						<th>Title</th>
						<th>Date</th>
						<th>Author</th>
						<th>Tag</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($all_news as $news) { ?>
						<tr>
							<td>
								

								<a href="#" data-reveal-id="alarm<?php echo $news['id'];?>">Delete</a>
								<div id="alarm<?php echo $news['id'];?>" class="reveal-modal" data-reveal>
									<h2>Are you sure that you want to delete "<?php echo $news['title']; ?>"?</h2>
									<p class="lead"><a href="news_delete/<?php echo $news['id']; ?>">Delete</a></p>
									<a class="close-reveal-modal">&#215;</a>
								</div>
							</td>
							<td><?php echo $news['id']; ?></td>
							<td><?php echo $news['title']; ?></td>
							<td><?php echo $news['date']; ?></td>
							<td><?php echo $news['author']; ?></td>
							<td><?php echo $news['tag']; ?></td>
							<td>
								<a href="administration/edit_news/<?php echo $news['id'];?>">Edit</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</form>
	</div>
</div>