<body>
  <div class="AppBase ArchivePage">
    <?php $this->load->view('components/nav'); ?>
    <div class="AppContent">
      <div class="top-container Grid AppContainer">
        <div class="banner Grid_Column size-100">
          <img class="banner-image" src="<?php echo site_url('img/typewriter-1.jpg'); ?>">
          <!-- Content -->

        </div>


        </div>
      </div>
      <div class="FeedBlock Grid AppContainer">
        <div class="Grid_Column size-75">
          <div class="FeaturedStories">
            <div class="FeaturedStories_Top">
              <div class="TopHeader">
                Blog Archive
              </div>
            </div>
            <div class="FeaturedStories_List">

              <?php if (count($blogs)) { foreach ($blogs as $blog) { ?>
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
                  <p class="footer-left">BY <?php echo strtoupper(get_authors($blog->slug,'blog')) ?></p>
                  <a class="footer-right" href="<?php echo get_link($blog, 'blog') ?>">READ MORE</a>
                </div>
              </div>
              <?php }} else {?>
                <p>
                  No blogs found.
                </p>
              <?php }?>
          </div>
          <div class="paginate">
            <?php echo $pagination; ?>
          </div>
        </div>
      </div>
      <div class="side-article Grid_Column size-25">

        <div class="FeaturedTags">
          <div class="FeaturedTags_Top">
            <div class="TopHeader">
              Browse Tags
            </div>
          </div>
          <div class="FeaturedTags_List">
            <?php foreach ($all_tags as $tag) { ?>
            <div class="Tag">
              <a href="#"><?php echo anchor(get_tag_link($tag, 'blog'), $tag) ?></a>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view('components/footer'); ?>
  </div>
</div>
<script src="<?php echo site_url('js/main.js'); ?>"></script>
</body>
