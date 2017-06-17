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
