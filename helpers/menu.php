<?php

function configurar_menu($carpeta = '', $pagina = '')
{
    $menu = array();
    $menu_item = array(); 
    $sub_menu_item = array();
    
    //opcion de menu de inicio
    $menu_item['is_active']=($pagina == "index") ? TRUE : FALSE;
    $menu_item['href']=($carpeta != '') ? '../../index.php' : './index.php';
    $menu_item['text']='Inicio';
    $menu_item['icon']= 'mdi-home';
    $menu_item['submenu']=array();
    $menu['Inicio']=$menu_item;


    //opcion de menu de contact
    $menu_item['is_active']=($pagina == "contacto") ? TRUE : FALSE;
    $menu_item['text']='Contacto';
    $menu_item['href']=($carpeta != '') ? './contact.php' : './portal/pages/contact.php';
    $menu_item['icon']= 'mdi-contact';
    $menu_item['submenu']=array();
    $menu['Contacto']=$menu_item;
    
    //opcion de menu de Material Extra   
    $sub_menu_item = array();
    $sub_menu_item['is_active'] = FALSE;
    $sub_menu_item['href'] = ($carpeta != '') ? './accion.php' : './portal/pages/accion.php';
    $sub_menu_item['text'] = 'Parcial1';
    $menu_item['submenu']['Parcial1'] = $sub_menu_item;
    //
    $sub_menu_item = array();
    $sub_menu_item['is_active'] = FALSE;
    $sub_menu_item['href'] = ($carpeta != '') ? './accion.php' : './portal/pages/accion.php';
    $sub_menu_item['text'] = 'Parcial2';
    $menu_item['submenu']['Parcial2'] = $sub_menu_item;
    //
    $sub_menu_item = array();
    $sub_menu_item['is_active'] = FALSE;
    $sub_menu_item['href'] = ($carpeta != '') ? './aventura.php' : './portal/pages/aventura.php';
    $sub_menu_item['text'] = 'Parcial3';
    $menu_item['submenu']['Parcial3'] = $sub_menu_item;
    $menu['Material']= $menu_item;
    
    $menu_item['is_active']=($pagina == "opciones") ? TRUE : FALSE;
    $menu_item['text']='Categoria';
    $menu_item['href']='#';
    $menu_item['submenu']=array();
    //submenu
    $sub_menu_item = array();
    $sub_menu_item['is_active'] = FALSE;
    $sub_menu_item['href'] = ($carpeta != '') ? './accion.php' : './portal/pages/accion.php';
    $sub_menu_item['text'] = 'Acción';
    $menu_item['submenu']['accion'] = $sub_menu_item;
    //
    $sub_menu_item = array();
    $sub_menu_item['is_active'] = FALSE;
    $sub_menu_item['href'] = ($carpeta != '') ? './aventura.php' : './portal/pages/aventura.php';
    $sub_menu_item['text'] = 'aventura';
    $menu_item['submenu']['Aventura'] = $sub_menu_item;
    $menu['Categoria']= $menu_item;

    return $menu;

}

function crear_menu($carpeta = '', $pagina = ''){
    $menu = configurar_menu($carpeta, $pagina);

    $html = '';
    $html .= '<ul class="nav navbar-nav pull-right mainNav">';
    foreach($menu as $menu_item){
        //print_r($menu_item);
        if($menu_item["href"] != '#')
        {
          $html.= '<li class="'.($menu_item["is_active"] ? 'active' : '').'"><a href="'.$menu_item["href"].'"><span class="menu-title">'.$menu_item["text"].'</span></a></li>';
        }
        else{
            $html .= '
            <li class="dropdown">
                <a class="dropdown-toggle" href="'.$menu_item["text"].'" data-toggle="dropdown">Categorias<b class="caret"></b></a>
                <ul class="dropdown-menu">';
            if(sizeof($menu_item['submenu']) > 0){
              foreach($menu_item["submenu"] as $item_sub_menu){
                  $html .= '<li><a href="'.$item_sub_menu["href"].'">'.$item_sub_menu["text"].'</a></li>';
              }
            }
            $html .= '</ul></li>';
        }

    }
    $html .= '</ul>';
    return $html;



					


}




