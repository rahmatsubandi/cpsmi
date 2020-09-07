<script type="text/javascript">
  $(document).ready(function()
  {

    var _form_application = "form-setting-application";

    // Handle data submit Application
    $("#"+ _form_application +" .page-action-save-application").on("click", function(e) {
      e.preventDefault();
      tinyMCE.triggerSave();

      var form = $("#"+ _form_application)[0];
      var data = new FormData(form);

      $.ajax({
        type: "post",
        url: "<?php echo base_url('panel/setting/ajax_save_application/') ?>",
        data: data,
        dataType: "json",
        enctype: "multipart/form-data",
        processData: false,
        contentType: false,
        cache: false,
        success: function(response) {
          if (response.status === true) {
            notify(response.data, "success");
            window.location = "<?php echo base_url('panel/setting/application') ?>";
          } else {
            notify(response.data, "danger");
          };
        }
      });
      return false;
    });

    // Handle upload
    $(".setting-app_favicon").change(function(){
      readUploadInlineURL(this);
    });

  });
</script>
