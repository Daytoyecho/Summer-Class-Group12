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



<!-- 幻灯片 -->
<div class="swiper-container">
    <div class="swiper-wrapper">
    	{pboot:slide num=5 gid=1}
        	<div class="swiper-slide">
        		<a href="[slide:link]">
        			<img src="[slide:src]" class="d-block w-100" >
        		</a>
        		<div class="container">
			    	<div class="position-absolute text-light" style="top:30%;">
						<h1 class="fs-20 fs-sm-32 wow slideInUp">[slide:title]</h1>
					 	<h4 class="fs-14 fs-sm-20 wow slideInUp">[slide:subtitle]</h4>
					</div>
			    </div>
        	</div>
        {/pboot:slide} 
    </div>
    <div class="swiper-button-prev d-none d-md-block"></div><!--左箭头-->
    <div class="swiper-button-next d-none d-md-block"></div><!--右箭头-->
    <div class="swiper-pagination"></div>
</div>

<!--产品推荐-->
<div class="bg-white py-5">
    <div class="container">
    
      {pboot:sort scode=5}
      	<div class="text-center fs-26 fs-sm-28 text-success wow fadeInDown">[sort:name]</div>
      	<div class="text-center fs-14 fs-sm-16 mb-4 text-secondary wow fadeInUp" data-wow-delay="1s">- [sort:subname] -</div>
      {/pboot:sort}
      
      <div class="row">
       {pboot:list scode=5 num=4 order=date}
        <div class="col-12 col-sm-6 col-lg-3 wow zoomIn" data-wow-delay="[list:i]00ms" data-wow-duration="1s">
              <div class="card">
                  <div class="card-img-150"><a href="[list:link]"><img class="card-img-top" src="[list:ico]" alt="[list:title]"></a></div>
                  <div class="card-body">
                    <h5 class="card-title"><a href="[list:link]">[list:title lencn=12]</a></h5>
                    <p class="card-text">
	                    {pboot:if([list:istop]==1)}
	                		<span class="badge badge-danger">置顶</span>
	                	{/pboot:if}
	                	{pboot:if([list:isrecommend]==1)}
	                		<span class="badge badge-warning">推荐</span>
	                	{/pboot:if}
	                	{pboot:if([list:isheadline]==1)}
	                		<span class="badge badge-info">头条</span>
	                	{/pboot:if}
	                	[list:content drophtml=1 dropblank=1 len=50]
                	</p>
                  </div>
               </div>
         </div>
        {/pboot:list}
      </div>
	  {pboot:sort scode=5}
			<div class="text-center mt-4 wow fadeInDown" data-wow-delay="1s"><h4><a href="[sort:link]" class="text-secondary fs-14 fs-sm-16">查看更多</a></h4></div>
	  {/pboot:sort}
    </div>
</div>

<!-- 关于我们 -->
<div class="bg-light py-5">
    <div class="container">
      {pboot:sort scode=1}
      	<div class="text-center fs-26 fs-sm-28 text-info wow fadeInDown">[sort:name]</div>
      	<div class="text-center fs-14 fs-sm-16 mb-4 text-secondary wow fadeInUp" data-wow-delay="1s">- [sort:subname] -</div>
      {/pboot:sort}
      
      {pboot:content id=1}
      	<div class="row text-secondary mb-5 px-3 lh-2 wow fadeInDown" data-wow-delay="500ms" style="text-indent:30px;">
            [content:content drophtml=1 dropblank=1 len=442 more='']
      	</div>
     	<div class="text-center wow fadeInDown" data-wow-delay="1s"><h4><a href="[content:link]" class="text-secondary fs-14 fs-sm-16">查看更多</a></h4></div>
      {/pboot:content}
    </div>
</div>

<!-- 新闻动态 -->
<div class="bg-white py-5">
    <div class="container">
      {pboot:sort scode=2}
      	<div class="text-center fs-26 fs-sm-28 text-warning wow fadeInDown">[sort:name]</div>
      	<div class="text-center fs-14 fs-sm-16 mb-5 text-secondary wow fadeInUp" data-wow-delay="1s">- [sort:subname] -</div>
      {/pboot:sort}
      
      <div class="row">
      	{pboot:list scode=2 num=4 order=date}
            <div class="col-12 col-lg-6 mb-3 wow fadeInUp" data-wow-delay="500ms">
                <div class="media mb-3">
                  <div class="media-body">
                     <h5><a href="[list:link]" title="[list:title]">[list:title lencn=20]</a></h5>
                     <p><a href="[list:link]" class="text-secondary lh-2">[list:content drophtml=1 dropblank=1 lencn=60] [list:date style=Y-m-d]</a></p>
                  </div>
                </div>
            </div>
        {/pboot:list}
      </div>
	  {pboot:sort scode=2}
		<div class="text-center wow fadeInDown" data-wow-delay="1s"><h4><a href="[sort:link]" class="text-secondary fs-14 fs-sm-16">查看更多</a></h4></div>
	  {/pboot:sort}
    </div>
</div>


<script src="{pboot:sitetplpath}/swiper-4.3.5/js/swiper.min.js"></script>
<script>        
  var mySwiper = new Swiper ('.swiper-container', {
    direction: 'horizontal',
    loop: true,
    speed: 1500,
    autoplay : {
        delay:3500,
        disableOnInteraction: false
     },
     
    
    // 如果需要分页器
    pagination: {
      el: '.swiper-pagination',
      clickable :true,
    },
    
    // 如果需要前进后退按钮
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
   
  })        
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
  1 => '/Applications/XAMPP/xamppfiles/htdocs/pc/template/default/html/comm/foot.html',
); ?>