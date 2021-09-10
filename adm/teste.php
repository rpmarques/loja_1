<?php
include_once './cabecalho.php';
$storeFolder = 'imgs';
if ($_POST) {
   var_dump($_FILES);
   if (!empty($_FILES)) {
      $tempFile = $_FILES['file']['tmp_name'];
      $targetPath = dirname(__FILE__) . '/' . $storeFolder . $ds;
      $targetFile = $targetPath . $_FILES['file']['name'];
      move_uploaded_file($tempFile, $targetFile);
   }
}
?>
<div class="main-content">
   <div class="main-content-inner">
      <div class="page-content">
         <div class="row">
            <div class="col-xs-12">
               <!-- PAGE CONTENT BEGINS -->
               <form action="./teste.php" method="post" class="dropzone" id="dropzone">
                  <div class="fallback">
                     <input name="file" type="file" multiple="" />
                  </div>
               </form>               
               <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
         </div><!-- /.row -->
      </div><!-- /.page-content -->
   </div>
</div><!-- /.main-content -->


<script type="text/javascript">
   jQuery(function ($) {
      try {
         Dropzone.autoDiscover = false;
         var myDropzone = new Dropzone("#dropzone", {
            url:'envia.php',
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 5, // MB
            dictResponseError: 'Erro ao fazer o upload !',
            autoProcessQueue: true, //FALSE PARA ENVIAR DEPOIS DE CLICAR EM OK
            maxFiles: 15,
            acceptedFiles: 'image/*',
//            clickable: ".fileinput-button",
            addRemoveLinks: true, //BOTÃO PARA REMOVER O ARQUIVO
            dictDefaultMessage: //MENSAGEM PADRÃO
                    '<span class="bigger-150 bolder"><i class="ace-icon fa fa-caret-right red"></i>  Mova seus arquivos </span> para fazer upload \
                       <span class="smaller-80 grey">(ou clique)</span> <br /> \
                       <i class="upload-icon ace-icon fa fa-cloud-upload blue fa-3x"></i>'
            ,
            dictResponseError: 'Error while uploading file!',
                    //change the previewTemplate to use Bootstrap progress bars
                    previewTemplate: "<div class=\"dz-preview dz-file-preview\">\n  <div class=\"dz-details\">\n    <div class=\"dz-filename\"><span data-dz-name></span></div>\n    <div class=\"dz-size\" data-dz-size></div>\n    <img data-dz-thumbnail />\n  </div>\n  <div class=\"progress progress-small progress-striped active\"><div class=\"progress-bar progress-bar-success\" data-dz-uploadprogress></div></div>\n  <div class=\"dz-success-mark\"><span></span></div>\n  <div class=\"dz-error-mark\"><span></span></div>\n  <div class=\"dz-error-message\"><span data-dz-errormessage></span></div>\n</div>"
         });

//$('#submitbtn').on('click',function(e){
//    e.preventDefault();
//    myDropzone.processQueue();  
//  });   


         $(document).one('ajaxloadstart.page', function (e) {
            try {
               myDropzone.destroy();
            } catch (e) {
            }
         });

      } catch (e) {
         alert('Dropzone.js does not support older browsers!');
      }

   });
</script>

<?php include_once './rodape.php'; ?>