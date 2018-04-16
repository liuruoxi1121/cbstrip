<!-- 页头导航 -->
<div class="container">
  <div class="row clearfix">
    <div class="col-md-12 column padding3 hidden1">
      <img src="image/logo.jpg" class="img-responsive">
    </div>
    <div class="col-md-12 column padding4">
      <nav class="navbar navbar-default margin1" role="navigation">
        <div class="navbar-header">
           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">搜狗旅游</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="#"><img src="image/logo2.jpg" class="img-responsive"></a>
        </div>
        <div class="collapse navbar-collapse padding1" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li>
               <a href="index.php" class="ce">
                    <span class="cf home">
                        <i class="icon_pub icon"></i>
                        <strong>首页</strong>
                    </span>
                </a>
            </li>
            <li>
               <a href="sight.php?type=local" class="ce ">
                    <span class="cf ticket">
                        <i class="icon_pub icon"></i>
                        <strong>本地游</strong>
                    </span>
                </a>
            </li>
            <li>
                <a href="sight.php?type=around" class="ce">
                    <span class="cf zuche">
                        <i class="icon_pub icon"></i>
                        <strong>周边游</strong>
                    </span>
                </a>
            </li>
            <li>
                <a href="groupt.php" class="ce">
                    <span class="cf ticket">
                        <i class="icon_pub icon"></i>
                        <strong>跟团</strong>
                    </span>
                </a>
            </li>
            <li>
               <a href="hotel.php" class="ce  cur">  
                    <span class="cf hotel">
                        <i class="icon_pub icon"></i>
                        <strong>酒店</strong>
                    </span>
                </a>
            </li>
            <li>
               <a href="strategy.php" class="ce "> 
                    <span class="cf guide">
                        <i class="icon_pub icon"></i>
                        <strong>攻略</strong>
                    </span>
                </a>
            </li>
            <li>
               <a href="news.php" class="ce ">
                    <span class="cf special">
                        <i class="icon_pub icon"></i>
                        <strong>公告</strong>
                    </span>
                </a>
            </li>
          </ul>

        <ul class="nav navbar-nav navbar-right">
        <?php
            if(!isset($_SESSION['username'])){
                echo'<li>
                <a href="login.php" class="ce ">
                    <span class="cf">
                        <strong>登录</strong>
                    </span>
                </a>
              </li>
              <li>
                 <a href="register.php" class="ce ">
                    <span class="cf">
                        <strong>注册</strong>
                    </span>
                </a>
              </li>';
            }else{
                $username= $_SESSION['username'];
                echo'<li><p class="navbar-text">欢迎'.$username.'</p></li>
              <li>
                <a href="orders.php" class="ce ">
                    <span class="cf">
                        <strong>预订记录</strong>
                    </span>
                </a>
              </li>
              <li>
                 <a href="logout.php" class="ce ">
                    <span class="cf">
                        <strong>退出</strong>
                    </span>
                </a>
              </li>
            </ul>';
            }
        ?>
      </ul>
        </div>
      </nav>
    </div>
  </div>
</div>
<hr class="hr1">