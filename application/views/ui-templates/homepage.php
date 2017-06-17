<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>PCIJ</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="<?php echo site_url('css/normalize.css'); ?>" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo site_url('css/main.css'); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather|Open+Sans:400,500,700,800" rel="stylesheet">
  </head>
  <body>
    <div class="AppBase">
      <div class="TopLevelNav">
        <div class="AppContainer">
          <div class="LeftNav">
            <div class="SiteLogo">
              <a class="item" href="<?php echo site_url('template/homepage'); ?>"><img alt="" src="<?php echo site_url('img/pcij-logo.png'); ?>"></img></a>
              <p>
                Philippine Center <br/>
                for Investigative Journalism
              </p>
            </div>
            <div class="NavbarItems">
              <a class="item" href="<?php echo site_url('template/storylandingpage'); ?>">STORIES</a>
              <a class="item" href="#">DATA</a>
              <a class="item" href="<?php echo site_url('template/articlepage'); ?>">BLOG</a>
              <a class="item" href="<?php echo site_url('template/trainingpage'); ?>">TRAINING</a>
              <a class="item" href="<?php echo site_url('template/aboutus'); ?>">ABOUT US</a>
            </div>
          </div>
          <div class="RightNav">
            <div class="NavbarItems">
              <div class="item">
                <div class="SearchBlock">
                  <input class="SearchBox" placeholder="SEARCH THIS SITE" type="text" aria-label="Search">
                  <div class="IconBlock">
                    <button class="SearchButton"><i class="fa fa-search SearchIcon" aria-hidden="true"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="AppContent">
        <div class="slideshow-container">
          <div class="slide fade">
            <img src="<?php echo site_url('img/mining.jpg'); ?>">
            <div class="text">
              <div class="AppContainer">
                <h1>Mining in the Philippines</h1>
                <p>
                  My father was a foreign student, born and raised in a small village in Kenya.
                  It is that promise that has always set this country apart - that through hard work and sacrifice.
                </p>
                <a href="<?php echo site_url('template/articlepage'); ?>">READ MORE</a>
              </div>
            </div>
          </div>

          <div class="slide fade">
            <img src="<?php echo site_url('img/mining2.png'); ?>">
            <div class="text">
              <div class="AppContainer">
                <h1>Mining Elsewhere</h1>
                <p>
                  The people I meet - in small towns and big cities, in diners and office parks - they don't expect government to solve all their problems.
                  These enemies must be found.
                </p>
                <a href="<?php echo site_url('template/articlepage'); ?>">READ MORE</a>
              </div>
            </div>
          </div>

          <div class="slide fade">
            <img src="<?php echo site_url('img/city.jpg'); ?>">
            <div class="text">
              <div class="AppContainer">
                <h1>One Short Day in the Emerald City</h1>
                <p>
                  But they have helped shape the political landscape for at least a generation.
                  Theirs are the stories that shaped me.
                </p>
                <a href="<?php echo site_url('template/articlepage'); ?>">READ MORE</a>
              </div>
            </div>
          </div>

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
                  Universities and states, including Illinois, are taking part in a divestment
                  campaign to pressure the Sudanese government to stop the killings.
                </a>
              </h2>
              <p>
                Blue sky thinking cloud strategy and blue money data-point.
                Quick-win i don't want to drain the whole swamp, i just want to shoot some alligators or synergize productive mindfulness.
                You better eat a reality sandwich before you walk back in that boardroom wiggle room,
                yet where do we stand on the latest client ask we're ahead of the curve on that one quick win upsell nor when does this sunset?
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
                  <div class="excerpt">
                    <a>
                      We are running out of runway driving the initiative forward golden goose.
                      Streamline. Push back level the playing field synergize productive mindfulness.
                    </a>
                  </div>
                  <div class="divider"></div>
                  <div class="excerpt">
                    <a>
                      We are running out of runway driving the initiative forward golden goose.
                      Streamline. Push back level the playing field synergize productive mindfulness.
                    </a>
                  </div>
                  <div class="divider"></div>
                  <div class="excerpt">
                    <a>
                      We are running out of runway driving the initiative forward golden goose.
                      Streamline. Push back level the playing field synergize productive mindfulness.
                    </a>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        </div>
        <div class="footer">
          <div class="Grid AppContainer">
            <div class="Grid_Column col-2">
              <h3>OUR NETWORK</h3>
                <p>
                  <a href="#">Institution Name 1</a>
                </p>
                <p>
                  <a href="#">Institution Name 2</a>
                </p>
                <p>
                  <a href="#">Institution Name 3</a>
                </p>
                <p>
                  <a href="#">Institution Name 4</a>
                </p>
                <p>
                  <a href="#">Institution Name 5</a>
                </p>
            </div>
            <div class="Grid_Column col-2">
              <h3>CONNECT WITH US</h3>
              <p class="table">
                <i class="fa fa-map-marker table-cell" aria-hidden="true"></i>
                <span>No. 11 Matimtiman Street, UP Village Central 1101, <br/>
                Diliman, Quezon City, The Philippines</span>
              </p>
              <p class="table">
                <div class="table">
                  <i class="fa fa-phone table-cell" aria-hidden="true"></i>
                  <span>Executive Director (632) 433-0331 <br/>
                  Research 433-0152 <br/>
                  Fax Number: (632) 433-0331</span>
                  <span class="table-cell p-cell">Training 434-6193 <br/>
                  Admin 436-4711</span>
                </div>
              </p>
              <p class="table">
                <i class="fa fa-envelope table-cell" aria-hidden="true"></i>
                <span>pcij@pcij.org</span>
              </p>
              <div class="Grid footer-grid">
                <div class="Grid_Column col-2">
                  <div class="table">
                    <i class="fa fa-twitter table-cell" aria-hidden="true"></i><span>@pcijdotorg</span>
                  </div>
                  <div class="table">
                    <i class="fa fa-youtube-play table-cell" aria-hidden="true"></i><span>youtube.com/pcijdotorg</span>
                  </div>
                </div>
                <div class="Grid_Column col-2">
                  <div class="table">
                    <i class="fa fa-facebook-official table-cell" aria-hidden="true"></i><span>facebook.com/pcij.org </span>
                  </div>
                  <div class="table">
                    <i class="fa fa-google-plus table-cell" aria-hidden="true"></i><span>PCIJ</span>
                  </div>
                </div>


              </div>
            </div>
          </div>
      </div>
      </div>
    </div>
    <script src="<?php echo site_url('js/main.js'); ?>"></script>
    <script src="<?php echo site_url('js/slideshow.js'); ?>"></script>
  </body>
</html>
