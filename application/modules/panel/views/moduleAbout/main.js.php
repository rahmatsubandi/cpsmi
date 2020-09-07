<script type="text/javascript">
  $(document).ready(function()
  {

    var _form = "form-moduleAbout";

    // Handle data submit
    $("#"+ _form +" .page-action-save").on("click", function(e) {
      e.preventDefault();
      tinyMCE.triggerSave();

      var form = $("#"+ _form)[0];
      var data = new FormData(form);

      $.ajax({
        type: "post",
        url: "<?php echo base_url('panel/moduleabout/ajax_save/') ?>",
        data: data,
        dataType: "json",
        enctype: "multipart/form-data",
        processData: false,
        contentType: false,
        cache: false,
        success: function(response) {
          if (response.status === true) {
            notify(response.data, "success");
          } else {
            notify(response.data, "danger");
          };
        }
      });
      return false;
    });

    // Handle upload
    $(".about-image").change(function(){
      readUploadURL(this);
    });

  });
</script>
