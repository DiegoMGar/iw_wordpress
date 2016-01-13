<style>
.fb-profile img.fb-image-lg{
    z-index: 0;
    width: 100%;  
    margin-bottom: 10px;
}

.fb-image-profile
{
    margin: -90px 10px 0px 50px;
    z-index: 9;
    width: 20%; 
}

@media (max-width:768px)
{ 
    .fb-profile-text>h1{
        font-weight: 700;
        font-size:16px;
    }

    .fb-image-profile
    {
        margin: -45px 10px 0px 25px;
        z-index: 9;
        width: 20%; 
    }
}
</style>
<body style="background: #f5f5f5;">
<header class="mainHeader">
    <div class="container">
        <div class="imagenLogo">
            <a href="<?php echo base_url($mylang); ?>"><img class="img-responsive" id="img_logo"
                                                            src="<?php echo base_url("assets/img/wordpress-logo-small.png");?>">
            </a>
        </div>
        <div class="tituloLogo">
            <a href="<?php echo base_url($mylang); ?>">WordPress<span style="color: rgba(255, 255, 255, 0.6); ">.com</span></a>
        </div>
        <div class="login openSansRegular">
            <p style="cursor: pointer;font-size: 1.1em;"
               id="openUserMenu"
                ><?php echo $this->session->name ?>
                <span style="font-size: 0.8em;" class="glyphicon glyphicon-menu-down hidden-xs"></span>
            </p>
        </div>
        <div class="login openSansRegular hidden-xs" style="display: none;border-right: 1px solid #f0f0f0;"
             id="userExit">
            <a href="<?php echo base_url($mylang.'/logout');?>"><?php echo $this->lang->line('header_logout'); ?></button></a>
        </div>
        <div class="login openSansRegular hidden-xs" style="display: none;"
             id="userPerfil">
            <a href="<?php echo base_url($mylang.'/user/'.$this->session->id); ?>"><?php echo $this->lang->line('header_profile'); ?></a>
        </div>
        <div class="login openSansRegular hidden-xs" style="display: none;"
             id="userDash">
            <a href="<?php echo base_url($mylang.'/dashboard'); ?>"><?php echo $this->lang->line('titulo_dashboard'); ?></a>
        </div>
    </div>
    <script>
        $().ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            $("#openUserMenu").click(function(){
                $("#userPerfil").slideToggle();
                $("#userExit").slideToggle();
                $("#userDash").slideToggle();
                var menuDownUp = $(this).find("span");
                if($(menuDownUp).hasClass("glyphicon-menu-down")){
                    $(menuDownUp).removeClass("glyphicon-menu-down");
                    $(menuDownUp).addClass("glyphicon-menu-up");
                }else{
                    $(menuDownUp).removeClass("glyphicon-menu-up");
                    $(menuDownUp).addClass("glyphicon-menu-down");
                }
            });
        });
    </script>
</header>
<div class="container" style="width: 70%; margin: 0 auto; color: black; margin-top: 20px;">
    <div class="fb-profile">
        <img align="left" class="fb-image-lg" src="http://lorempixel.com/850/280/" alt="Profile image example"/>
        <img align="left" class="fb-image-profile thumbnail" src="http://lorempixel.com/180/180/people/" alt="Profile image example"/>
        <div class="fb-profile-text">
            <h1><?php echo $user['nick']; ?></h1>
            <h2><?php echo $user['email'];?></h2>
        </div>
    </div>
</div>