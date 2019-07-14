;(function($){
	var mynumbk = function(element,option){
		var defaults = {
			style: 9,//系统颜色风格1/2/3
			textDone: '拨打',
			textDelete: '退格',
			textClear: '清除',
			textCancel: '退出',
			textSubtract: '+/-'
		}
		this.target = '';//当前添加的节点
		this.ele = $(element);
		this.opt = $.extend({},defaults,option);
		this.init();
	}
	mynumbk.prototype = {
		init:function(){
			this.initHtml();
			this.openLayer();
			this.exitLayer();
			this.insertNum();
			this.delNum();
			this.clearNum();
			this.sureNum();
			this.setStyle();
		},
		initHtml:function(){
			var index = $(".numbk_layer").length+1;
			var _html = [
				'<div id="numbk'+index+'" class="numbk_layer">',
					'<div class="numbk_mask"></div>',
					'<div class="numbk_actionsheet">',
						'<ul class="numbk_items">',
							'<li class="numbk_screen"></li>',
							'<li class="numbk_num">1</li>',
							'<li class="numbk_num">2</li>',
							'<li class="numbk_num">3</li>',
							'<li class="numbk_func numbk_exit">'+this.opt.textCancel+'</li>',
							'<li class="numbk_num">4</li>',
							'<li class="numbk_num">5</li>',
							'<li class="numbk_num">6</li>',
							'<li class="numbk_func numbk_del">'+this.opt.textDelete+'</li>',
							'<li class="numbk_num">7</li>',
							'<li class="numbk_num">8</li>',
							'<li class="numbk_num">9</li>',
							'<li class="numbk_func numbk_clear">'+this.opt.textClear+'</li>',
							'<li class="numbk_num">*</li>',
							'<li class="numbk_num">0</li>',
							'<li class="numbk_num">#</li>',
							'<li class="numbk_func numbk_sure">'+this.opt.textDone+'</li>',
						'</ul>',
					'</div>',
				'</div>'
			].join("");
			this.target = $(_html);
			$("body").append(this.target);
		},
		setStyle:function(){
			switch(this.opt.style) {
				case 1:
					$(".numbk_actionsheet",this.target).css("background","rgba(0,0,0,0.6)");
					$(".numbk_items .numbk_num",this.target).css("color","#1b50a2");
					$(".numbk_items .numbk_screen",this.target).css("color","#1b50a2");
					break;
				case 2:
					$(".numbk_actionsheet",this.target).css("background","rgba(167, 167, 167, 0.6)");
					$(".numbk_items .numbk_num",this.target).css("color","#0e90d2");
					$(".numbk_items .numbk_screen",this.target).css("color","#0e90d2");
					break;
				case 3:
					$(".numbk_actionsheet",this.target).css("background","rgba(167, 167, 167, 0.6)");
					$(".numbk_items .numbk_num",this.target).css("color","#0e90d2");
					$(".numbk_items .numbk_screen",this.target).css("color","#0e90d2");
					$(".numbk_items li",this.target).css("font-weight","100");
					break;
				default:
					$(".numbk_actionsheet",this.target).css("background","rgba(167, 167, 167, 0.6)");
					$(".numbk_items .numbk_num",this.target).css("color","#0e90d2");
					$(".numbk_items .numbk_screen",this.target).css("color","#0e90d2");
					$(".numbk_items li",this.target).css("font-weight","100");
					break;
			}
		},
		openLayer:function(){
			var that = this;
			that.ele.on("click",function(){
				$(this).attr("readonly","readonly");
				var inputVal = isNaN(that.ele.val()) ? '' : that.ele.val();
				$(".numbk_screen",that.target).text(inputVal);
				$(that.target).show('fast', function() {
					$(".numbk_actionsheet",that.target).slideDown();
				});
			})
		},

exitLayer:function(){



var that = this;
},
insertNum:function(){
var that = this;
$(".numbk_num",that.target).on("click",function(){
				var currentVal = $(".numbk_screen",that.target).text();
				var currentKey = $(this).text();

if(currentKey=="."){//type .
					currentVal==""?currentVal="0":currentVal;
					currentVal = currentVal.toString().indexOf(".")==-1 ? currentVal.toString()+currentKey : currentVal;
				}else if(currentKey=="0"&&(currentVal==""||currentVal=="0")){
					currentVal = "0";
				}else{
					currentVal=="0"?currentVal="":currentVal;
					currentVal = currentVal.toString() + $(this).text();
				}
				$(".numbk_screen",that.target).text(currentVal);
			})
		},
		delNum:function(){
			var that = this;
			$(".numbk_del",that.target).on("click",function(){
				var currentVal = $(".numbk_screen",that.target).text();
				if(currentVal==""){
					return
				}
				currentVal = currentVal.substring(0,currentVal.length-1);
				$(".numbk_screen",that.target).text(currentVal);
			})
		},
		clearNum:function(){
			var that = this;
			$(".numbk_clear",that.target).on("click",function(){
				$(".numbk_screen",that.target).text('');
			})
		},
		sureNum:function(){
			var that = this;
			$(".numbk_sure",that.target).on("click",function(){
				var currentVal = $(".numbk_screen",that.target).text();
				that.ele.val(currentVal);


})
}}

	var methods = {
		init:function(element,option){
			var mynumbkClass = new mynumbk(element,option);
		},
		setValue:function(){
			$(this).val(arguments[0]);
		},
		getValue:function(){
			return $(this).val();
		}
	}
	$.fn.numbk = function(method){
        var numbkArgument = arguments;
        if(typeof method === 'object' || !method){
        	return this.each(function(){
				methods.init(this,method);
			})
        }else if(methods[method]){
        	return methods[method].apply(this, Array.prototype.slice.call(numbkArgument, 1));
        }else{
        	console.log('The incoming method does not exist');
        }
	}
}(jQuery))