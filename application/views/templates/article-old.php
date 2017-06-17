		<!-- Main content -->
 		<div class="span9">
			<article>
				<h2><?php echo $article->title ?></h2>
				<p class="author">by
				<?php $i = 0;
					foreach($authors as $author){
					echo e($author["first_name"]) .
					' ' . e($author["middle_name"]) .
					' ' . e($author["last_name"]);

					if(++$i !== count($authors)) {
					    echo ', ';
					}
				}?>
				</p>
				<p><?php echo $article->body; ?>
          <strong>
            — <?php echo $article->tagline; ?>
            <?php $i = 0;
    					foreach($tagline_authors as $author){
    					echo e($author["first_name"]) .
    					' ' . e($author["middle_name"]) .
    					' ' . e($author["last_name"]);

              if(++$i == count($tagline_authors)-1) {
    					    echo ' and ';
    					}
    					else if($i !== count($tagline_authors)) {
    					    echo ', ';
    					}
    				}?>
          <strong>
        </p>

			</article>
			<p>Tags: <?php $i = 0;
					foreach($tags as $tag){
					echo anchor(get_tag_link($tag["text"],'article'), e($tag["text"]));
					if(++$i !== count($tags)) {
					    echo ', ';
					}
				}?>
			</p>
      <p>Files: <?php $i = 0;
					foreach($files as $file){?>
            <a href="<?php echo base_url(); ?>files/download/<?php echo get_file_name($file); ?>">
              <?php echo get_file_name($file); ?></a>
					<?php if(++$i !== count($files)) {
					    echo ' | ';
					}
				}?>
			</p>
 		</div>

 		<!-- Sidebar -->
 		<div class="span3 sidebar">
 			<h2>Recent news</h2>
<?php $this->load->view('sidebar'); ?>
 		</div>
