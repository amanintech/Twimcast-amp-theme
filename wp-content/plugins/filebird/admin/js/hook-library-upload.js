!function(e){"use strict";var t=-1;setInterval(function(){e(".njt-filebird-editcategory-filter").change(function(n){void 0!==n.originalEvent&&(t=Number(e(".njt-filebird-editcategory-filter").val()))});var n=e(".media-toolbar-secondary .wpmediacategory-filter"),a=e(".njt-filebird-editcategory-filter");n.length&&a.length&&n.on("change",function(){a.val(n.val()),a.trigger("change"),t=Number(n.val())})},1e3),e(document).ready(function(){var n=window.wp;void 0!==n&&"function"==typeof n.Uploader&&e.extend(n.Uploader.prototype,{progress:function(){},init:function(){this.uploader&&(this.uploader.bind("FileFiltered",function(e,t){}),this.uploader.bind("BeforeUpload",function(e,n){var a=t,i=e.settings.multipart_params;Number.isInteger(a)&&a>0&&(i.ntWMCFolder=a)}),this.uploader.bind("UploadProgress",function(t,n){e(".uploader-window").hide().css("opacity",0),ntWMC.filebird_begin_loading()}),this.uploader.bind("UploadComplete",function(e,n){ntWMC.filebird_finish_loading(),jQuery('.menu-item[data-id="'+t+'"] .jstree-anchor').trigger("click")}),this.uploader.bind("FilesAdded",function(e,n){var a=t,i=jQuery('.menu-item[data-id="'+a+'"] .jstree-anchor'),r=jQuery(".menu-item[data-id=-1] .jstree-anchor"),o=jQuery('.menu-item[data-id="all"] .jstree-anchor');n.forEach(function(e){ntWMC.updateCount(null,a),"all"===a?(r.addClass("need-refresh"),ntWMC.updateCount(null,-1)):-1===Number(a)?(o.addClass("need-refresh"),ntWMC.updateCount(null,"all")):(i.addClass("need-refresh"),ntWMC.updateCount(null,"all"))})}))}})}),jQuery(document).ajaxSend(function(t,n,a){try{if(a.data.indexOf("action=delete-post")>-1){var i=a.context.id;jQuery.ajax({type:"POST",dataType:"json",data:{id:i,action:"nt_wcm_get_terms_by_attachment"},url:ajaxurl,success:function(t){var n=Array.from(t.data,e=>e.term_id);n.length&&e("#filebird_terms").val(n.join())}})}}catch(t){}}.bind(this)),jQuery(document).ajaxComplete(function(n,a,i){try{if(i.data.indexOf("action=delete-post")>-1){var r=t,o=e("#filebird_terms").val();if(o){var d=o.split(",");e.each(d,function(e,t){ntWMC.updateCount(t,null)})}else"all"!==r||o||ntWMC.updateCount(-1,null);-1===Number(r)&&ntWMC.updateCount(-1,null),ntWMC.updateCount("all",null)}}catch(n){}}.bind(this)),jQuery(document).ajaxComplete(function(t,n,a){try{if("add-nt_wmc_folder"===a.action){var i=-1;setTimeout(()=>{if(jQuery("[name='tax_input[nt_wmc_folder][]']").each(function(){var t=parseInt(e(this).val());i=t>i?t:i}),i>0){var t={action:"filebird_ajax_update_folder_list",type:"new_edit_attachment",folder_type:"default",term_id:i};e.post(ajaxurl,t,function(e){"error"==e&&console.log("error insert")}).fail(function(){console.log("error insert")}).success(function(e){console.log(e)})}},300)}}catch(t){}}.bind(this))}(jQuery);