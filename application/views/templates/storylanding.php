<body>
  <div class="AppBase StoryLandingPage">
      <?php $this->load->view('components/nav'); ?>
    <div class="AppContent">
      <div class="top-container Grid AppContainer">
        <div class="banner Grid_Column size-70">
          <img src="<?php echo site_url('img/city.jpg'); ?>">
          <div class="text">
            <h3><?php echo $recent_news[0]->pre_head ?></h3>
            <h1><?php echo anchor(get_link($recent_news[0], 'article'), $recent_news[0]->title) ?></h1>
            <p>
              <?php echo $recent_news[0]->summary ?>
            </p>
            <a href="<?php echo get_link($recent_news[0], 'article') ?>">READ MORE</a>
          </div>
        </div>
        <div class="side-article Grid_Column size-30">
          <img src="<?php echo site_url('img/graph.jpg'); ?>">
          <h3 class="flash-alert">LATEST DATASET</h3>
          <p>
            Nulla tenderloin qui fatback beef ribs pariatur. Anim reprehenderit qui, labore jowl corned beef ham hock esse beef shoulder ut hamburger.
          </p>
          <a class="text-small" href="#">
            GO TO DATA PAGE
          </a>
        </div>
      </div>
      <div class="FeedBlock Grid AppContainer">
        <div class="Grid_Column col-2">
          <div class="FeaturedStories">
            <div class="FeaturedStories_Top">
              <div class="TopHeader">
                Latest Stories
              </div>

            </div>
            <div class="FeaturedStories_List">
              <?php foreach ($recent_news as $article) { ?>
              <div class="Story">
                <div class="StoryHeader">
                  <h5><?php echo $article->pre_head ?></h5>
                  <h3><?php echo anchor(get_link($article, 'article'), $article->title) ?></h3>
                </div>
                <div class="StoryBody">
                  <p>
                    <?php echo $article->summary ?>
                  </p>
                </div>
                <div class="StoryFooter">
                  <p class="footer-left">BY <?php echo strtoupper(get_authors($article->slug)) ?></p>
                  <a class="footer-right" href="<?php echo get_link($article, 'article') ?>">READ MORE</a>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="Grid_Column col-2">
          <div class="DataStories">
            <div class="DataStories_Top">
              <div class="TopHeader">
                From the Data Center
              </div>

            </div>
            <div class="DataStories_List">
              <div class="Story">
                <div class="StoryHeader">
                  <h3>Cow aliquip exercitation sausage ullamco, ball tip porchetta.</h3>
                </div>
                <div class="StoryBody">
                  <p>
                    Nulla tenderloin qui fatback beef ribs pariatur. Anim reprehenderit qui, labore jowl corned beef ham hock
                    esse beef shoulder ut hamburger.
                  </p>
                </div>
                <div class="StoryFooter">
                  <p class="footer-left">BY JUAN DELA CRUZ</p>
                  <a class="footer-right" href="<?php echo site_url('template/articlepage'); ?>">READ MORE</a>
                </div>
              </div>
              <div class="Story">
                <div class="StoryHeader">
                  <h3>Cow aliquip exercitation sausage ullamco, ball tip porchetta.</h3>
                </div>
                <div class="StoryBody">
                  <p>
                    Nulla tenderloin qui fatback beef ribs pariatur. Anim reprehenderit qui, labore jowl corned beef ham hock
                    esse beef shoulder ut hamburger.
                  </p>
                </div>
                <div class="StoryFooter">
                  <p class="footer-left">BY JUAN DELA CRUZ</p>
                  <a class="footer-right" href="<?php echo site_url('template/articlepage'); ?>">READ MORE</a>
                </div>
              </div>
              <div class="Story">
                <div class="StoryHeader">
                  <h3>Cow aliquip exercitation sausage ullamco, ball tip porchetta.</h3>
                </div>
                <div class="StoryBody">
                  <p>
                    Nulla tenderloin qui fatback beef ribs pariatur. Anim reprehenderit qui, labore jowl corned beef ham hock
                    esse beef shoulder ut hamburger.
                  </p>
                </div>
                <div class="StoryFooter">
                  <p class="footer-left">BY JUAN DELA CRUZ</p>
                  <a class="footer-right" href="<?php echo site_url('template/articlepage'); ?>">READ MORE</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="NormalBlock AppContainer">
        <div class="BrowseContent">
          <div class="BrowseHeader">
            <span>BROWSE BY</span>
            <span> | <a href="<?php echo site_url('news-archive'); ?>">SEE ALL ARTICLES</a></span>
          </div>
          <div class="BrowseBody Grid">
            <div class="Grid_Column col-3">
              <span>DATE</span>
            </div>
            <div class="Grid_Column col-3">
              <span>AUTHOR</span>
            </div>
            <div class="Grid_Column col-3">
              <span>CONTENT TYPE</span>
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
