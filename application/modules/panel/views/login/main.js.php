<script type="text/javascript">
  $(document).ready(function()
  {

    var _form = "form-login";

    // Handle data submit
    $("#"+ _form +" .page-action-login").on("click", function(e) {
      e.preventDefault();

      var form = $("#"+ _form)[0];
      var data = new FormData(form);

      $.ajax({
        type: "post",
        url: "<?php echo base_url('panel/login/ajax_submit/') ?>",
        data: data,
        dataType: "json",
        enctype: "multipart/form-data",
        processData: false,
        contentType: false,
        cache: false,
        success: function(response) {
          if (response.status === true) {
            notify(response.data, "success");
            window.location = "<?php echo base_url('panel/') ?>";
          } else {
            notify(response.data, "danger");
            $("#"+ _form +" .login-password").val("").focus();
          };
        }
      });
      return false;
    });

    // Handle ajax spinner
    $(document).ajaxStart(function() {
      $(".login-button").hide();
      $(".login-spinner").show();
    });

    $(document).ajaxStop(function() {
      $(".login-button").show();
      $(".login-spinner").hide();
    });

  });
</script>
