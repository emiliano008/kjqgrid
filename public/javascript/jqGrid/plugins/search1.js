
jQuery("#list").height(25).hide().jqGrid('filterGrid',"list",{gridModel:true,gridToolbar:true});
jQuery("#sg_invdate").datepicker({dateFormat:"yy-mm-dd"});

jQuery("#list").jqGrid('navGrid','#pagered',{edit:false,add:false,del:false,search:false,refresh:false});
jQuery("#list").jqGrid('navButtonAdd',"#pagered",{caption:"Search",title:"Toggle Search",
	onClickButton:function(){ 
		if(jQuery("#t_list").css("display")=="none") {
			jQuery("#t_list").css("display","");
		} else {
			jQuery("#t_list").css("display","none");
		}
		
	} 
});
