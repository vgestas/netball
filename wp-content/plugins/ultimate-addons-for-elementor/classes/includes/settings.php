<?php
	function check_status($key, $value){
		$saved_options = get_option('uae_save_data');
		// print_r($saved_options);
		if ($saved_options != '') {
			return (isset($saved_options[$key]) && $saved_options[$key] == $value) ? 'checked' : '' ;
		} else {
			return 'checked';
		}
	}
?>

<form id="addonsdata">
	<table class="form-table">
		<tbody>
			<tr style="border-bottom: 1px solid #ddd;">
				<th>Info Banner</th>
				<td>
					<div class="onoffswitch">
					    <input type="checkbox" name="banner" <?php echo check_status('banner', 'on'); ?> class="onoffswitch-checkbox" id="myonoffswitch" >
					    <label class="onoffswitch-label" for="myonoffswitch">
					        <span class="onoffswitch-inner"></span>
					        <span class="onoffswitch-switch"></span>
					    </label>
					</div>
				</td>
				<th>Image Hover Effects</th>
				<td>
					<div class="onoffswitch">	
					    <input type="checkbox" name="ihe" <?php echo check_status('ihe', 'on');  ?> class="onoffswitch-checkbox" id="myonoffswitch2">
					    <label class="onoffswitch-label" for="myonoffswitch2">
					        <span class="onoffswitch-inner"></span>
					        <span class="onoffswitch-switch"></span>
					    </label>
					</div>
				</td>
			</tr>

			<tr style="border-bottom: 1px solid #ddd;">
				<th>Price Table</th>
				<td>
					<div class="onoffswitch">
					    <input type="checkbox" name="price_table" class="onoffswitch-checkbox" id="myonoffswitch3" <?php echo check_status('price_table', 'on') ?>>
					    <label class="onoffswitch-label" for="myonoffswitch3">
					        <span class="onoffswitch-inner"></span>
					        <span class="onoffswitch-switch"></span>
					    </label>
					</div>
				</td>
				<th>Interactive Banner</th>
				<td>
					<div class="onoffswitch">
					    <input type="checkbox" name="interactive_banner" class="onoffswitch-checkbox" id="myonoffswitch17" <?php echo check_status('interactive_banner', 'on') ?>>
					    <label class="onoffswitch-label" for="myonoffswitch17">
					        <span class="onoffswitch-inner"></span>
					        <span class="onoffswitch-switch"></span>
					    </label>
					</div>
				</td>
			</tr>

			<tr style="border-bottom: 1px solid #ddd;">
				<th>Info Box</th>
				<td>
					<div class="onoffswitch">
					    <input type="checkbox" name="info_box" class="onoffswitch-checkbox" id="myonoffswitch5" <?php echo check_status('info_box', 'on') ?>>
					    <label class="onoffswitch-label" for="myonoffswitch5">
					        <span class="onoffswitch-inner"></span>
					        <span class="onoffswitch-switch"></span>
					    </label>
					</div>
				</td>
				<th>Advanced Button</th>
				<td>
					<div class="onoffswitch">
					    <input type="checkbox" name="advance_btn" class="onoffswitch-checkbox" id="myonoffswitch6" <?php echo check_status('advance_btn', 'on') ?>>
					    <label class="onoffswitch-label" for="myonoffswitch6">
					        <span class="onoffswitch-inner"></span>
					        <span class="onoffswitch-switch"></span>
					    </label>
					</div>
				</td>
			</tr>

			<tr style="border-bottom: 1px solid #ddd;">
				<th>Team Profile</th>
				<td>
					<div class="onoffswitch">
					    <input type="checkbox" name="team_prof" class="onoffswitch-checkbox" id="myonoffswitch7" <?php echo check_status('team_prof', 'on') ?>>
					    <label class="onoffswitch-label" for="myonoffswitch7">
					        <span class="onoffswitch-inner"></span>
					        <span class="onoffswitch-switch"></span>
					    </label>
					</div>
				</td>
				<th>Info Circle</th>
				<td>
					<div class="onoffswitch">
					    <input type="checkbox" name="info_circle" class="onoffswitch-checkbox" id="myonoffswitch29" <?php echo check_status('info_circle', 'on') ?>>
					    <label class="onoffswitch-label" for="myonoffswitch29">
					        <span class="onoffswitch-inner"></span>
					        <span class="onoffswitch-switch"></span>
					    </label>
					</div>
				</td>
			</tr>

			<tr style="border-bottom: 1px solid #ddd;">
				<th>Stat Counter</th>
				<td>
					<div class="onoffswitch">
					    <input type="checkbox" name="counter" class="onoffswitch-checkbox" id="myonoffswitch9" <?php echo check_status('counter', 'on') ?>>
					    <label class="onoffswitch-label" for="myonoffswitch9">
					        <span class="onoffswitch-inner"></span>
					        <span class="onoffswitch-switch"></span>
					    </label>
					</div>
				</td>
				<th>Flip Box</th>
				<td>
					<div class="onoffswitch">
					    <input type="checkbox" name="flip_box" class="onoffswitch-checkbox" id="myonoffswitch10" <?php echo check_status('flip_box', 'on') ?>>
					    <label class="onoffswitch-label" for="myonoffswitch10">
					        <span class="onoffswitch-inner"></span>
					        <span class="onoffswitch-switch"></span>
					    </label>
					</div>
				</td>
			</tr>

			<tr style="border-bottom: 1px solid #ddd;">
				<th>Timeline</th>
				<td>
					<div class="onoffswitch">
					    <input type="checkbox" name="timeline" class="onoffswitch-checkbox" id="myonoffswitch11" <?php echo check_status('timeline', 'on') ?>>
					    <label class="onoffswitch-label" for="myonoffswitch11">
					        <span class="onoffswitch-inner"></span>
					        <span class="onoffswitch-switch"></span>
					    </label>
					</div>
				</td>
				<th>Countdown</th>
				<td>
					<div class="onoffswitch">
					    <input type="checkbox" name="countdown" class="onoffswitch-checkbox" id="myonoffswitch12" <?php echo check_status('countdown', 'on') ?>>
					    <label class="onoffswitch-label" for="myonoffswitch12">
					        <span class="onoffswitch-inner"></span>
					        <span class="onoffswitch-switch"></span>
					    </label>
					</div>
				</td>
			</tr>

			<tr style="border-bottom: 1px solid #ddd;">
				<th>Creative Link</th>
				<td>
					<div class="onoffswitch">
					    <input type="checkbox" name="creative_link" class="onoffswitch-checkbox" id="myonoffswitch13" <?php echo check_status('creative_link', 'on') ?>>
					    <label class="onoffswitch-label" for="myonoffswitch13">
					        <span class="onoffswitch-inner"></span>
					        <span class="onoffswitch-switch"></span>
					    </label>
					</div>
				</td>
				<th>Modal Popup</th>
				<td>
					<div class="onoffswitch">
					    <input type="checkbox" name="popup" class="onoffswitch-checkbox" id="myonoffswitch16" <?php echo check_status('popup', 'on') ?>>
					    <label class="onoffswitch-label" for="myonoffswitch16">
					        <span class="onoffswitch-inner"></span>
					        <span class="onoffswitch-switch"></span>
					    </label>
					</div>
				</td>
			</tr>

			<tr style="border-bottom: 1px solid #ddd;">
				
				<th>Info List</th>
				<td>
					<div class="onoffswitch">
					    <input type="checkbox" name="info_list" class="onoffswitch-checkbox" id="myonoffswitch19" <?php echo check_status('info_list', 'on') ?>>
					    <label class="onoffswitch-label" for="myonoffswitch19">
					        <span class="onoffswitch-inner"></span>
					        <span class="onoffswitch-switch"></span>
					    </label>
					</div>
				</td>

				<th>Accordions</th>
				<td>
					<div class="onoffswitch">
					    <input type="checkbox" name="accordion" class="onoffswitch-checkbox" id="myonoffswitch28" <?php echo check_status('accordion', 'on') ?>>
					    <label class="onoffswitch-label" for="myonoffswitch28">
					        <span class="onoffswitch-inner"></span>
					        <span class="onoffswitch-switch"></span>
					    </label>
					</div>
				</td>
			</tr>

			<tr style="border-bottom: 1px solid #ddd;">
				<th>Advanced Carousel</th>
				<td>
					<div class="onoffswitch">
					    <input type="checkbox" name="adv_carousel" class="onoffswitch-checkbox" id="myonoffswitch23" <?php echo check_status('adv_carousel', 'on') ?>>
					    <label class="onoffswitch-label" for="myonoffswitch23">
					        <span class="onoffswitch-inner"></span>
					        <span class="onoffswitch-switch"></span>
					    </label>
					</div>
				</td>
				<th>Heading</th>
				<td>
					<div class="onoffswitch">
					    <input type="checkbox" name="heading" class="onoffswitch-checkbox" id="myonoffswitch24" <?php echo check_status('heading', 'on') ?>>
					    <label class="onoffswitch-label" for="myonoffswitch24">
					        <span class="onoffswitch-inner"></span>
					        <span class="onoffswitch-switch"></span>
					    </label>
					</div>
				</td>
			</tr>

			<tr style="border-bottom: 1px solid #ddd;">
				<th>Dual Button</th>
				<td>
					<div class="onoffswitch">
					    <input type="checkbox" name="dual_btn" class="onoffswitch-checkbox" id="myonoffswitch25" <?php echo check_status('dual_btn', 'on') ?>>
					    <label class="onoffswitch-label" for="myonoffswitch25">
					        <span class="onoffswitch-inner"></span>
					        <span class="onoffswitch-switch"></span>
					    </label>
					</div>
				</td>
				<th>Highlight Box</th>
				<td>
					<div class="onoffswitch">
					    <input type="checkbox" name="highlight_box" class="onoffswitch-checkbox" id="myonoffswitch26" <?php echo check_status('highlight_box', 'on') ?>>
					    <label class="onoffswitch-label" for="myonoffswitch26">
					        <span class="onoffswitch-inner"></span>
					        <span class="onoffswitch-switch"></span>
					    </label>
					</div>
				</td>
			</tr>

			<tr style="border-bottom: 1px solid #ddd;">
				<th>Filterable Gallery</th>
				<td>
					<div class="onoffswitch">
					    <input type="checkbox" name="filter_gallery" class="onoffswitch-checkbox" id="myonoffswitch32" <?php echo check_status('filter_gallery', 'on') ?>>
					    <label class="onoffswitch-label" for="myonoffswitch32">
					        <span class="onoffswitch-inner"></span>
					        <span class="onoffswitch-switch"></span>
					    </label>
					</div>
				</td>
				<th>WhatsApp Chat</th>
				<td>
					<div class="onoffswitch">
					    <input type="checkbox" name="whatsapp_chat" class="onoffswitch-checkbox" id="myonoffswitch33" <?php echo check_status('whatsapp_chat', 'on') ?>>
					    <label class="onoffswitch-label" for="myonoffswitch33">
					        <span class="onoffswitch-inner"></span>
					        <span class="onoffswitch-switch"></span>
					    </label>
					</div>
				</td>
			</tr>

		</tbody>
	</table>
	<br>
	<input type="submit" class="button-primary btn-save" value="Save Changes">
	<img src="<?php echo plugin_dir_url(__FILE__).'../../images/loader.gif' ?>" class="nm-loading" style="display: none;">
	<span class="nm-saved" style="display: none;">Changes Saved!</span>
</form>