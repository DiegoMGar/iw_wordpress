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

<div class="container" style="width: 70%; margin: 0 auto; color: black;">
    <div class="fb-profile">
        <img align="left" class="fb-image-lg" src="http://lorempixel.com/850/280/" alt="Profile image example"/>
        <img align="left" class="fb-image-profile thumbnail" src="http://lorempixel.com/180/180/people/" alt="Profile image example"/>
        <div class="fb-profile-text">
            <h1><?php echo $user['nick']; ?></h1>
            <h2><?php echo $user['name'] . ' ' .$user['surname'];?></h2>
            <h3><?php echo $user['email'];?></h3>
        </div>
    </div>
</div>