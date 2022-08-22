<!doctype html>
<html lang="zh">
<head>
	<meta charset="utf-8">
	<title>{pboot:pagetitle}</title>
	<meta name="keywords" content="{pboot:pagekeywords}">
	<meta name="description" content="{pboot:pagedescription}">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,shrink-to-fit=no">
	<link rel="stylesheet" href="{pboot:sitetplpath}/bootstrap/css/bootstrap.min.css" >
	<link rel="stylesheet" href="{pboot:sitetplpath}/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{pboot:sitetplpath}/css/aoyun.css?v=v1.3.5" >
	<link rel="stylesheet" href="{pboot:sitetplpath}/swiper-4.3.5/css/swiper.min.css">
	<link rel="stylesheet" href="{pboot:sitetplpath}/css/animate.css">
	<link rel="shortcut icon" href="{pboot:sitepath}/favicon.ico" type="image/x-icon">
	<script src="{pboot:sitetplpath}/js/jquery-1.12.4.min.js" ></script>
</head>
<body>

<!-- 头部导航 -->
<nav class="navbar navbar-light bg-light fixed-top navbar-expand-lg shadow-sm">
  <div class="container">
	  	<a class="navbar-brand my-1" href="{pboot:sitepath}/">
	      <img src="{pboot:sitelogo}" class="logo-sm-height"  height="50">
	    </a>
	    
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    	<span class="navbar-toggler-icon"></span>
	    </button>
	    
	    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
	        <ul class="navbar-nav">
	       	  <li class="nav-item {pboot:if(0=='{sort:scode}')}active{/pboot:if}">
				 <a class="nav-link" href="{pboot:sitepath}/" >首页</a>
	          </li>
	          {pboot:nav num=10 parent=0}
	              <li class="nav-item {pboot:if('[nav:scode]'=='{sort:tcode}')}active{/pboot:if}">
	                <a class="nav-link" href="[nav:link]">[nav:name]</a>
	              </li>
	          {/pboot:nav}
	      </ul>
	    </div>
    </div>
</nav>

<!--占位导航栏-->
<div style="height:71px;" class="head-sm-height"></div>



<!-- 头部大屏 -->
<div class="jumbotron jumbotron-fluid mb-2" style="{pboot:if('{sort:pic}')}background:#e9ecef url({sort:pic}){else}background:#e9ecef url({pboot:sitepath}/static/upload/image/20180412/1523501459462835.jpg){/pboot:if};background-size:cover;no-repeat">
  <div class="container text-light">
    <h1 class="fs-18 fs-sm-26 wow fadeInDown">{sort:name}</h1>
    <p class="fs-14  fs-sm-18 wow fadeInDown">{sort:subname}</p>
  </div>
</div>

<div class="container pages">
	<!-- 当前位置 -->
<div class="text-right position mb-3 d-none d-md-block">当前位置：{pboot:position separator='>'}</div>
    
    <div class="row">
       	<div class="col-12 col-lg-6 mb-5">
               <div class="view">
               	<a class="arrow-left" href="#"></a>
				<a class="arrow-right" href="#"></a>
                   <div class="swiper-container">
                       <div class="swiper-wrapper" >
                       	   <div class="swiper-slide">
                               <img src="{content:ico}">
                           </div>
                           {pboot:pics num=10 id={content:id}}
                           <div class="swiper-slide">
                               <img src="[pics:src]">
                           </div>
                           {/pboot:pics}
                       </div>
                   </div>
               </div>
               
               <div class="preview mt-3">
                   <a class="arrow-left" href="#"></a>
                   <a class="arrow-right" href="#"></a>
                   <div class="swiper-container" >
                       <div class="swiper-wrapper">
                       	<div class="swiper-slide active-nav swiper-slide-active">
                               <img src="{content:ico}">
                           </div>
                           {pboot:pics num=10 id={content:id}}
                           <div class="swiper-slide">
                               <img src="[pics:src]">
                           </div>
                           {/pboot:pics}
                       </div>
                   </div>
               </div>
           </div>
            
        	<div class="col-12 col-lg-6 mb-3 pr-3">
            	<h2 class="border-bottom pb-2 fs-sm-28 fs-20">{content:title}</h2>
                <div class="text-secondary my-3 border-bottom-dashed lh-3">
                      	上架时间：{content:date style=Y-m-d}
                </div>
                <div class="text-secondary my-3 border-bottom-dashed lh-3">
                      	浏览次数：{content:visits}
                </div>
                
                <div class="text-secondary my-3 border-bottom-dashed lh-3">
                      	产品类型：{content:ext_type}
                </div>
                
                <div class="text-secondary my-3 border-bottom-dashed lh-3">
                     	 产品颜色：{content:ext_color}
                </div>
                 <div class="text-secondary my-3 border-bottom-dashed lh-3">
                     	 产品价格：￥{content:ext_price}
                </div>
                <div class="my-3 lh-3">
                	{pboot:sort scode=11}
                     <a href="[sort:link]" class="btn btn-danger">马上咨询</a>
                    {/pboot:sort}
                </div>
            </div>
      </div>
      
      <h5 class="border-bottom border-info pb-2 mb-2"><i class="fa fa-sliders" aria-hidden="true"></i> 产品详情</h5>
      <div class="content">{content:content}</div>
      
      <div class="text-secondary lh-2">
			<p>上一篇：{content:precontent}</p>
			<p>下一篇：{content:nextcontent}</p>
      </div>
