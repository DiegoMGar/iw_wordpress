<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 13/01/16
 * Time: 19:18
 */
$i=0;
foreach ($query->result() as $row) {
    $i++;
    $urlBlog = base_url($mylang.'/' . $row->url);
    $deleteUrl = base_url($mylang.'/' . $row->url.'/delete');
    $editUrl = base_url($mylang.'/' . $row->url.'/edit');
    $editTitle = $this->lang->line('blogs_edit');
    $deleteTitle = $this->lang->line('blogs_delete');
    echo "<div class='col-xs-12 col-sm-6 col-md-4 col-lg-3 tarjeta'>
                <div class='contenido' id='contenidoTarjeta'>
                    <h4><a href='{$urlBlog}'>{$row->url}</a></h4>
                    <h2>{$row->title}</h2>
                </div>
                <div class='contenido' style='background-color: red;top: -100px;left: 0;'>

                </div>
                </div>";
}
if($i<1){
    echo "<div class='alert alert-warning' style='display: none;'>
    <strong>{$this->lang->line('strongWAJAX')}</strong>
    {$this->lang->line('msgWAJAX')}
    </div>";
}