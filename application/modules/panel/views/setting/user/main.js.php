<script type="text/javascript">
  $(document).ready(function()
  {

    var _key = "";
    var _section = "settingUser";
    var _table = "table-settingUser";
    var _modal = "modal-form-settingUser";
    var _form = "form-settingUser";

    // Initialize DataTables: Index
    if ($("#"+ _table)[0]) {
      var table_settingUser = $("#"+ _table).DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "<?php echo base_url('panel/setting/ajax_getall_user/') ?>",
          type: "get"
        },
        columns: [
          {
              data: "no",
              render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          {
            data: "profile_photo",
            render: function(data, type, row, meta) {
              if (data != "" && data != null) {
                return '<img src="<?php echo base_url() ?>'+ data +'" style="width: 45px; height: 45px; object-fit: cover;"/>';
              } else {
                return '<img src="<?php echo base_url() ?>themes/material_admin/demo/img/profile-pics/2.jpg" style="width: 45px; height: 45px; object-fit: cover;"/>';
              };
            }
          },
          { data: "full_name" },
          { data: "username" },
          {
            data: "is_active",
            render: function(data, type, row, meta) {
              return (data == "1") ? 'Yes' : 'No';
            }
          },
          { data: "created_at" },
          {
            data: null,
            className: "center",
            defaultContent:
            '<div class="action">' +
              '<a href="javascript:;" class="action-edit" data-toggle="modal" data-target="#'+ _modal +'"><i class="zmdi zmdi-edit"></i></a>' +
              '<a href="javascript:;" class="action-delete"><i class="zmdi zmdi-delete"></i></a>' +
            '</div>'
          }
        ],
        autoWidth: !1,
        responsive: !0,
        pageLength: 15,
        language: {
          searchPlaceholder: "Search...",
          sProcessing: '<div style="text-align: center;"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>'
        },
        sDom: '<"dataTables_ct"><"dataTables__top"fb>rt<"dataTables__bottom"ip><"clear">',
        initComplete: function(a, b) {
          $(this).closest(".dataTables_wrapper").find(".dataTables__top").prepend(
            '<div class="dataTables_buttons hidden-sm-down actions">' +
              '<span class="actions__item zmdi zmdi-refresh" data-table-action="reload" title="Reload" />' +
            '</div>'
          );
        }
      });

      $(".dataTables_filter input[type=search]").focus(function() {
        $(this).closest(".dataTables_filter").addClass("dataTables_filter--toggled")
      });

      $(".dataTables_filter input[type=search]").blur(function() {
        $(this).closest(".dataTables_filter").removeClass("dataTables_filter--toggled")
      });

      $("body").on("click", "[data-table-action]", function(a) {
        a.preventDefault();
        var b = $(this).data("table-action");
        if ("reload" === b) {
          $("#"+ _table).DataTable().ajax.reload( null, false );
        };
      });
    };

    // Handle data add
    $("#"+ _section).on("click", "button.settingUser-action-add", function(e) {
      e.preventDefault();
      resetForm();
    });

    // Handle data edit
    $("#"+ _table).on("click", "a.action-edit", function(e) {
      e.preventDefault();
      resetForm();
      var temp = table_settingUser.row($(this).closest('tr')).data();

      // Set key for update params, important!
      _key = temp.id;

      $("#"+ _form +" .settingUser-full_name").val(temp.full_name);
      $("#"+ _form +" .settingUser-username").val(temp.username);
      $("#"+ _form +" .settingUser-password").val("");
      $("#"+ _form +" .settingUser-password-label").removeAttr("required");

      // Handle profile_photo
      if (temp.profile_photo != "" && temp.profile_photo != null) {
        var profilePhoto = "<?php echo base_url() ?>"+ temp.profile_photo;
            profilePhotoRender = '<img src="'+ profilePhoto +'"/>';
        $("#"+ _form +" .upload-preview").html(profilePhotoRender);
      };

      // Handle is_active
      $('input:radio[name="is_active"]').filter('[value="'+ temp.is_active +'"]').attr('checked', true);
      if (temp.is_active == "1") {
        $("#"+ _form +" .settingUser-is_active-yes").attr("checkhed", "true");
        $("#"+ _form +" .settingUser-option-is_active-yes").addClass("active");
        $("#"+ _form +" .settingUser-is_active-no").removeAttr("checkhed");
        $("#"+ _form +" .settingUser-option-is_active-no").removeClass("active");
      } else {
        $("#"+ _form +" .settingUser-is_active-yes").removeAttr("checkhed");
        $("#"+ _form +" .settingUser-option-is_active-yes").removeClass("active");
        $("#"+ _form +" .settingUser-is_active-no").attr("checkhed", "true");
        $("#"+ _form +" .settingUser-option-is_active-no").addClass("active");
      };
    });

    // Handle data delete
    $("#"+ _table).on("click", "a.action-delete", function(e) {
      e.preventDefault();
      var temp = table_settingUser.row($(this).closest('tr')).data();

      swal({
        title: "Are you sure to delete?",
        text: "Once deleted, you will not be able to recover this data!",
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
            url  : "<?php echo base_url('panel/setting/ajax_delete_user/') ?>" + temp.id,
            dataType : "json",
            success: function(response) {
              if (response.status) {
                $("#"+ _table).DataTable().ajax.reload( null, false );
                notify(response.data, "success");
              } else {
                notify(response.data, "danger");
              };
            }
          });
        };
      });
    });

    // Handle data submit
    $("#"+ _modal +" .settingUser-action-save").on("click", function(e) {
      e.preventDefault();

      var form = $("#"+ _form)[0];
      var data = new FormData(form);

      $.ajax({
        type: "post",
        url: "<?php echo base_url('panel/setting/ajax_save_user/') ?>" + _key,
        data: data,
        dataType: "json",
        enctype: "multipart/form-data",
        processData: false,
        contentType: false,
        cache: false,
        success: function(response) {
          if (response.status === true) {
            resetForm();
            $("#"+ _modal).modal("hide");
            $("#"+ _table).DataTable().ajax.reload( null, false );
            notify(response.data, "success");
          } else {
            notify(response.data, "danger");
          };
        }
      });
    });

    // Handle form reset
    resetForm = () => {
      _key = "";
      $("#"+ _form).trigger("reset");
      $("#"+ _form +" .settingUser-password-label").attr("required", true);
      $("#"+ _form +" .upload-preview").html("");
    };

    // Handle upload
    $(".settingUser-profile_photo").change(function(){
      readUploadInlineURL(this);
    });

  });
</script>
