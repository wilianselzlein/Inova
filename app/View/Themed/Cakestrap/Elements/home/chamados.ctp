<style>
   .tab-content{
      /*border: 1px solid red;*/
      position: relative;
      padding-bottom: 56.25%; /* 16:9 */
      padding-top: 25px;
      height: 0;
   }
   .tab-content iframe {
      /*border: 1px solid blue;*/
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
   }





   /* Start by setting display:none to make this hidden.
   Then we position it in relation to the viewport window
   with position:fixed. Width, height, top and left speak
   for themselves. Background we set to 80% white with
   our animation centered, and no-repeating */
   .modal {
      display:    none;
      position:   fixed;
      z-index:    1000;
      top:        0;
      left:       0;
      height:     100%;
      width:      100%;
      background: rgba( 255, 255, 255, .8 ) 
         url('/img/loading.gif') 
         50% 50% 
         no-repeat;
   }

   /* When the body has the loading class, we turn
   the scrollbar off with overflow:hidden */
   body.loading {
      overflow: hidden;   
   }

   /* Anytime the body has the loading class, our
   modal element will be visible */
   body.loading .modal {
      display: block;
   }


</style> 
<div class="modal"><!-- Place at bottom of page --></div>
<div id="container">
   <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
      <li class="active">
         <a href="/home/getChamadosBySituacao/1" data-toggle="tab" data-target="tab-frame"><span class=" "></span>&nbsp;<?php echo __('Aberto'); ?></a>
      </li>
      <li>
         <a href="/home/getChamadosBySituacao/2" data-toggle="tab" data-target="tab-frame"><span class=" "></span>&nbsp;<?php echo __('Aguardando Posição Cliente'); ?></a>
      </li>
      <li>
         <a href="/home/getChamadosBySituacao/3" data-toggle="tab" data-target="tab-frame"><span class=" "></span>&nbsp;<?php echo __('Concluído'); ?></a>
      </li>
      <li>
         <a href="/home/getChamadosBySituacao/4" data-toggle="tab" data-target="tab-frame"><span class=" "></span>&nbsp;<?php echo __('Aguardando Controle de Qualidade'); ?></a>
      </li>
      <li>
         <a href="#tabPrev" data-toggle="tab-"><span class=""></span>&nbsp;<?php echo __('Previsão de Execução'); ?></a>
      </li>
      <li>
         <a href="#tabCalend" data-toggle="tab"><span class=" "></span>&nbsp;<?php echo __('Agenda de Chamados'); ?></a>
      </li>
   </ul>
   <div id="tab-content" class="tab-content ">         
      <iframe id="frametab" name="tab-frame" src="/home/getChamadosBySituacao/1" onload="hideLoading();"  scrolling="no" noresize frameborder="0"></iframe>
   </div>

</div>

<script>



   function hideLoading(){
      $body = $("body");
      $body.removeClass("loading"); 

   }

   jQuery(document).ready(function() {
      $body = $("body");
      $body.addClass("loading"); 

      $("a[href^=#tab-situacao-]").click(function(event){
         alert(this.href);
         event.preventDefault();
         var id = this.href.substr(this.href.length - 1);
         $.ajax({
            type:"GET",
            url:"/home/getChamadosBySituacao/"+id,
            //url: "/templates/reajax/" + id,
            success : function(data) {
               alert('data');
               $("#tab-content").html(data);               
            },
            error : function() {
               alert('error');
            },
         })
      });

      $('a[data-toggle="tab"]').click(function(event){
         $body = $("body");
         $body.addClass("loading"); 
         $('#frametab').attr('src',this.href);
      });
   })
</script>