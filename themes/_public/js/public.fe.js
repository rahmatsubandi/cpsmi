jQuery(document).ready(function() {
	
  "use strict";

  // Back page handle
  $(".go-back").on("click", function(e) {
    e.preventDefault();
    window.history.back();
  });

  // Handle post comments
  $("#article__form-comment").on("submit", function(e) {
    e.preventDefault();

    var _form = $("#article__form-comment");
    var _data = new FormData(_form[0]);
    var _url  = _form.attr("action");

    $.ajax({
      type: "post",
      url: _url,
      data: _data,
      dataType: "json",
      enctype: "multipart/form-data",
      processData: false,
      contentType: false,
      cache: false,
      beforeSend: function() {
        $("#article__comment-post").html("Publishing...").attr("disabled", true);
      },
      success: function(response) {
        if (response.status) {
          // Show alert
          $("#article__form-comment")[0].reset();
          $(".article__response-comment").show();
          $(".article__response-comment-alert").removeClass("alert-danger").addClass("alert-success");
          $(".article__response-comment-data").html(response.data);

          // Reload page
          location.reload();
        } else {
          // Show alert
          $(".article__response-comment").show();
          $(".article__response-comment-alert").removeClass("alert-success").addClass("alert-danger");
          $(".article__response-comment-data").html(response.data);
        };
      },
      error: function (request, status, error) {
        alert("Error while publishing comment, try again later.");
      },
      complete: function() {
        $("#article__comment-post").html("Post").removeAttr("disabled");
      }
    });
  });

  // Handle dlete comments
  $(".article__comment-delete").on("click", function(e) {
    e.preventDefault();

    var _comment = $(this).attr("data-comment");
    var _url = $(this).attr("data-action");

    if (confirm("Are you sure to delete?")) {
      $.ajax({
        type: "get",
        url: _url,
        dataType: "json",
        beforeSend: function() {
          $(this).html("Deleteing...").attr("disabled", true);
        },
        success: function(response) {
          if (response.status) {
            $("#" + _comment).remove();
          } else {
            alert(response.data);
          };
        },
        error: function (request, status, error) {
          alert("Error while deleting comment, try again later.");
        },
        complete: function() {
          $(this).html("Delete").removeAttr("disabled");
        }
      });
    };
  });

});
