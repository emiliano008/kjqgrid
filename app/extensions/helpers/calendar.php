 <?php 
  class Calendar{ 
      public static function text($field, $attrs = NULL, $value = NULL){ 
          static $i = false; 
          $code   =   ''; 
          if($i == false){ 
                  $i = true; 
                  $code   .=    Tag::css('themes/dark-hive/jquery.ui.all'); 
                  $code   .=   Tag::js('jquery/ui/jquery.ui.core'); 
                  $code   .=   Tag::js('jquery/ui/jquery.ui.datepicker');
          } 
          $code   .=   Form::text($field, $attrs, $value); 
          $field  =   str_replace('.', '_', $field); 
          $code   .=  "<script type=\"text/javascript\"> 
                      $(function() { 
                          $(\"#" . $field . "\").datepicker({ 
                          altFormat: 'd/m/yy', 
                          autoSize: true, 
                          dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado'], 
                          dayNamesMin: ['Dom', 'Lu', 'Ma', 'Mi', 'Je', 'Vi', 'Sa'], 
                          firstDay: 1, 
                          monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'], 
                          monthNamesShort: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'], 
                          dateFormat: 'dd/mm/yy', 
                          changeMonth: true, 
                          changeYear: true}); 
                      }); 
                      </script>"; 
          return $code; 
      } 
  } 
  ?>