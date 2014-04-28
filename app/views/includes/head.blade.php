<!--head-->
@section('head')
<meta http-equiv="X-UA-Compatible" content="IE=edge" charset="utf-8" />
<title>Laravel Basic</title>
<meta name="description" content="Laravel basic">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">
<link rel="shortcut icon" href="favicon.ico">

<link rel="stylesheet" href="{{ URL::asset('css/bootstrap/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap/bootstrap-theme.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/custom/form-style.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/custom/custom-styles.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/datatables/jquery.dataTables.css') }}">

<!-- Scripts-->
<script src="{{ URL::asset('js/jquery/jquery-2.0.0.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/custom.js') }}"></script>

<script src="{{ URL::asset('tinymce/tinymce.min.js')}}"></script>
<script src="{{ URL::asset('tinymce/jquery.tinymce.min.js')}}"></script>
<script src="{{ URL::asset('tinymce/x.min.js')}}"></script>
<script>
    tinymce.init({
        entity_encoding: 'raw',

        selector: "textarea",theme: "modern",width: 680,height: 300,
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons paste textcolor responsivefilemanager"
        ],
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
        toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
        image_advtab: true ,

        relative_urls:false,
        remove_script_host:false,
        convert_urls:false,
        remove_linebreaks:true,
        gecko_spellcheck:true,
        fix_list_elements:true,
        keep_styles:false,
        entities:"38,amp,60,lt,62,gt",
        accessibility_focus:true,
        media_strict:false,
        paste_remove_styles:true,
        paste_remove_spans:true,
        paste_strip_class_attributes:"all",
        paste_text_use_dialog:true,
        webkit_fake_resize:false,
        preview_styles:"font-family font-weight text-decoration text-transform",
        schema:"html5",

        external_filemanager_path:"{{ URL::asset('filemanager') }}/",
        filemanager_title:"Responsive Filemanager" ,
        external_plugins: { "filemanager" : "{{ URL::asset('filemanager/plugin.min.js') }}"}
    });
</script>



@show
<!--/head-->