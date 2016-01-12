<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 3/12/15
 * Time: 8:25
 */
?>
<footer class="mainFooter">
<div class="container">
    <ul class="nav nav-pills pillsFooter">
        <li><a href="#"><?php echo $this->lang->line('aplicaciones'); ?></a></li>
        <li><a href="#"><?php echo $this->lang->line('temas'); ?></a></li>
        <li><a href="#"><?php echo $this->lang->line('soporte'); ?></a></li>
        <li><a href="#"><?php echo $this->lang->line('blog'); ?></a></li>
        <li><a href="#"><?php echo $this->lang->line('vip'); ?></a></li>
        <li><a href="#"><?php echo $this->lang->line('descubre'); ?></a></li>
        <li><a href="#"><?php echo $this->lang->line('sobrenosotros'); ?></a></li>
        <li><a href="#"><?php echo $this->lang->line('condiciones'); ?></a></li>
        <li><a href="#"><?php echo $this->lang->line('privacidad'); ?></a></li>
        <li><a href="#"><?php echo $this->lang->line('lenguaje'); ?>:<span class="badge" style="font-size: 0.7em">
        <?php
        echo strtoupper($mylang);
        ?>
        </span></a></li>
    </ul>
    <div class="powered">
        <small>powered by:</small> Diego Maroto & David Metcalf
    </div>
    <div class="powered">
        <small>made for:</small> Ingeniería web 2015/2016 - Universidad de Alicante
    </div>
</div>
</footer>