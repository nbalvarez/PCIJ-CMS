<h3><?php echo empty($page->id) ? 'Add a new page' : 'Edit page ' . $page->title; ?></h3>
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
<table class="table">
	<tr>
		<td>Parent</td>
		<td><?php echo form_dropdown('parent_id', $pages_no_parents, $this->input->post('parent_id') ? $this->input->post('parent_id') : $page->parent_id); ?></td>
	</tr>
	<tr>
		<td>Template</td>
		<td><?php echo form_dropdown('template', array('page' => 'Page', 'news_archive' => 'news archive', 'homepage' => 'Homepage', 'blog_archive' => 'Blogs', 'about' => 'About', 'training' => 'Training', 'storylanding' => 'Story Landing'), $this->input->post('template') ? $this->input->post('template') : $page->template); ?></td>
	</tr>
	<tr>
		<td>Title</td>
		<td><?php $data = array('name'=>'title', 'value' => $page->title, 'id' => 'title', 'onkeyup' => 'sync()'); echo form_input($data); ?></td>
	</tr>
	<tr>
		<td>Slug</td>
		<td><?php echo form_input('slug', set_value('slug', $page->slug), 'id = "slug"'); ?></td>
	</tr>
	<tr>
		<td>Body</td>
		<td><?php echo form_textarea('body', html_entity_decode(set_value('body', $page->body)), 'class="ckeditor" id="textarea-ckeditor"'); ?></td>
	</tr>
  <tr>
		<td>Accordion</td>
		<td><button type="button" id="accordionAdd" class="btn btn-default form-btn">Add</button></td>
	</tr>

  <?php if(count($page_elements)) {
    foreach($page_elements as $element) {
      if($element['type'] == 'tab') {
  ?>

  <tr class="Accordion">
		<td>Accordion Tab</td>
		<td>
      <?php if($element['id'] != NULL) { ?>
        <input type="hidden" name="element_id[]" value="<?php echo $element['id'] ?>" />
      <?php } else {?>
        <input type="hidden" name="element_id[]" value="" />
      <?php } ?>
      <input type="hidden" name="element_type[]" value="tab" />
      <?php echo form_input('element_title[]', html_entity_decode(set_value('element_title[]', $element['title']))); ?>
      <?php echo form_textarea('element_body[]', html_entity_decode(set_value('element_body[]', $element['body'])), 'class="editor"'); ?>
      <button type="button" class="btn btn-default form-btn accordionRemove">Remove</button>
      
    </td>
	</tr>
  <?php }}} else {?>
    <tr class="Accordion">
  		<td>Accordion Tab</td>
  		<td>
        <input type="hidden" name="element_id[]" value="" />
        <input type="hidden" name="element_type[]" value="tab" />
        <?php echo form_input('element_title[]'); ?>
        <?php echo form_textarea('element_body[]', set_value('element_body[]', ''), 'class="editor"'); ?>
        <button type="button" class="btn btn-default form-btn accordionRemove">Remove</button>
      </td>
  	</tr>
    <?php } ?>
  <tr>
    <td>Primary Image</td>
    <td><?php if ($page->image_id != NULL) {?>
      <img class="primary-img" src="<?php echo $page->image_src ?>"/>
      <button type="button" id="imageRemove" class="btn btn-default form-btn">Remove</button>
      <input style="display: none" type = "file" id="upload" name = "upload-image" size = "20" class="form-btn" onchange="uploadImage(this)"/>
    <?php } else {?>
      <img style="display: none" class="primary-img" src=""/>
      <button style="display: none"  type="button" id="imageRemove" class="btn btn-default form-btn">Remove</button>
      <input type = "file" id="upload" name = "upload-image" size = "20" class="form-btn" onchange="uploadImage(this)"/>
    <?php }?>
    </td>

  </tr>

	<tr>
		<td>Created By</td>
		<td><?php echo form_input('author', set_value('author', $author)); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>
<script>
$(document).ready(function(){
  $('.editor').ckeditor();
});
$(document).on('click', '#accordionAdd', function(){
  var tr_object = $('.Accordion:first').clone();
  var parent = tr_object.find('.editor').parent();
  tr_object.find('input').val("");
  tr_object.find('input[name="element_type[]"]').val("tab");
  tr_object.find('.cke').remove();
  // tr_object.find('textarea').remove();
  // parent.append('<textarea name="element_body[]" cols="40" rows="10"  class="editor"></textarea>');
  tr_object.find('.editor').show();
  tr_object.find('.editor').val("");
  tr_object.find('.editor').ckeditor();
  tr_object.insertAfter('.Accordion:last');
  // var upload_count = $('tr').length;

  // tr_object.find('.editors').attr('id', 'ckedi' + upload_count);
  // CKEDITOR.replace('ckedi' + upload_count);

});
$(document).on('click', '.accordionRemove', function(){
  $(this).closest('.Accordion').remove();
});
$(document).on('click', '#imageRemove', function(){
  $('.primary-img').hide();
  $('#upload').val("");
  $('#upload').show();
  $(this).hide();
});
function uploadImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.primary-img').attr('src',e.target.result);
            $('.primary-img').show();
            $('#imageRemove').show();
						// $('.js-uploaded-folder-image').css('padding','0');
        };
        reader.readAsDataURL(input.files[0]);
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
