<script type="text/javascript">
  $(document).ready(function()
  {

    var _form_smtp = "form-setting-smtp";

    // Handle data submit SMTP
    $("#"+ _form_smtp +" .page-action-save-smtp").on("click", function(e) {
      e.preventDefault();
      tinyMCE.triggerSave();

      var form = $("#"+ _form_smtp)[0];
      var data = new FormData(form);

      $.ajax({
        type: "post",
        url: "<?php echo base_url('panel/setting/ajax_save_smtp/') ?>",
        data: data,
        dataType: "json",
        enctype: "multipart/form-data",
        processData: false,
        contentType: false,
        cache: false,
        success: function(response) {
          if (response.status === true) {
            notify(response.data, "success");
            window.location = "<?php echo base_url('panel/setting/smtp') ?>";
          } else {
            notify(response.data, "danger");
          };
        }
      });
      return false;
    });

  });
</script>
