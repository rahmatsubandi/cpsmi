$(document).ajaxStart(function() {
  $(".spinner").css("display", "flex");
  $(".spinner-action").css("display", "inline-block");
  $(".spinner-action-button").attr("disabled", true);
});

$(document).ajaxStop(function() {
  $(".spinner").css("display", "none");
  $(".spinner-action").css("display", "none");
  $(".spinner-action-button").removeAttr("disabled");
});

function notify(nMessage, nType) {
  $.notify({ message: nMessage },{
    type: nType,
    z_index: 9999,
    delay: 2500,
    timer: 500,
    template:   '<div data-notify="container" class="alert alert-dismissible alert-{0} alert--notify" role="alert">' +
                  '<span data-notify="message">{2}</span>' +
                  '<button type="button" aria-hidden="true" data-notify="dismiss" class="alert--notify__close">Close</button>' +
                '</div>'
  });
};

function readUploadURL(input) {
  $('.upload .upload-preview').html("");

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      if (e.target.result != "") {
        var imageSource = "<img src='"+ e.target.result +"'/>";
        $('.upload .upload-preview').html(imageSource);
      };
    };
    reader.readAsDataURL(input.files[0]);
  };
};

function readUploadMultipleURL(input) {
  var key = $(input).attr("data-preview");
  $('.upload .preview-'+key).html("");

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      if (e.target.result != "") {
        var imageSource = "<img src='"+ e.target.result +"'/>";
        $('.upload .preview-'+key).html(imageSource);
      };
    };
    reader.readAsDataURL(input.files[0]);
  };
};

function readUploadInlineURL(input) {
  $('.upload-inline .upload-preview').html("");

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      if (e.target.result != "") {
        var imageSource = "<img src='"+ e.target.result +"'/>";
        $('.upload-inline .upload-preview').html(imageSource);
      };
    };
    reader.readAsDataURL(input.files[0]);
  };
};

function readUploadInlineMultipleURL(input) {
  var key = $(input).attr("data-preview");
  $('.upload-inline .preview-'+key).html("");

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      if (e.target.result != "") {
        var imageSource = "<img src='"+ e.target.result +"'/>";
        $('.upload-inline .preview-'+key).html(imageSource);
      };
    };
    reader.readAsDataURL(input.files[0]);
  };
};

// Initialize TinyMce
tinymce.init({
  selector: 'textarea.tinymce-init',
  plugins: 'print preview fullpage importcss searchreplace autolink autosave save directionality visualblocks visualchars fullscreen image link media codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
  imagetools_cors_hosts: ['picsum.photos'],
  menubar: 'file edit view insert format tools table tc',
  toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | a11ycheck ltr rtl',
  autosave_ask_before_unload: true,
  autosave_interval: "30s",
  autosave_prefix: "{path}{query}-{id}-",
  autosave_restore_when_empty: false,
  autosave_retention: "2m",
  image_advtab: true,
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tiny.cloud/css/codepen.min.css'
  ],
  importcss_append: true,
  template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
  template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
  height: ($(".tinymce-init").attr("data-height") !== undefined) ? parseInt($(".tinymce-init").attr("data-height")) : 600,
  image_caption: true,
  quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
  noneditable_noneditable_class: "mceNonEditable",
  toolbar_drawer: 'sliding',
  contextmenu: "link image imagetools table",
});

// Intialize MaskInput
$('.mask-money').mask('#,##0', {reverse: true});
$('.mask-email').mask("A", {
	translation: {
		"A": { pattern: /[\w@\.]/, recursive: true }
	}
});
$('.mask-age').mask('00', {reverse: true});
$('.mask-link').mask("A", {
	translation: {
		"A": { pattern: /[\w-\/]/, recursive: true }
	}
});
