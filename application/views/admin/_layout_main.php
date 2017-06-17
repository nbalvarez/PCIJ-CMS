<?php $this->load->view('admin/components/page_head'); ?>

  <body>
    <div class="navbar navbar-static-top navbar-inverse">
	    <div class="navbar-inner">
	  	    <h1> <a class="brand" href="<?php echo site_url('admin/dashboard'); ?>"> <?php echo $meta_title; ?></a> </h1>
		    <ul class="nav navbar-nav">
			    <li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
			    <li><?php echo anchor('admin/page', 'Pages'); ?></li>
			    <li><?php echo anchor('admin/article', 'News Articles'); ?></li>
          <li><?php echo anchor('admin/blog', 'Blogs'); ?></li>				 
			    <li><?php echo anchor('admin/user', 'Users'); ?></li>
          <li><?php echo anchor('admin/access', 'Access Control'); ?></li>
		    </ul>
	    </div>
    </div>

<div class = "container">
    <div class ="row">

 	 <div class = "span11 form-group form-group-lg">
 	 <?php $this->load->view($subview); ?>
  	</div>
  	<div class = "span2">
		<section>
			<h5> User: <?php  $this->load->library('session'); echo $this->session->userdata["user_name"]; ?> </h5>
			<h5> Access Level: <?php  echo $this->session->userdata["access"]; ?> </h5>

			<h5><?php echo anchor('admin/user/logout', '<i class="icon-off"></i>logout'); ?> </h5>

		</section>
  	</div>

  </div>
 </div>

  <?php $this->load->view('admin/components/page_tail'); ?>
