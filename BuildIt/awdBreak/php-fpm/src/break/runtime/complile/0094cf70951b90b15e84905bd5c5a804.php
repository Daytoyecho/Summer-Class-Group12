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

	 <!-- 列表内容 -->
	 <div class="row">
     {pboot:list num=10 order=date}
     	<div class="mb-3 col-12 col-sm-6 col-lg-3">
	      	<div class="card bg-light">
			  <div class="card-header">招聘职位：[list:title]</div>
			  <div class="card-body">
			    <p class="card-text">[list:content drophtml=1 dropblank=1 lencn=50]</p>
			    <a class="btn btn-info mt-2" href="[list:link]">查看详情</a>
			  </div>
			   <div class="card-footer">发布日期：[list:date style=Y-m-d]</div>
			</div>
		</div>
     {/pboot:list}
     </div>

 	 <!-- 分页 -->
{pboot:if({page:rows}>0)}
   <nav aria-label="page navigation" class="my-4">
     <div class="pagination justify-content-center">
     	<a class="page-item page-link" href="{page:index}">首页</a>
     	<a class="page-item page-link" href="{page:pre}">上一页</a>
      	{page:numbar}<!-- 数字条，小屏幕时自动隐藏-->
      	<a class="page-item page-link" href="{page:next}">下一页</a>
      	<a class="page-item page-link" href="{page:last}">尾页</a>
     </div>
   </nav>	
{else}
   	<div class="text-center my-5 text-secondary">本分类下无任何数据！</div>
{/pboot:if}
</div>


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
  3 => '/Applications/XAMPP/xamppfiles/htdocs/pc/template/default/html/comm/page.html',
  4 => '/Applications/XAMPP/xamppfiles/htdocs/pc/template/default/html/comm/foot.html',
); ?>