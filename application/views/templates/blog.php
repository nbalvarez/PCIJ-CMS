<body>
  <div class="AppBase ArticlePage">
    <?php $this->load->view('components/nav'); ?>
    <div class="AppContent">
      <div class="top-container Grid AppContainer">
        <div class="banner Grid_Column size-100">
          <img class="banner-image" src="<?php echo site_url('img/typewriter-1.jpg'); ?>">
          <!-- Content -->

        </div>


        </div>
      </div>
      <div class="article-container Grid AppContainer">
        <div class="PageContent Grid_Column size-75">
          <div class="PageContentHeader header">
            <h1><?php echo $blog->title ?></h1>
            <p>
              <?php echo $blog->summary ?>
            </p>
            <span class="author">BY <?php $i = 0;
    					foreach($authors as $author){
    					echo strtoupper(e($author["first_name"])) .
    					' ' . strtoupper(e($author["middle_name"])) .
    					' ' . strtoupper(e($author["last_name"]));

    					if(++$i !== count($authors)) {
    					    echo ', ';
    					}
    				}?></span>
            <span class="footer-left date"><?php echo e($blog->pubdate) ?> | 4:30PM </span>
            <div class="IconRow footer-right">
              <a href=""><i class="fa fa-print" aria-hidden="true"></i></a>
              <a href=""><i class="fa fa-heart" aria-hidden="true"></i></a>
              <a href=""><i class="fa fa-download" aria-hidden="true"></i></a>
              <a href=""><i class="fa fa-share-alt" aria-hidden="true"></i></a>
            </div>
          </div>
          <div class="PageContentBody">
            <?php echo $blog->body ?>
            <strong>- <?php if ($blog->tagline == 'PCIJ,') { echo $blog->tagline . " " . $date; }
              else { echo $blog->tagline . " ";
              $i = 0;
    					foreach($tagline_authors as $author){
    					echo e($author["first_name"]) .
    					' ' . e($author["middle_name"]) .
    					' ' . e($author["last_name"]);
              if($i < count($tagline_authors)) {
                  echo ', ';
              }
              ++$i;
              }
    					
    				  echo ' ' . $date; }?></strong>
          </div>
          <div class="PageContentFooter">
            <div class="NormalBlock">
              <div class="BrowseContent">
                <div class="BrowseHeader">
                  <span>RELATED STORIES</span>
                </div>
                <div class="BrowseBody Grid">
                  <?php foreach ($recent_blogs as $num =>  $blog) { if ($num < 3) {?>
                  <div class="Grid_Column col-3">
                    <div class="Story">
                      <div class="StoryHeader">
                        <h3><?php echo anchor(get_link($blog, 'blog'), $blog->title) ?></h3>
                      </div>
                      <div class="StoryBody">
                        <p>
                          <?php echo $blog->summary ?>
                        </p>
                      </div>
                      <div class="StoryFooter">
                        <a class="footer-left" href="<?php echo get_link($blog, 'blog') ?>">READ MORE</a>
                      </div>
                    </div>
                  </div>
                  <?php } } ?>
                </div>
              </div>
            </div>

          </div>
          </div>
        <div class="side-article Grid_Column size-25">

          <img src="<?php echo site_url('img/graph.jpg'); ?>">
          <h3 class="flash-alert">RELATED DOCUMENT</h3>
          <p>
            Nulla tenderloin qui fatback beef ribs pariatur. Anim reprehenderit qui, labore jowl corned beef ham hock esse beef shoulder ut hamburger.
          </p>
          <a class="text-small" href="#">
            <?php $i = 0;
      					foreach($files as $file){?>
                  <a href="<?php echo base_url(); ?>files/download/<?php echo get_file_name($file["file_id"]); ?>">
                    <?php echo get_file_name($file["file_id"]); ?></a>
      					<?php if(++$i !== count($files)) {
      					    echo ' | ';
      					}
      				}?>
          </a>
          <div class="PageBreak"></div>
          <div class="FeaturedStories">
            <div class="FeaturedStories_Top">
              <div class="TopHeader">
                In This Series
              </div>

            </div>
            <div class="FeaturedStories_List">
              <!-- <?php foreach ($recent_news as $article) { ?> -->
              <div class="Story">
                <div class="StoryHeader">
                  <h3><?php echo anchor(get_link($recent_blogs[0], 'article'), $recent_blogs[0]->title) ?></h3>
                </div>
                <div class="StoryBody">
                  <p>
                    <?php echo $recent_blogs[0]->summary ?>
                  </p>
                </div>
                <div class="StoryFooter">
                  <a class="footer-left" href="<?php echo get_link($recent_blogs[0], 'article') ?>">READ MORE</a>
                </div>
              </div>
              <!-- <?php } ?> -->
            </div>
          </div>
          <div class="FeaturedStories">
            <div class="FeaturedStories_Top">
              <div class="TopHeader">
                Latest Stories
              </div>

            </div>
            <div class="FeaturedStories_List">
              <?php foreach ($recent_blogs as $blog) { ?>
              <div class="Story">
                <div class="StoryHeader">

                  <h3><?php echo anchor(get_link($blog, 'blog'), $blog->title) ?></h3>
                </div>
                <div class="StoryBody">
                  <p>
                    <?php echo $blog->summary ?>
                  </p>
                </div>
                <div class="StoryFooter">
                  <a class="footer-left" href="<?php echo get_link($blog, 'blog') ?>">READ MORE</a>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>

        </div>
      </div>
    </div>
    <?php $this->load->view('components/footer'); ?>
  </div>
</div>
<script src="<?php echo site_url('js/main.js'); ?>"></script>
</body>
