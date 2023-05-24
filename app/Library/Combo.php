<?php

	namespace App\Library;
	
	use Illuminate\Support\Collection;
	use Illuminate\Support\Facades\Lang;
		
	class Combo {
		
		public static function render(Collection $collection,$selected,$colValue,$colDisplay,$addBlank = false){
			
			if($addBlank){
				echo "<option value=\"\" >-- Todas las opciones --</option>";
			}
			
			foreach ($collection as $record){
				$sel = "";
				if($record->$colValue==$selected){
					$sel = ' selected="selected" ';
				}
				echo '<option '.$sel.' value="'.$record->$colValue.'">'.$record->$colDisplay.'</option>';
			}
			
		}
		
		public static function renderWithLang(Collection $collection,$selected,$colValue,$colDisplay,$lang,$addBlank = false){
				
			if($addBlank){
				echo "<option value=\"\" >-- ".Lang::get('messages.please_select')." --</option>";
			}
				
			foreach ($collection as $record){
				$sel = "";
				if($record->$colValue==$selected){
					$sel = ' selected="selected" ';
				}
				echo '<option '.$sel.' value="'.$record->$colValue.'">'.Lang::get($lang.".".$record->$colDisplay).'</option>';
			}
				
		}

	}