<h3><?php echo empty($blog->id) ? 'Add a new Blog' : 'Edit Blog ' . $blog->title; ?></h3>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart(); ?>
<script>
function sync()
{
  var title = document.getElementById('title');
  var slug = document.getElementById('slug');
  slug.value = title.value;
}
</script>
<h4><?php echo $blog->status == 2 ? 'Published' : 'Draft ' . $blog->status; ?></h4>
<table class="table">
  <input type="hidden" name="created" value="<?php echo $blog->created ?>" />
  <tr>
    <td>Publication Date</td>
    <td><?php echo form_input('pubdate', set_value('pubdate', $blog->pubdate),'class="datepicker"'); ?></td>
  </tr>
  <tr>
    <td>Prehead Title</td>
    <td><?php echo form_input('pre_head', set_value('pre_head', $blog->pre_head)); ?></td>
  </tr>
	<tr>
		<td>Posthead Title</td>
		<td><?php $data = array('name'=>'title', 'value' => $blog->title, 'id' => 'title', 'onkeyup' => 'sync()', 'class' => 'input-lg'); echo form_input($data); ?></td>

	</tr>
	<tr>
		<td>Slug</td>
		<td><?php echo form_input('slug', set_value('slug', $blog->slug),'id="slug"'); ?></td>
	</tr>
	<tr>
		<td>Author</td>
		<td><?php echo form_dropdown('authors[]', $authors, set_value('authors[]', $selected_authors),'id="author" onChange="addMultiple(this, \'authors[]\', 1);"')?>

		<ul>
		<?php foreach($selected_authors as $author) { ?>
		 <li>
		  <input type="hidden" name="authors[]" value="<?php echo $author ?>" />
		   <?php echo get_fullname($author); ?> x
		 </li>
		 <?php }?>
		</ul>

		</td>

	</tr>
	<tr>
		<td>Body</td>
		<td><?php echo form_textarea('body', html_entity_decode(set_value('body', $blog->body)), 'class="ckeditor" id="textarea-ckeditor"'); ?></td>
	</tr>
  <tr>
		<td>Summary</td>
		<td><?php echo form_textarea('summary', set_value('summary', $blog->summary), 'class="textarea"'); ?></td>
	</tr>
	<!-- 
	<tr>
		<td>Posthead</td>
		<td><?php echo form_input('post_head', set_value('post_head', $blog->post_head)); ?></td>
	</tr> -->
  <tr>
		<td>Tagline</td>
		<td><?php echo form_dropdown('tagline', $tagline, set_value('pre_head', $blog->tagline), 'id="tagline"')?>

      <label class="tagline-label"></label>

    </td>
	</tr>
	<tr class="taglines">
		<td>Tagline name</td>
		<td><?php echo form_dropdown('tagline_authors[]', $authors, set_value('tagline_authors[]', $selected_tagline_authors),'id="tagline-author" onChange="addMultiple(this, \'tagline_authors[]\', 2);"')?>

		<ul>
		<?php foreach($selected_tagline_authors as $author) { ?>
		 <li onclick="this.parentNode.removeChild(this);showTagline();">
		  <input type="hidden" name="tagline_authors[]" value="<?php echo $author ?>" />
		   <?php echo get_fullname($author); ?>
		 </li>
		 <?php } ?>
		</ul>
	</tr>


	<!-- <tr>
		<td>Series Indicator</td>
		<td><?php echo form_input('series_indicator', set_value('series_indicator', $blog->series_indicator)); ?></td>
	</tr>
	<tr>
		<td>I-Report Indicator</td>
		<td><?php echo form_input('ireport_indicator', set_value('ireport_indicator', $blog->ireport_indicator)); ?></td>
	</tr> -->
  <?php if ($is_data_staff) { ?>
  <tr>
    <td>Index</td>
    <td><?php echo form_input('index_num', set_value('index_num', $blog->index_num),'id="index"'); ?></td>
  </tr>
  <?php } ?>
	<tr>
		<td>Tags</td>
		<td><?php echo form_dropdown('tags[]', $tags, set_value('tags[]', $selected_tags), 'id="tags" onChange="addMultiple(this, \'tags[]\', 3);" class="inputdd"')?>
		<button type="button" id="moreTagsButton" class="btn btn-default" onclick="showCreateTag()">
	      Add More Tags
	    </button>
		<?php echo form_input('new_tag', '', 'id="tagInputBar" style="display:none;" class="addtext"'); ?>
		<button type="button" id="tagInputButton" class="btn btn-default" style="display:none" onclick="addText(0, 'newtags[]', 3)">
	      Create
	    </button>
		<ul>
		<?php foreach($selected_tags as $tag) { ?>
		 <li onclick="this.parentNode.removeChild(this);">
		  <input type="hidden" name="tags[]" value="<?php echo $tag ?>" />
		   <?php echo get_tag_name($tag); ?> x
		 </li>
		 <?php } ?>
		</ul>
		</td>
	</tr>
	<?php if ($is_data_staff) { ?>
  <tr>
    <td>Subject</td>
    <td><?php echo form_dropdown('subjects[]', $subjects, set_value('subjects[]', $selected_subjects), 'id="subjects" onChange="addMultiple(this, \'subjects[]\', 4);" class="inputdd"')?>
    <button type="button" id="moreSubjectsButton" class="btn btn-default form-btn" onclick="showCreateSubject()">
        Add More Subjects
      </button>
    <?php echo form_input('new_subject', '', 'id="subjectInputBar" style="display:none;" class="addtext"'); ?>
    <button type="button" id="subjectInputButton" class="btn btn-default form-btn" style="display:none" onclick="addText(1, 'newsubjects[]', 4)">
        Create
      </button>
    <ul>
    <?php foreach($selected_subjects as $subject) { ?>
     <li onclick="this.parentNode.removeChild(this);">
      <input type="hidden" name="subjects[]" value="<?php echo $subject ?>" />
       <?php echo get_subject_name($subject); ?> x
     </li>
     <?php } ?>
    </ul>
    </td>
  </tr>
  <?php } ?>




	<tr>
		<td>General Notes</td>
		<td><?php echo form_textarea('general_notes', set_value('general_notes', $blog->general_notes), 'class="textarea"'); ?></td>
	</tr>

  <tr class="Upload">
    <td>Upload Files</td>
    <td><?php echo form_dropdown('files[]', $files, set_value('files[]', ""), 'id="files" class="inputdd"')?>

    <input type = "file" multiple id="upload" name = "new_files[]" size = "20" />
   <!--  <ul>
      <?php foreach($selected_files as $file) { ?>
  		 <li onclick="this.parentNode.removeChild(this);">
  		  <input type="hidden" name="files[]" value="<?php echo $file ?>" />
  		   <?php echo get_file_name($file); ?> x
  		 </li>
  	  <?php } ?>
  	</ul> -->
    </td>

  </tr>

  <?php if(count($selected_files)) {
    foreach($selected_files as $file) {     
  ?>

  <tr class="Media">
    <td>Media</td>
    <td>
      <?php if($file['id'] != NULL) { ?>
        <input type="hidden" name="file_article_id[]" value="<?php echo $file['id'] ?>" />
      <?php } else {?>
        <input type="hidden" name="file_article_id[]" value="" />
      <?php } ?>
      <input type="hidden" name="file_id[]" value="<?php echo $file['file_id'] ?>" />
      <div class="col">
        <?php if ($file['image_src'] != NULL) {?>
        <img class="primary-img" src="<?php echo $file['image_src'] ?>"/>
        <button type="button" class="btn btn-default form-btn mediaRemove">Remove</button>
        <?php } else {?>
        <!-- insert placeholder img -->
        <?php } ?>
      </div>
      <div class="col">
        <?php echo form_input('file_title[]', html_entity_decode(set_value('file_title[]', $file['title'])), 'class="col-item" placeholder="Title"'); ?>
        <?php echo form_textarea('file_caption[]', html_entity_decode(set_value('file_caption[]', $file['caption'])), 'class="col-item" placeholder="Caption" cols="40" rows="5"'); ?>
      </div>      
    </td>
  </tr>
  <?php }}?>

	<tr>
		<td></td>
    <td><button name="status" value="<?php echo $blog->status?>" class="btn btn-primary">Save</button></td>

    <?php if($is_editor && $blog->status == 1) { ?>

    <td><button name="status" value="2" class="btn btn-primary">Publish</button></td>

    <?php } else if($blog->status == 0){ ?>

    <td><button name="status" value="1" class="btn btn-primary">Submit</button></td>

    <?php } ?>
	</tr>


