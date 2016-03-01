var postid = 0;

$('.post').find('.interaction').find('.edit').on('click', function (event) {
  event.preventDefault();

  var postBody = event.target.parentNode.parentNode.childNodes[1].textContent;
  postid = event.target.parentNode.parentNode.dataset['postid'];

  $('#post-body').val(postBody);
  $('#edit-model').modal();
});

$('#modal-save').on('click', function() {
  $.ajax({
    method: 'POST',
    url: url,
    data: {
      body: $('#post-body').val(),
      postId: postid,
      _token: token
    }
  }).done(function (msg) {
    console.log(msg['message'])
  });
});
