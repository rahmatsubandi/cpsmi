<script type="text/javascript">
  $(document).ready(function()
  {

    var _form = "form-setting-account";

    // Handle data submit account
    $("#"+ _form +" .page-action-save-account").on("click", function(e) {
      e.preventDefault();
      tinyMCE.triggerSave();

      var form = $("#"+ _form)[0];
      var data = new FormData(form);

      $.ajax({
        type: "post",
        url: "<?php echo base_url('panel/setting/ajax_save_account/') ?>",
        data: data,
        dataType: "json",
        enctype: "multipart/form-data",
        processData: false,
        contentType: false,
        cache: false,
        success: function(response) {
          if (response.status === true) {
            notify(response.data, "success");
            $("#"+ _form).trigger("reset");
          } else {
            notify(response.data, "danger");
            $(".setting-confirm_password").val("");
          };
        }
      });
      return false;
    });

  });
</script>