</table>
<?php echo form_close();?>


</script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).on('change', '#files', function(){
  
  $.ajax({

      url: '/pcij-cms/pcij/api/v1/file/get_file/' + this.value,

      type: 'GET',

      success: function(data) {

          console.log(data);
          var str = '<tr class="Media"><td>Media</td><td>';
          str += '<input type="hidden" name="file_article_id[]" value="" />';
          str += '<input type="hidden" name="file_id[]" value="' + data.id + '" />';
          str += '<div class="col"><img class="primary-img" src="' + data.image_src + '"/>';
          str += '<button type="button" class="btn btn-default form-btn mediaRemove">Remove</button>';
          str += '</div><div class="col"><input type="text" name="file_title[]" class="col-item" placeholder="Title" value="' + data.image_name + '"/>';
          str += '<textarea name="file_caption[]" class="col-item" placeholder="Caption"/>';
          str += '</div></td></tr>';

          if ($('.Media')[0]){
            $('.Media:last').after(str);
          } else {
            $('.Upload').after(str);
          }

          

      }, error: function(err) {

          console.log(err);

      }, complete: function() {



          console.log("completed");



      },

  });
  
});
</script>
<script>
$( function() {
  $( ".datepicker" ).datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: "yy-mm-dd"
  });

} );
</script>
<script>
function showTagline() {
  var author = [];
  $('.taglines li').each( function(){
     author.push($(this).text());
  })

  var tagline = $('#tagline').find(":selected").text();
  var date = getDate();
  var text = '';
  if (tagline === "PCIJ,") {
    $('.tagline-label').html(tagline + ' ' + date["month"] + ' ' + date["year"]);
  } else {
    text = tagline;
    var i = 0;
    for (i = 0; i < author.length; i++) {
      text += ' ' + author[i] + ',';
    }
    $('.tagline-label').html(text + ' ' + date["month"] + ' ' + date["year"]);
  }
}
$( document ).ready(function() {
    showTagline();
});

