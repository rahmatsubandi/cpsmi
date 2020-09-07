<script type="text/javascript">
  $(document).ready(function()
  {

    var _key = "";
    var _section = "theme";
    var _modal = "modal-detail-theme";

    // Open detail modal
    $("#"+ _section).on("click", "div.theme-item", function(e) {
      e.preventDefault();
      var theme = $(this).attr("data-theme");
      var isactive = $(this).attr("data-isactive");
      resetModal();
      $("#"+ _modal).modal("show");
      getDetail(theme, isactive);
    });

    // Handle detail data
    function getDetail(name, isactive) {
      $.ajax({
        type: "get",
        url: "<?php echo base_url('panel/theme/ajax_detail/') ?>" + name,
        dataType: "json",
        cache: false,
        success: function(response) {
          if (response.status === true) {
            var temp = response.data;
            var status = (isactive == 'yes') ? '<span style="color: green;">Active</span>' : '<span style="color: #999;">Not Active</span>';

            // Set key for update params, important!
            _key = temp.path;

            $("#"+ _modal +" .name").html(temp.name);
            $("#"+ _modal +" .publisher").html('Theme By <a href="'+ temp.publisher_link +'" target="_blank">'+ temp.publisher +'</a>');
            $("#"+ _modal +" .status").html(status);
            $("#"+ _modal +" .screenshot-active").html('<img class="screenshot-active-img" src="'+ temp.screenshot[0] +'"/>');

            if (temp.screenshot.length > 0) {
              $("#"+ _modal +" .description").css("padding-top", "115px");
              jQuery.map(temp.screenshot, function(item, index) {
                if (index < 5) {
                  var list  = '<a class="screenshot__item" href="'+ item +'" target="_blank">';
                      list += '<img src="'+ item +'"/>';
                      list += '</a>';
                  $("#"+ _modal +" .screenshot-list").append(list);
                };
              });
            } else {
              $("#"+ _modal +" .description").css("padding-top", "10px");
            };

            // Handle select button
            if (isactive == 'yes') {
              $(".theme-action-active").hide();
            } else {
              $(".theme-action-active").show();
            };

            // Handle screenshot preview
            $(".screenshot__item").hover(function() {
              var source = $(this).attr("href");

              console.log("Preview change...");
              console.log(source);

              $(".screenshot-active-img").attr("src", source);
              // $(".link-product-active").attr("href", source);
            });
          } else {
            $("#"+ _modal).modal("hide");
            notify(response.data, "danger");
          };
        }
      });
    };

    // Handle action select
    $("#"+ _section).on("click", "a.theme-action-select", function(e) {
      e.preventDefault();
      var path = $(this).attr("data-path");
      setActive(path);
    });

    // Handle action select
    $("#"+ _modal).on("click", "button.theme-action-active", function(e) {
      e.preventDefault();
      setActive(_key);
    });

    // Handle setActive
    function setActive(path) {
      swal({
        title: "Change theme",
        text: "Are you sure you want to use this theme?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false
      }).then((result) => {
        if (result.value) {
          $.ajax({
            type : "GET",
            url  : "<?php echo base_url('panel/theme/ajax_save/') ?>" + path,
            dataType : "json",
            success: function(response) {
              if (response.status) {
                notify(response.data, "success");
                window.location = "<?php echo base_url('panel/theme/') ?>";
              } else {
                notify(response.data, "danger");
              };
            }
          });
        };
      });
    };

    // Handle reset modal
    function resetModal() {
      $("#"+ _modal +" .description").css("padding-top", "10px");
      $("#"+ _modal +" .name").html("-");
      $("#"+ _modal +" .publisher").html("-");
      $("#"+ _modal +" .status").html("-");
      $("#"+ _modal +" .screenshot-active").html("");
      $("#"+ _modal +" .screenshot-list").html("");
    };

  });
</script>
