// for preview the post
var input = document.querySelector("#select_post_img");

input.addEventListener("change", preview);

function preview() {
  var fileObject = this.files[0];
  var filereader = new FileReader();

  filereader.readAsDataURL(fileObject);

  filereader.onload = function () {
    var images_src = filereader.result;
    var image = document.querySelector("#post_img");
    image.setAttribute("src", images_src);
    image.setAttribute("style", "display:");
  };
}

// for follow the user
$(".followbtn").click(function () {
  var user_id_v = $(this).data("userId");

  var button = this;
  $(button).attr("disabled", true);
  $.ajax({
    url: "assets/php/ajax.php?follow",
    method: "post",
    dataType: "json",
    data: { user_id: user_id_v },
    success: function (response) {
      console.log(response);
      if (response.status) {
        $(button).data("userId", 0);
        $(button).text("Followed");
       
      } else {
        $(button).attr("disabled", false);
        alert("something is wrong , try again after some time");
      }
    },
  });
});
$(".unfollowbtn").click(function () {
  var user_id_v = $(this).data("userId");

  var button = this;
  $(button).attr("disabled", true);
  $.ajax({
    url: "assets/php/ajax.php?unfollow",
    method: "post",
    dataType: "json",
    data: { user_id: user_id_v },
    success: function (response) {
      console.log(response);
      if (response.status) {
        console.log(response.status);
        $(button).data("userId", 0);
        $(button).text("UnFollowed");
       
     
      } else {
        $(button).attr("disabled", false);
        
        alert("something is wrong , try again after some time");
      }
    },
  });

});
$(".like_btn").click(function () {
  var post_id_v = $(this).data("postId");
  var button = this;
  $(button).attr("disabled", true);
  $.ajax({
    url: "assets/php/ajax.php?like",
    method: "post",
    dataType: "json",
    data: { post_id: post_id_v },
    success: function (response) {
      if (response.status) {
        $(button).attr("disabled", false);
        $(button).hide();
        $(button).siblings(".unlike_btn").show();
        $("#likecount" + post_id_v).text(
          $("#likecount" + post_id_v).text() - -1
        );
        location.reload();
      } else {
        $(button).attr("disabled", false);
        alert("something is wrong , try again after some time");
      }
    },
  });
});
$(".unlike_btn").click(function () {
  var post_id_v = $(this).data("postId");
  var button = this;
  $(button).attr("disabled", true);
  $.ajax({
    url: "assets/php/ajax.php?unlike",
    method: "post",
    dataType: "json",
    data: { post_id: post_id_v },
    success: function (response) {
      if (response.status) {
        $(button).attr("disabled", false);
        $(button).hide();
        $(button).siblings(".like_btn").show();
        $("#likecount" + post_id_v).text(
          $("#likecount" + post_id_v).text() - 1
        );
        location.reload();
      } else {
        $(button).attr("disabled", false);
        alert("something is wrong , try again after some time");
      }
    },
  });
});

$(".add-comment").click(function () {
  var button = this;

  var comment_v = $(button).siblings(".comment-input").val();

  if (comment_v == "") {
    return 0;
  }
  var post_id_v = $(this).data("postId");
  var cs = $(this).data("cs");
  var page = $(this).data("page");

  $(button).attr("disabled", true);
  $(button).siblings(".comment-input").attr("disabled", true);
  $.ajax({
    url: "assets/php/ajax.php?addcomment",
    method: "post",
    dataType: "json",
    data: { post_id: post_id_v, comment: comment_v },
    success: function (response) {
      console.log(response);
      
      if (response.status) {
        // location.reload();
      $(".nce").hide();
      if (page == "wall") {
        location.reload();
      }
        $(button).attr("disabled", false);
        $(button).siblings(".comment-input").attr("disabled", false);
        $(button).siblings(".comment-input").val("");
        $("#" + cs).prepend(response.comment);
      } else {
        $(button).attr("disabled", false);
        $(button).siblings(".comment-input").attr("disabled", false);
        location.reload();
        alert("something is wrong,try again after some time");
      }
    },
  });
});

var sr = false;
