<?php
/************************************************************************************
 * AnimeAdminSeries.template.php													*
 ************************************************************************************
 * AnimeManager																		*
 * SMF Modification Project Founded by Batousay (batousay@batousay.com)				*
 ************************************************************************************
 * Software Version:			AnimeManager 0.1									*
 * Software by:					AnimeManager Team 									*
 * Copyright 2010-2015 by:		AnimeManager Team 									*
 * Support, News, Updates at:	https://github.com/Batousay/GestorAnimeBackbeard	*
 ************************************************************************************
 * This program is free software; you may redistribute it and/or modify it under	*
 * the terms of the provided license as published by Simple Machines LLC.			*
 *																					*
 * This program is distributed in the hope that it is and will be useful, but		*
 * WITHOUT ANY WARRANTIES; without even any implied warranty of MERCHANTABILITY		*
 * or FITNESS FOR A PARTICULAR PURPOSE.												*
 *																					*
 * See the "license.txt" file for details of the Simple Machines license.			*
 * The latest version can always be found at http://www.simplemachines.org.			*
 *																					*
 ************************************************************************************/

function template_series_list()
{
	global $context, $settings, $options, $scripturl, $txt;

	echo '
<div id="sp_manage_articles">
	<form action="', $scripturl, '?action=admin;area=an-series;sa=listSeries" method="post" accept-charset="', $context['character_set'], '" onsubmit="return confirm(\'', $txt['sp-articlesConfirm'], '\');">
		<div class="sp_align_left pagesection">
			', $txt['pages'], ': ', $context['page_index'], '
		</div>
		<table class="table_grid" cellspacing="0" width="100%">
			<thead>
				<tr class="catbg">';

	foreach ($context['columns'] as $column)
	{
		echo '
					<th scope="col"', isset($column['class']) ? ' class="' . $column['class'] . '"' : '', isset($column['width']) ? ' width="' . $column['width'] . '"' : '', '>
						', $column['label'], '
					</th>';
	}

	echo '
				</tr>
			</thead>
			<tbody>';

		//Linea vacia
	if (empty($context['series']))
	{
		echo '
				<tr class="windowbg2">
					<td class="sp_center" colspan="', count($context['columns']) + 1, '">&nbsp;</td>
				</tr>';
	}

	//Si encuentra categorías
	foreach($context['series'] as $series)
	{
		echo '
				<tr class="windowbg2">
					<td class="sp_center">', !empty($series['picture']['href']) ? $series['picture']['image'] : '', '</td>
					<td class="sp_left">', $series['name'], '</td>
					<td class="sp_center"><a href="', $scripturl, '?board=', $series['id_board'], '">Foro</a></td>
					<td class="sp_center">', $series['category_name'] , '</td>
					<td class="sp_center">', $series['sagas'] , '</td>
					<td class="sp_center"><a href="', $scripturl, '?action=admin;area=an-series;sa=stateChange;series_id=', $series['id'], ';type=Finalized;', $context['session_var'], '=', $context['session_id'], '">', empty($series['finalized']) ? sp_embed_image('deactive', $txt['sp-stateNo']) : sp_embed_image('active', $txt['sp-stateYes']), '</a></td>
					<td class="sp_center"><a href="', $scripturl, '?action=admin;area=an-series;sa=stateChange;series_id=', $series['id'], ';type=Public;', $context['session_var'], '=', $context['session_id'], '">', empty($series['public']) ? sp_embed_image('deactive', $txt['sp-stateNo']) : sp_embed_image('active', $txt['sp-stateYes']), '</a></td>
					<td class="sp_center"><a href="', $scripturl, '?action=admin;area=an-series;sa=editSeries;series_id=', $series['id'], ';', $context['session_var'], '=', $context['session_id'], '">', sp_embed_image('modify'), '</a></td>
				</tr>';
	}
	echo '
			</tbody>
		</table>
		<div class="sp_align_left pagesection">
			', $txt['pages'], ': ', $context['page_index'], '
		</div>
	</form>
</div>';
}