</div>
    

<script src="{pboot:sitetplpath}/swiper-4.3.5/js/swiper.min.js"></script>
<script>
var viewSwiper = new Swiper('.view .swiper-container', {
	on:{
		slideChangeTransitionStart: function() {
		    updateNavPosition()
	    }
	}
})

$('.view .arrow-left,.preview .arrow-left').on('click', function(e) {
	e.preventDefault()
	if (viewSwiper.activeIndex == 0) {
		viewSwiper.slideTo(viewSwiper.slides.length - 1, 1000);
		return
	}
	viewSwiper.slidePrev()
})
$('.view .arrow-right,.preview .arrow-right').on('click', function(e) {
	e.preventDefault()
	if (viewSwiper.activeIndex == viewSwiper.slides.length - 1) {
		viewSwiper.slideTo(0, 1000);
		return
	}
	viewSwiper.slideNext()
})

var previewSwiper = new Swiper('.preview .swiper-container', {
	//visibilityFullFit: true,
	slidesPerView: 'auto',
	allowTouchMove: false,
	on:{
		tap: function() {
		    viewSwiper.slideTo(previewSwiper.clickedIndex)
	  }
	}
})

function updateNavPosition() {
		$('.preview .active-nav').removeClass('active-nav')
		var activeNav = $('.preview .swiper-slide').eq(viewSwiper.activeIndex).addClass('active-nav')
		if (!activeNav.hasClass('swiper-slide-visible')) {
			if (activeNav.index() > previewSwiper.activeIndex) {
				var thumbsPerNav = Math.floor(previewSwiper.width / activeNav.width()) - 1
				previewSwiper.slideTo(activeNav.index() - thumbsPerNav)
			} else {
				previewSwiper.slideTo(activeNav.index())
			}
		}
	}
</script>


<div class="footer mt-3 pt-5 border-top text-secondary bg-light">
	<div class="container">
    	<div class="row pb-5">
            <div class="col-12 col-md-5">
            	<h5>{pboot:companyname}</h5>
                <ul class="lh-2">
                	<li>营业执照：{pboot:companyblicense}  </li>
                    <li>备案号码：<a href="http://beian.miit.gov.cn/" target="_blank">{pboot:siteicp}</a> </li>
                    <li>地址：{pboot:companyaddress} </li>
                </ul>
            </div>
            <div class="col-12 col-md-5">
            	<div class="mt-4 d-block d-md-none"></div>
                
            	<h5>联系我们</h5>
                <ul class="lh-2">
                    <li>电话：{pboot:companyphone} </li>
                    <li>邮箱：{pboot:companyemail} </li>
                    <li>Q&nbsp;&nbsp;Q：{pboot:companyqq} </li>
                </ul>
            </div>
            <div class="col-12 col-md-2 text-center d-none d-md-block">
            	<p class="code">{pboot:qrcode string={pboot:httpurl}<?php echo URL;?>} </p>
                <p class="small">扫一扫 手机访问</p>
            </div>
        </div>
	</div>
    <div class="copyright border-top lh-3 text-center  d-none d-md-block">
    	{pboot:sitecopyright}
    </div>
</div>

<!-- 占位 -->
<div style="height:49px;" class="d-block d-sm-none"></div>

