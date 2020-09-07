<script type="text/javascript">
  $(document).ready(function()
  {

    var _key = "";
    var _section = "moduleFaq";
    var _table = "table-moduleFaq";
    var _modal = "modal-form-moduleFaq";
    var _form = "form-moduleFaq";

    // Initialize DataTables: Index
    if ($("#"+ _table)[0]) {
      var table_moduleFaq = $("#"+ _table).DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "<?php echo base_url('panel/modulefaq/ajax_getall/') ?>",
          type: "get"
        },
        columns: [
          {
              data: "no",
              render: function (data, type, row, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          },
          { data: "question" },
          { data: "answer" },
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
    $("#"+ _section).on("click", "button.faq-action-add", function(e) {
      e.preventDefault();
      resetForm();
    });

    // Handle data edit
    $("#"+ _table).on("click", "a.action-edit", function(e) {
      e.preventDefault();
      resetForm();
      
      var temp = table_moduleFaq.row($(this).closest('tr')).data();

      // Set key for update params, important!
      _key = temp.id;

      $("#"+ _form +" .faq-question").val(temp.question);
      $("#"+ _form +" .faq-answer").val(temp.answer.replace(/<br\s*[\/]?>/gi, "\r\n"));

      // Handle is_active
      $('input:radio[name="is_active"]').filter('[value="'+ temp.is_active +'"]').attr('checked', true);
      if (temp.is_active == "1") {
        $("#"+ _form +" .faq-is_active-yes").attr("checkhed", "true");
        $("#"+ _form +" .faq-option-is_active-yes").addClass("active");
        $("#"+ _form +" .faq-is_active-no").removeAttr("checkhed");
        $("#"+ _form +" .faq-option-is_active-no").removeClass("active");
      } else {
        $("#"+ _form +" .faq-is_active-yes").removeAttr("checkhed");
        $("#"+ _form +" .faq-option-is_active-yes").removeClass("active");
        $("#"+ _form +" .faq-is_active-no").attr("checkhed", "true");
        $("#"+ _form +" .faq-option-is_active-no").addClass("active");
      };

      // Handle textarea height
      setTimeout(function() {
        $("#"+ _form +" .faq-answer").height($("#"+ _form +" .faq-answer")[0].scrollHeight);
      }, 500);
    });

    // Handle data delete
    $("#"+ _table).on("click", "a.action-delete", function(e) {
      e.preventDefault();
      var temp = table_moduleFaq.row($(this).closest('tr')).data();

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
            url  : "<?php echo base_url('panel/modulefaq/ajax_delete/') ?>" + temp.id,
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
    $("#"+ _modal +" .faq-action-save").on("click", function(e) {
      e.preventDefault();

      var form = $("#"+ _form)[0];
      var data = new FormData(form);

      $.ajax({
        type: "post",
        url: "<?php echo base_url('panel/modulefaq/ajax_save/') ?>" + _key,
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
      $("#"+ _form +" .faq-answer").height(40);
    };

  });
</script>
