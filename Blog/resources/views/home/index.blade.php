<!--
    
 @Name：不落阁整站模板源码
 @Author：Absolutely
 @Site：http://www.lyblogs.cn

 -->

 <!DOCTYPE html>

 <html xmlns="http://www.w3.org/1999/xhtml">
 <head>
     <meta http-equiv="Content-Type" content="text/html; Charset=gb2312">
     <meta http-equiv="Content-Language" content="zh-CN">
     <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
     <title>Blog-个人博客网站</title>
     <link rel="shortcut icon" href="/home/images/Logo_40.png" type="image/x-icon">
     <!--Layui-->
     <link href="/home/plug/layui/css/layui.css" rel="stylesheet" />
     <!--font-awesome-->
     <link href="/home/plug/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
     <!--全局样式表-->
     <link href="/home/css/global.css" rel="stylesheet" />
     <!-- 本页样式表 -->
     <link href="/home/css/home.css" rel="stylesheet" />
     <script src="/js/jQuery.js"></script>
     <script src="/js/jquery.cookie.js"></script>
  
 </head>
 <body>
     <!-- 导航 -->
     <nav class="blog-nav layui-header">
         <div class="blog-container">
             <!-- QQ互联登陆 -->
             <a href="{{url('/home/logup')}}" class="blog-user">
                 <i class="fa fa-qq"></i>
             </a>
            <button> <a href="{{url('/home/logout')}}">logout</a></button> 
             <a href="javascript:;" class="blog-user layui-hide">
                 <img src="/home/images/Absolutely.jpg" alt="Absolutely" title="Absolutely" />
             </a>
             <!-- 不落阁 -->
             <a class="blog-logo" href="{{url('home/index')}}">Blog</a>
             <!-- 导航菜单 -->
             <ul class="layui-nav" lay-filter="nav">
                 <li class="layui-nav-item layui-this">
                     <a href="{{url('/home/index')}}"><i class="fa fa-home fa-fw"></i>&nbsp;网站首页</a>
                 </li>
                 <li class="layui-nav-item">
                     <a href="{{url('/home/article')}}"><i class="fa fa-file-text fa-fw"></i>&nbsp;文章专栏</a>
                 </li>
                 <li class="layui-nav-item">
                     <a href="{{url('/home/resource')}}"><i class="fa fa-tags fa-fw"></i>&nbsp;资源分享</a>
                 </li>
                 <li class="layui-nav-item">
                     <a href="{{url('/home/timeline')}}"><i class="fa fa-hourglass-half fa-fw"></i>&nbsp;点点滴滴</a>
                 </li>
                 <li class="layui-nav-item">
                     <a href="{{url('/home/about')}}"><i class="fa fa-info fa-fw"></i>&nbsp;关于本站</a>
                 </li>
             </ul>
             <!-- 手机和平板的导航开关 -->
             <a class="blog-navicon" href="javascript:;">
                 <i class="fa fa-navicon"></i>
             </a>
         </div>
     </nav>
     <!-- 主体（一般只改变这里的内容） -->
     <div class="blog-body">
         <!-- canvas -->
         <canvas id="canvas-banner" style="background: #393D49;"></canvas>
         <!--为了及时效果需要立即设置canvas宽高，否则就在home.js中设置-->
         <script type="text/javascript">
             var canvas = document.getElementById('canvas-banner');
             canvas.width = window.document.body.clientWidth - 10;//减去滚动条的宽度
             if (screen.width >= 992) {
                 canvas.height = window.innerHeight * 1 / 3;
             } else {
                 canvas.height = window.innerHeight * 2 / 7;
             }
         </script>
         <!-- 这个一般才是真正的主体内容 -->
         <div class="blog-container">
             <div class="blog-main">
                 <!-- 网站公告提示 -->
                 <div class="home-tips shadow">
                     <i style="float:left;line-height:17px;" class="fa fa-volume-up"></i>
                     <div class="home-tips-container">
                         <span style="color: #009688">偷偷告诉大家，本博客的后台管理也正在制作，为大家准备了游客专用账号！</span>
                         <span style="color: red">网站新增留言回复啦！使用QQ登陆即可回复，人人都可以回复！</span>
                         <span style="color: red">如果你觉得网站做得还不错，来Fly社区点个赞吧！<a href="http://fly.layui.com/case/2017/" target="_blank" style="color:#01AAED">点我前往</a></span>
                         <span style="color: #009688">不落阁 &nbsp;—— &nbsp;一个.NET程序员的个人博客，新版网站采用Layui为前端框架，目前正在建设中！</span>
                     </div>
                 </div>
                 <!--左边文章列表-->
                 <div class="blog-main-left">
                    @foreach($data as $val)
                    <div class="article shadow">
                        <div class="article-left">
                            <img src="/home/images/cover/201703181909057125.jpg" alt="基于laypage的layui扩展模块（pagesize.js）！" />
                        </div>
                        <div class="article-right">
                            <div class="article-title" style="font-weight:bold">
                                <a class="art{{$val->id}}" onclick="est(this)" href="#">{{$val->title}}</a>
                            </div>
                            <div class="article-abstract" style="height: 88px;overflow: hidden;text-overflow: ellipsis;">
                                {{$val->content}}
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="article-footer">
                            <span><i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{$val->created_at}}</span>
                            <span class="article-author"><i class="fa fa-user"></i>&nbsp;&nbsp;{{$val->author}}</span>
                            <span><i class="fa fa-tag"></i>&nbsp;&nbsp;<a href="#">{{$val->category}}</a></span>
                            <span class="article-viewinfo"><i class="fa fa-eye"></i>&nbsp;<span class="lll">0</span></span>
                            <span class="article-viewinfo"><i class="fa fa-commenting"></i>&nbsp;4</span>
                          
                        </div>
                    </div>
                    @endforeach  <script>
                       
                                //      var num=parseInt($.cookie('num'))+1;
                                //     // console.log(num);
                                // $.cookie('num', num, { expires: 1, path: '/home' });
                                //     $('.lll').html($.cookie('num'));
                            
                                //      console.log($.cookie('num'));
                                // });
                       
                            </script>
                 </div>
                 <!--右边小栏目-->
                 <div class="blog-main-right">
                     <div class="blogerinfo shadow">
                         <div class="blogerinfo-figure">
                             <img style="width: 50%;height:50%;border-radius:100%"  src="{{Session::get('avatar')}}" alt="Absolutely" />
                              
                         </div>
                         <p class="blogerinfo-nickname">Elephant</p>
                         <p class="blogerinfo-introduce">一枚在校计算机专业学生</p>
                         <p class="blogerinfo-location"><i class="fa fa-location-arrow"></i>&nbsp;四川 - 成都</p>
                         <hr />
                         <div class="blogerinfo-contact">
                             <a target="_blank" title="QQ交流" href="javascript:layer.msg('启动QQ会话窗口')"><i class="fa fa-qq fa-2x"></i></a>
                             <a target="_blank" title="给我写信" href="javascript:layer.msg('启动邮我窗口')"><i class="fa fa-envelope fa-2x"></i></a>
                             <a target="_blank" title="新浪微博" href="javascript:layer.msg('转到你的微博主页')"><i class="fa fa-weibo fa-2x"></i></a>
                             <a target="_blank" title="码云" href="javascript:layer.msg('转到你的github主页')"><i class="fa fa-git fa-2x"></i></a>
                         </div>
                     </div>
                     
                             <script>
                              var aa=$('.blogerinfo-figure>img').attr('src');
                              if(aa){
                                  console.log(aa)
                                  }else{
                                      $('.blogerinfo').empty();
                                      $('.blogerinfo').append("<p style='font-size:30px;'>请先<a style='color:red;' href='{{url("/home/logup")}}'>登录/注册</a><br>目前只能访问主页</p>");
                                       };
                                      </script>
                     <div></div><!--占位-->
                     <div class="blog-module shadow">
                         <div class="blog-module-title">热文排行</div>
                         <ul class="fa-ul blog-module-ul">
                             <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">Web安全之跨站请求伪造CSRF</a></li>
                             <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">ASP.NET MVC 防范跨站请求伪造（CSRF）</a></li>
                             <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">常用正则表达式</a></li>
                             <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">EF CodeFirst数据迁移常用指令</a></li>
                             <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">浅谈.NET Framework基元类型</a></li>
                             <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">C#基础知识回顾-扩展方法</a></li>
                             <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">一步步制作时光轴（一）（HTML篇）</a></li>
                             <li><i class="fa-li fa fa-hand-o-right"></i><a href="detail.html">一步步制作时光轴（二）（CSS篇）</a></li>
                         </ul>
                     </div>
                     <div class="blog-module shadow">
                         <div class="blog-module-title">最近分享</div>
                         <ul class="fa-ul blog-module-ul">
                             <li><i class="fa-li fa fa-hand-o-right"></i><a href="http://pan.baidu.com/s/1c1BJ6Qc" target="_blank">Canvas</a></li>
                             <li><i class="fa-li fa fa-hand-o-right"></i><a href="http://pan.baidu.com/s/1kVK8UhT" target="_blank">pagesize.js</a></li>
                             <li><i class="fa-li fa fa-hand-o-right"></i><a href="https://pan.baidu.com/s/1mit2aiW" target="_blank">时光轴</a></li>
                             <li><i class="fa-li fa fa-hand-o-right"></i><a href="https://pan.baidu.com/s/1nuAKF81" target="_blank">图片轮播</a></li>
                         </ul>
                     </div>
                     <div class="blog-module shadow">
                         <div class="blog-module-title">一路走来</div>
                         <dl class="footprint">
                             <dt>2017年03月12日</dt>
                             <dd>新增留言回复功能！人人都可参与回复！</dd>
                             <dt>2017年03月10日</dt>
                             <dd>不落阁2.0基本功能完成，正式上线！</dd>
                             <dt>2017年03月09日</dt>
                             <dd>新增文章搜索功能！</dd>
                             <dt>2017年02月25日</dt>
                             <dd>QQ互联接入网站，可QQ登陆发表评论与留言！</dd>
                         </dl>
                     </div>
                     <div class="blog-module shadow">
                         <div class="blog-module-title">后台记录</div>
                         <dl class="footprint">
                             <dt>2017年03月16日</dt>
                             <dd>分页新增页容量控制</dd>
                             <dt>2017年03月12日</dt>
                             <dd>新增管家提醒功能</dd>
                             <dt>2017年03月10日</dt>
                             <dd>新增Win10快捷菜单</dd>
                         </dl>
                     </div>
                     <div class="blog-module shadow">
                         <div class="blog-module-title">友情链接</div>
                         <ul class="blogroll">
                             <li><a target="_blank" href="http://www.layui.com/" title="Layui">Layui</a></li>
                             <li><a target="_blank" href="http://www.pagemark.cn/" title="页签">页签</a></li>
                         </ul>
                     </div>
                 </div>
                 <div class="clear"></div>
             </div>
         </div>
     </div>
     <!-- 底部 -->
     <footer class="blog-footer">
         <p><span>Copyright</span><span>&copy;</span><span>2017</span><a href="http://www.lyblogs.cn">不落阁</a><span>Design By LY</span></p>
         <p><a href="http://www.miibeian.gov.cn/" target="_blank">蜀ICP备16029915号-1</a></p>
     </footer>
     <!--侧边导航-->
     <ul class="layui-nav layui-nav-tree layui-nav-side blog-nav-left layui-hide" lay-filter="nav">
        <li class="layui-nav-item ">
            <a href="{{url('/home/index')}}"><i class="fa fa-home fa-fw"></i>&nbsp;网站首页</a>
        </li>
        <li class="layui-nav-item layui-this">
            <a href="{{url('/home/article')}}"><i class="fa fa-file-text fa-fw"></i>&nbsp;文章专栏</a>
        </li>
        <li class="layui-nav-item">
            <a href="{{url('/home/resource')}}"><i class="fa fa-tags fa-fw"></i>&nbsp;资源分享</a>
        </li>
        <li class="layui-nav-item">
            <a href="{{url('/home/timeline')}}"><i class="fa fa-hourglass-half fa-fw"></i>&nbsp;点点滴滴</a>
        </li>
        <li class="layui-nav-item">
            <a href="{{url('/home/about')}}"><i class="fa fa-info fa-fw"></i>&nbsp;关于本站</a>
        </li>
     </ul>
     <!--分享窗体-->
     <div class="blog-share layui-hide">
         <div class="blog-share-body">
             <div style="width: 200px;height:100%;">
                 <div class="bdsharebuttonbox">
                     <a class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                     <a class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                     <a class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                     <a class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
                 </div>
             </div>
         </div>
     </div>
     <!--遮罩-->
     <div class="blog-mask animated layui-hide"></div>
     <!-- layui.js -->
     <script src="/home/plug/layui/layui.js"></script>
     <!-- 全局脚本 -->
     <script src="/home/js/global.js"></script>
     <!-- 本页脚本 -->
     <script src="/home/js/home.js"></script>
 </body>
 </html>