<!-- 手机底部导航 -->
<div class="container-fluid bg-info fixed-bottom d-block d-sm-none">
    <div class="row">
        <div class="col-4 p-0 text-center border-right">
            <a href="tel:{pboot:companymobile}" class="text-light d-block pt-3 pb-3"><i class="fa fa-phone" aria-hidden="true"></i> 电话咨询</a>
        </div>
        <div class="col-4 p-0 text-center border-right">
            <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin={pboot:companyqq}&site=qq&menu=yes" class="text-light d-block pt-3 pb-3"><i class="fa fa-qq" aria-hidden="true"></i> 在线咨询</a>
        </div>
        <div class="col-4 p-0 text-center">
			{pboot:sort scode=1}
            <a href="[sort:link]" class="text-light d-block pt-3 pb-3"><i class="fa fa-location-arrow" aria-hidden="true"></i> [sort:name]</a>
			{/pboot:sort}
        </div>
    </div>
</div>

<!-- 在线客服 -->
<div class="online d-none d-md-block">
	<dl>
		<dt style="width:150px;">
        	<h3><i class="fa fa-commenting-o"></i>在线咨询<span class="remove"><i class="fa fa-remove"></i></span></h3>
            <p>
            	<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin={pboot:companyqq}&site=qq&menu=yes">
                	<img border="0" src="{pboot:sitetplpath}/images/qq.jpg" alt="点击这里给我发消息" title="点击这里给我发消息"/>
               		 售前咨询专员
                </a>
            </p>
             <p>
                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin={pboot:companyqq}&site=qq&menu=yes">
                	<img border="0" src="{pboot:sitetplpath}/images/qq.jpg" alt="点击这里给我发消息" title="点击这里给我发消息"/>
               		 售后服务专员
                </a>
            </p>
        </dt>
		<dd><i class="fa fa-commenting-o"></i></dd>
		<dd>在线咨询</dd>
	</dl>
    
	<dl>
		<dt style="width:300px;">
        	<h3><i class="fa fa-volume-control-phone"></i>免费通话<span class="remove"><i class="fa fa-remove"></i></span></h3>
            <p>24小时免费咨询</p>
            <p>请输入您的联系电话，座机请加区号</p>
            <form  onsubmit="return subform(this);">
            	<p><input type="text" name="tel" id="tel" autocomplete="off"  placeholder="请输入您的电话号码" required maxlength="30"></p>
                <p><button type="submit">免费通话</button></p>
            </form>
        </dt>
		<dd><i class="fa fa-volume-control-phone" aria-hidden="true"></i></dd>
		<dd>免费通话</dd>
	</dl>
    
    <dl>
		<dt style="width:200px;">
        	<h3><i class="fa fa-weixin" aria-hidden="true"></i>微信扫一扫<span class="remove"><i class="fa fa-remove"></i></span></h3>
           	<p><img src="{pboot:companyweixin} " width="100%"></p>
        </dt>
		<dd><i class="fa fa-weixin" aria-hidden="true"></i></dd>
		<dd>微信联系</dd>
	</dl>
    
	<dl class="scroll-top">
		<dd><i class="fa fa-chevron-up"></i></dd>
		<dd>返回顶部</dd>
	</dl>
</div>

<script src="{pboot:sitetplpath}/js/popper.min.js"></script>
<script src="{pboot:sitetplpath}/bootstrap/js/bootstrap.min.js"></script>
<script src="{pboot:sitetplpath}/js/wow.min.js"></script>
<script src="{pboot:sitetplpath}/js/aoyun.js?v=v1.2.2"></script>
<script>
//ajax提交表单
function subform(obj){
  var url='{pboot:form fcode=2}';
  var tel=$(obj).find("#tel").val();
  
  var reg = /^(1|0)[\d\-]+$/;   
  if (!reg.test(tel)) {
	  alert('电话号码错误！');
	  return false;
  }
  
  $.ajax({
    type: 'POST',
    url: url,
    dataType: 'json',
    data: {
    	tel: tel
    },
    success: function (response, status) {
      if(response.code){
		 alert("您的来电已收到，我们会尽快联系您！");
		 $(obj)[0].reset(); 
      }else{
    	 alert(response.data);
      }
    },
    error:function(xhr,status,error){
      alert('返回数据异常！');
    }
  });
  return false;
}
</script>

{pboot:sitestatistical}

</body>
</html>
<?php return array (
  0 => '/Applications/XAMPP/xamppfiles/htdocs/pc/template/default/html/comm/head.html',
  1 => '/Applications/XAMPP/xamppfiles/htdocs/pc/template/default/html/comm/top.html',
  2 => '/Applications/XAMPP/xamppfiles/htdocs/pc/template/default/html/comm/position.html',
  3 => '/Applications/XAMPP/xamppfiles/htdocs/pc/template/default/html/comm/foot.html',
); ?>