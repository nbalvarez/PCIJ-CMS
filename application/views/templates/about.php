<body>
  <div class="AppBase AboutPage">
    <?php $this->load->view('components/nav'); ?>
    <div class="AppContent">
      <div class="top-container Grid AppContainer">
        <div class="banner Grid_Column size-70">
          <img class="banner-image" src="<?php echo $page->image_src; ?>">
          <!-- Content -->
          <div class="PageContent">
            <div class="PageContentHeader header">
              <h1>OUR HISTORY</h1>
            </div>
            <div class="PageContentBody">
              <!-- <p>
                Makin' your way in the world today takes everything you've got. Takin' a break from all your worries sure would help a lot. Why do we always come here? I guess well never know.
                Its like a kind of torture to have to watch the show. Doin' it our way. There's nothing we wont try. Never heard the word impossible. This time there's no stopping us.
              </p>
              <p>
                I have always wanted to have a neighbor just like you. I've always wanted to live in a neighborhood with you! Doin' it our way. There's nothing we wont try. Never heard the word impossible.
                This time there's no stopping us. I have always wanted to have a neighbor just like you. I've always wanted to live in a neighborhood with you! Wouldn't you like to get away?
                Sometimes you want to go where everybody knows your name. And they're always glad you came.
              </p>
              <p>
                They call him Flipper Flipper faster than lightning. No one you see is smarter than he. And when the odds are against him and their dangers work to do.
                You bet your life Speed Racer he will see it through. Now were up in the big leagues getting' our turn at bat? Got kind of tired packin' and unpackin' - town to town and up and down the dial.
                Well we're movin' on up to the east side. To a deluxe apartment in the sky! Sunny Days sweepin' the clouds away. On my way to where the air is sweet.
                Can you tell me how to get how to get to Sesame Street? Why do we always come here? I guess well never know. Its like a kind of torture to have to watch the show?
              </p> -->
              <?php echo $page->body ?>
            </div>
          </div>
        </div>
        <div class="side-article Grid_Column size-30">
          <!-- Accordion -->
          <div class="AccordionBody">
            <?php for($i=0; $i<count($page_elements); $i++) {
            if($page_elements[$i]['type'] == 'tab') { ?>
            <button class="accordion header"><?php echo $page_elements[$i]['title']; ?></button>
            <div class="panel">
              <?php echo $page_elements[$i]['body']; ?>
            </div>
            <?php }}?>
            <!-- <button class="accordion header">Awards &amp; Citations</button>
            <div class="panel">
              <div class="article-short">
                <h4>TITLE</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
              <div class="article-short">
                <h4>TITLE</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
              <div class="article-short">
                <h4>TITLE</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
              <div class="article-short">
                <h4>TITLE</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>

            </div>

            <button class="accordion header">Our Staff</button>
            <div class="panel">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>

            <button class="accordion header">Our Board of Trustees</button>
            <div class="panel">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <button class="accordion header">Books &amp; Videos</button>
            <div class="panel">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div> -->
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view('components/footer'); ?>
  </div>
</div>
<script src="<?php echo site_url('js/main.js'); ?>"></script>
</body>
