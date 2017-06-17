<body>
  <div class="AppBase">
    <?php $this->load->view('components/nav'); ?>
    <div class="AppContent">
      <div class="slideshow-container">
        <?php foreach ($recent_news as $article) { ?>
        <div class="slide fade">
          <img src="<?php echo site_url('img/mining.jpg'); ?>">
          <div class="text">
            <div class="AppContainer">
              <h1><?php echo anchor(get_link($article, 'article'), $article->title) ?></h1>
              <p>
                <?php echo $article->summary ?>
              </p>
              <a href="<?php echo get_link($article, 'article') ?>">READ MORE</a>
            </div>
          </div>
        </div>
        <?php } ?>
        <a class="prev" onclick="plusSlides(-1)"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
        <a class="next" onclick="plusSlides(1)"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
      </div>

      <div class="HighlightBlock ">
        <div class="Grid AppContainer">
          <div class="Grid_Column col-2">
            <h3>MONEYPOLITICS</h3>
            <p>
              Blue sky thinking cloud strategy and blue money data-point.
              Quick-win i don't want to drain the whole swamp, i just want to shoot some alligators or synergize productive mindfulness.
              You better eat a reality sandwich before you walk back in that boardroom wiggle room,
              yet where do we stand on the latest client ask we're ahead of the curve on that one quick win upsell nor when does this sunset?
            </p>
            <a class="text-small" href="#">
              GO TO DATA PAGE
            </a>
          </div>
          <div class="Grid_Column col-2 content-center">
            <div class="HighlightBlock_Search">
              <input class="SearchBox" placeholder="ENTER NAME HERE" type="text" aria-label="Search">
              <div class="dropdown">

                <button class="dropbtn">
                  <div class="borderline"></div>
                  <span>ALL DATASETS</span>
                  <i class="fa fa-caret-down" aria-hidden="true"></i>
                </button>
                <div class="dropdown-content">
                  <a href="#">Dataset 1</a>
                  <a href="#">Dataset 2</a>
                  <a href="#">Dataset 3</a>
                </div>
              </div>
              <div class="IconBlock">
                <button class="SearchButton"><i class="fa fa-search SearchIcon" aria-hidden="true"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="FeedBlock Grid AppContainer">
        <div class="Grid_Column col-2">
          <div class="FeaturedStories">
            <div class="FeaturedStories_Top">
              <div class="TopHeader">
                Latest Stories
              </div>
              <img class="TopImage" src="<?php echo site_url('img/city.jpg'); ?>" />
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
              <img class="TopImage" src="<?php echo site_url('img/city.jpg'); ?>" />
            </div>
            <div class="DataStories_List">
              <div class="Story">
                <div class="StoryHeader">
                  <h4 class="flash-alert">BRAND NEW: Live in Manila</h4>
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
      <div class="HighlightBlock BlogColumn ">
        <div class="Grid AppContainer">
          <div class="Grid_Column col-2">
            <h3 class="header">BLOG</h3>
            <h2 class="title">
              <a href="#">
                <?php echo $recent_blogs[0]->title ?>
              </a>
            </h2>
            <p>
              <?php echo $recent_blogs[0]->summary ?>
            </p>
            <a class="text-small" href="<?php echo site_url('template/articlepage'); ?>">
              GO TO BLOG POST
            </a>
          </div>
          <div class="Grid_Column col-2">
            <div class="blogposts">
              <div>
                <p class="text-small">
                  LATEST BLOG POSTS
                </p>
              </div>
              <div class="story-list">
                <?php foreach ($recent_blogs as $num => $blog) { if ($num < 1) continue; ?>
                <div class="excerpt">
                  <a>
                    <?php echo $blog->title ?>
                  </a>
                </div>
                <div class="divider"></div>
                <?php } ?>
              </div>
            </div>
          </div>

        </div>
      </div>

      </div>
      <?php $this->load->view('components/footer'); ?>
    </div>
  </div>
  <script src="<?php echo site_url('js/main.js'); ?>"></script>
  <script src="<?php echo site_url('js/slideshow.js'); ?>"></script>
</body>