function template_series_edit()
{
	global $context, $settings, $scripturl, $txt, $modSettings;

	echo '
	<div>
		<form action="', $scripturl, '?action=admin;area=an-series;sa=', $context['series_action'], '" method="post" accept-charset="', $context['character_set'], '">
			<h3 class="catbg"><span class="left"></span>'
				, $context['page_title'], '
			</h3>
			<div class="windowbg2">
				<span class="topslice"><span></span></span>
				<div class="sp_content_padding">
					<dl class="sp_form">
						<dt>
							<label for="series_name">', $txt['an-seriesName'], ':</label>
						</dt>
						<dd>
							<input type="text" name="series_name" id="series_name" value="', !empty($context['series_info']['name']) ? $context['series_info']['name'] : '', '" size="20" class="input_text"/>
						</dd>
						<dt>
							<label for="series_banner">', $txt['an-seriesBanner'] , ':</label>
						</dt>
						<dd>
							<input type="text" name="series_banner_url" id="series_banner_url" value="', !empty($context['series_info']['picture']['href']) ? $context['series_info']['picture']['href'] : '', '" size="30" class="input_text"/>
						</dd>
						<dt>
							<label for="series_news">', $txt['an-seriesNews'] , ':</label>
						</dt>
						<dd>
							<input type="text" name="series_news_img" id="series_news_img" value="', !empty($context['series_info']['newsImg']['href']) ? $context['series_info']['newsImg']['href'] : '', '" size="30" class="input_text"/>
						</dd>
						<dt>
							<label for="series_picture">', $txt['an-seriesPicture'], ':</label>
						</dt>
						<dd>
							<input type="text" name="series_picture" id="series_picture" value="', !empty($context['series_info']['img_download_block']['href']) ? $context['series_info']['img_download_block']['href'] : '', '" size="30" class="input_text"/>
						</dd>
						<dt>
							<label for="series_slider">', $txt['an-seriesSlider'] , ':</label>
						</dt>
						<dd>
							<input type="text" name="series_slider" id="series_slider" value="', !empty($context['series_info']['img_slider']) ? $context['series_info']['img_slider'] : '', '" size="30" class="input_text"/>
						</dd>
						<dt>
							<label for="series_finalized">', $txt['an-seriesFinalized'], ':</label>
						</dt>
						<dd>
							<input type="checkbox" name="series_finalized" id="series_finalized" ', !empty($context['series_info']['finalized']) ? 'checked="checked"' : '', 'value="1" class"input_check" />
						</dd>
						 <dt>
							<label for="series_public">', $txt['an-seriesPublic'], ':</label>
						</dt>
						<dd>
							<input type="checkbox" name="series_public" id="series_public" ', !empty($context['series_info']['public']) ? 'checked="checked"' : '', 'value="1" class"input_check" />
						</dd>';
	if(!empty($context['series_categories'])) {
		echo '
						<dt>
							<label for="series_public">', $txt['an-seriesCategory'] , ':</label>
						</dt>
						<dd>
							<select name="series_category" id="series_category" > ';
		foreach ($context['series_categories'] as $cat) {
			echo '<option value="', $cat['id'] , '" ', (!empty($context['series_info']['id_category']) && $cat['id'] == $context['series_info']['id_category']) ? 'selected="selected">' : '>' , $cat['name'] , '</option>';
		}
		echo'
							</select>
						</dd>';
	}
	echo '
						<dt>
							<label for="series_abstract">', $txt['an-seriesAbstract'], ':</label>
						</dt>
						<dd>
							<textarea name="series_abstract" rows="10" cols="50">',!empty($context['series_info']['abstract']) ? $context['series_info']['abstract'] : $txt['an-seriesAbstractEmpty'],'</textarea>
						</dd>
						<dt>
							<label for="series_specs">', $txt['an-seriesSpecs'], ':</label>
						</dt>
						<dd>
							<textarea name="series_specs" rows="10" cols="50">',!empty($context['series_info']['specs']) ? $context['series_info']['specs'] : $txt['an-seriesSpecsEmpty'],'</textarea>
						</dd>
						<dt>
							<label for="series_staff">', $txt['an-seriesStaff'], ':</label>
						</dt>
						<dd>
							<textarea name="series_staff" rows="10" cols="50">',!empty($context['series_info']['staff']) ? $context['series_info']['staff'] : $txt['an-seriesStaffEmpty'],'</textarea>
						</dd>
					</dl>
					<div class="sp_button_container">
						<input type="submit" name="submit" value="', $context['button_title'], '" class="button_submit" />
					</div>
				</div>
				<span class="botslice"><span></span></span>
			</div>
			<input type="hidden" name="', $context['session_var'], '" value="', $context['session_id'], '" />
			<input type="hidden" name="edit_series" value="1" />';

	if ($context['series_action'] == 'editSeries') {
		echo '
			<input type="hidden" name="series_id" value="', $context['series_info']['id'], '" />';
	}
	echo '
		</form>
	</div>';
}

?>