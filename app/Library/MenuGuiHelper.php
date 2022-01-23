<?php

namespace App\Library;

use Illuminate\Support\Facades\Session;
		
class MenuGuiHelper {
				
   public static function render($modulos){
		
		$ret = '';

		foreach($modulos as $mod){

			$modsPermitidos = collect(Session::get('modulosPermitidos'));

			if($modsPermitidos->contains($mod->id)){
			
				if(count($mod->hijos) > 0){

                    $ret.= '<li class="slide">
                                <a class="side-menu__item"  data-toggle="slide" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24" 
                                        class="side-menu__icon">
                                        <path d="M0 0h24v24H0V0z" fill="none"/>
                                        <path d="M3 4h18v10H3z" opacity=".3"/>
                                        <path d="M21 2H3c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h7l-2 3v1h8v-1l-2-3h7c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 12H3V4h18v10z"/>
                                    </svg>
                                    <span class="side-menu__label">'.$mod->mo_descripcion.'</span>
                                    <i class="angle fa fa-angle-right"></i>
                                </a>
                                <ul class="slide-menu">';
                                $ret.= self::render($mod->hijos);
                    $ret .=    '</ul>
                            </li>';
				    /*
				    $ret .= '<div class="menu-item has-sub closed" '.$mod->mo_atributos.'>';
				    $ret .= '   <a href="javascript:;" class="menu-link">';
				    $ret .= '       <div class="menu-icon">';
				    $ret .= '           <i class="'.$mod->mo_icono.'"></i>';
				    $ret .= '       </div>';
				    $ret .= '       <div class="menu-text">';
				    $ret .=             $mod->mo_descripcion;
				    if($mod->mo_nuevo){
				        $ret.= '        <span class="menu-label">nuevo</span>';
				    }
				    $ret .=         '</div>';
				    $ret .= '       <div class="menu-caret"></div>';
				    $ret .= '   </a>';
				    $ret .= '   <div class="menu-submenu">';
				    $ret.=          self::render($mod->hijos);
				    $ret .= '   </div>';
				    $ret .= '</div>';
				  	*/
				}else{

				    $params = $mod->mo_params_ruta;
				    $route = 'javacript:;';
				    
				    if($mod->mo_ruta){
				        if($params){
				            $route = route($mod->mo_ruta,$params);
				        }else{
				            $route = route($mod->mo_ruta);
				        }
				    }
				    /*
				    $ret .= '<div class="menu-item" '.$mod->mo_atributos.'>';
				    $ret .= '   <a href="'.$route.'" class="menu-link">';
				    $ret .= '       <div class="menu-text">';
				    $ret .=             $mod->mo_descripcion;
				    if($mod->mo_nuevo){
				        $ret.= '        <i class="fa fa-paper-plane text-theme"></i>'; 
				    }
				    $ret .= '       </div>';
                    $ret .= '   </a>';
				    $ret .= '</div>';  
                    */
                    $ret.= '<li><a class="slide-item" href="'.$route.'"><span>'.$mod->mo_descripcion.'</span></a></li>';
                        
				}
			}
		}
		$ret = str_replace('<a href="javascript:;"></a>', '', $ret);
		return $ret;
	}
}