function getDate()
{
    var d = new Date();
    var month = [];
    month[0] = "January";
    month[1] = "February";
    month[2] = "March";
    month[3] = "April";
    month[4] = "May";
    month[5] = "June";
    month[6] = "July";
    month[7] = "August";
    month[8] = "September";
    month[9] = "October";
    month[10] = "November";
    month[11] = "December";
    var n = [];
    n['month'] = month[d.getMonth()];
    n['year'] = d.getFullYear();

    return n;
}

$('#tagline, #tagline-author').change( function() {
   console.log('good');
   showTagline();

});
$(document).on("click", "ul > li", function( event ){
  console.log('yes');
  $(this).remove();
});
$(document).on("click", ".taglines li", function( event ){
  console.log('yes');
  showTagline();
});
</script>
<script>
function addMultiple(select,array_var,ul_rank)
{
  // code from http://odyniec.net/blogs/multiple-select-fields/

  //remove existing alerts
  var alert = document.getElementsByClassName('alert')[0];
	 if (alert){
	 	alert.parentNode.removeChild(alert);
	 }

  //get selected option and html tags
  var option = select.options[select.selectedIndex];
  var ul = document.getElementsByTagName('ul')[ul_rank];

  if (ul == "null") {
    ul = document.createElement("ul");
    select.parentNode.insertAfter(ul, select);
  }
  //exits when user already selected that option
  var choices = ul.getElementsByTagName('input');
  for (var i = 0; i < choices.length; i++) {
    if (choices[i].value == option.value) {
    	// add an alert
      	var div = document.createElement('div');
		div.className = "alert alert-warning"
		var textNode = document.createTextNode("You already chose that.");
		div.appendChild(textNode);
		ul.parentNode.insertBefore(div, ul);
      return;
    }
  }
  var li = document.createElement('li');
  var input = document.createElement('input');
  //gets text of the selected option
  var text = document.createTextNode(option.firstChild.data);

  input.type = 'hidden';
  input.name = array_var;
  input.value = option.value; // exception for file

  li.appendChild(input);
  li.appendChild(text);
  li.setAttribute('onclick', 'this.parentNode.removeChild(this);');

  ul.appendChild(li);

}
</script>
<script>
function showCreateTag()
{
  var tagsButton = document.getElementById('moreTagsButton');
  var inputBar = document.getElementById('tagInputBar');
  var inputButton = document.getElementById('tagInputButton');
  tagsButton.style.display = 'none';
  inputBar.style.display = 'block';
  inputButton.style.display = 'block';
 }
  function showCreateSubject()
{
  var subjectsButton = document.getElementById('moreSubjectsButton');
  var inputBar = document.getElementById('subjectInputBar');
  var inputButton = document.getElementById('subjectInputButton');
  subjectsButton.style.display = 'none';
  inputBar.style.display = 'block';
  inputButton.style.display = 'block';
 }
</script>
<script>
function addText(input_rank, array_var, ul_rank)
{
 // code from http://odyniec.net/blogs/multiple-select-fields/
 //get selected option and html tags

 //remove existing alerts
 var alert = document.getElementsByClassName('alert')[0];
 if (alert){
 	alert.parentNode.removeChild(alert);
 }
 //get selected option and html tags
 var text = document.getElementsByClassName('addtext')[input_rank];
 var ul = document.getElementsByTagName('ul')[ul_rank];
  // if (ul == "null") {
  //   ul = document.createElement("ul");
  //   text.parentNode.insertAfter(ul, text);
  // }

  //exits when user already picked that tag
  var choices = ul.getElementsByTagName('li');
  for (var i = 0; i < choices.length; i++) {
    if (choices[i].textContent == text.value) {
    	// add an alert
      	var div = document.createElement('div');
		div.className = "alert alert-warning";
		var textNode = document.createTextNode("You already chose that.");
		div.appendChild(textNode);
		ul.parentNode.insertBefore(div, ul);
      return;
    }
  }
  //exits when user already has that tag in dropdown
  var choices = document.getElementsByClassName('inputdd')[input_rank];
  for (var i = 0; i < choices.options.length; i++) {
    if (choices.options[i].innerHTML == text.value) {
    	// add an alert
    	var div = document.createElement('div');
		div.className = "alert alert-warning"
		var textNode = document.createTextNode("Tag already exists.");
		div.appendChild(textNode);
		ul.parentNode.insertBefore(div, ul);
      return;
    }
  }


  var li = document.createElement('li');
  var input = document.createElement('input');
  //gets text of the selected option
  var textNode = document.createTextNode(text.value + ' x');

  input.type = 'hidden';
  input.name = array_var;
  input.value = text.value;

  li.appendChild(input);
  li.appendChild(textNode);
  li.setAttribute('onclick', 'this.parentNode.removeChild(this);');

  ul.appendChild(li);

}

document.getElementById('upload').addEventListener('change', function(){ addFiles(this,'new_files[]', 4);}, false);

function addFiles(input,array_var, ul_rank){
	var files = input.files;

    var ul = document.getElementsByTagName('ul')[ul_rank];
    var newfiles = ul.getElementsByTagName('input');

    //removes the original new files
	  for (var i = 0; i < newfiles.length; i++) {
	    if (newfiles[i].name == array_var) {
	    	var li = newfiles[i].parentNode;
	    	li.parentNode.removeChild(li);
	      return;
	    }
	  }
	//adds the new files
    for (var i = 0; i < files.length; i++) {

      var li = document.createElement('li');
		  var input = document.createElement('input');
		  //gets text of the selected option
		  var textNode = document.createTextNode(files[i].name + ' x');
		  console.log(files[i]);

		  input.type = 'hidden';
		  input.name = array_var;
		  input.value = files[i].name;

		  li.appendChild(input);
		  li.appendChild(textNode);
		  li.setAttribute('onclick', 'this.parentNode.removeChild(this);');
		  ul.appendChild(li);
    }




}
</script>
<script>
// $('.editor').each(function(){
  CKEDITOR.replace('textarea-ckeditor',{
        filebrowserBrowseUrl : '/pcij-cms/pcij/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/pcij-cms/pcij/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/pcij-cms/pcij/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
    });
// })
    
</script>
