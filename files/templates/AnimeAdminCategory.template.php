<?php
/************************************************************************************
 * AnimeAdminCategory.template.php													*
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

function template_category_list()
{
	global $context, $settings, $options, $scripturl, $txt;

	echo '
		<table class="table_grid" cellspacing="0" width="100%">
			<tr class="catbg">';

	foreach ($context['columns'] as $column)
	{
			echo '
				<th scope="col"', isset($column['class']) ? ' class="' . $column['class'] . '"' : '', isset($column['width']) ? ' width="' . $column['width'] . '"' : '', '>
					', $column['label'], '
				</th>';
	}

	echo '
			</tr>';

		//Linea vacia
	if (empty($context['categories']))
	{
		echo '
			<tr class="windowbg2">
				<td class="sp_center" colspan="', count($context['columns']) + 1, '">&nbsp;</td>
			</tr>';
	}

		//Si encuentra categorías
	foreach($context['categories'] as $category)
	{
		echo '
			<tr class="windowbg2">
				<td class="sp_center">', !empty($category['picture']['href']) ? $category['picture']['image'] : '', '</td>
				<td class="sp_left">', $category['name'], '</td>
				<td class="sp_center">', $category['articles'], '</td>
				<td class="sp_center"><a href="', $scripturl, '?action=admin;area=portalarticles;sa=statechange;category_id=', $category['id'], ';type=category;', $context['session_var'], '=', $context['session_id'], '">', empty($category['publish']) ? sp_embed_image('deactive', $txt['sp-stateNo']) : sp_embed_image('active', $txt['sp-stateYes']), '</a></td>
				<td class="sp_center"><a href="', $scripturl, '?action=admin;area=an-categories;sa=editCategory;category_id=', $category['id'], ';', $context['session_var'], '=', $context['session_id'], '">', sp_embed_image('modify'), '</a></td>
			</tr>';
	}
	echo '
		</table>';
}

function template_category_edit()
{
	global $context, $settings, $scripturl, $txt, $modSettings;

	echo '
	<div>
		<form action="', $scripturl, '?action=admin;area=an-categories;sa=', $context['category_action'], '" method="post" accept-charset="', $context['character_set'], '">
			<h3 class="catbg"><span class="left"></span>'
				//<a href="', $scripturl, '?action=helpadmin;help=sp-categories', ucfirst($context['category_action']), '" onclick="return reqWin(this.href);" class="help"><img src="', $settings['images_url'], '/helptopics.gif" alt="', $txt['help'], '" class="icon" /></a>
				, $context['page_title'], '
			</h3>
			<div class="windowbg2">
				<span class="topslice"><span></span></span>
				<div class="sp_content_padding">
					<dl class="sp_form">
						<dt>
							<label for="category_name">', $txt['an-categoriesName'], ':</label>
						</dt>
						<dd>
							<input type="text" name="category_name" id="category_name" value="', !empty($context['category_info']['name']) ? $context['category_info']['name'] : '', '" size="20" class="input_text"/>
						</dd>
						<dt>
							<label for="category_picture">', $txt['an-categoriesPicture'], ':</label>
						</dt>
						<dd>
							<input type="text" name="picture_url" id="category_picture" value="', !empty($context['category_info']['picture']['href']) ? $context['category_info']['picture']['href'] : '', '" size="30" class="input_text"/>
						</dd>
					</dl>
					<div class="sp_button_container">
						<input type="submit" name="submit" value="', $context['button_title'], '" class="button_submit" />
					</div>
				</div>
				<span class="botslice"><span></span></span>
			</div>
			<input type="hidden" name="', $context['session_var'], '" value="', $context['session_id'], '" />
			<input type="hidden" name="edit_category" value="1" />';

	if ($context['category_action'] == 'editCategory') {
		echo '
			<input type="hidden" name="category_id" value="', $context['category_info']['id'], '" />
			<input type="hidden" name="id_category_forums" value="', $context['category_info']['id_category_forums'],  '" />
			<input type="hidden" name="id_category_private" value="', $context['category_info']['id_category_private'],  '" />
			<input type="hidden" name="id_category_forums_finalized" value="', $context['category_info']['id_category_forums_finalized'],  '" />
			<input type="hidden" name="id_category_private_finalized" value="', $context['category_info']['id_category_private_finalized'],  '" />';
		}
	echo '
		</form>
	</div>';
}

function template_category_delete()
{
	global $context, $settings, $options, $scripturl, $txt, $modSettings;

	echo '
	<div>
		<form action="', $scripturl, '?action=admin;area=portalarticles;sa=deletecategory" method="post" accept-charset="', $context['character_set'], '">
			<h3 class="catbg"><span class="left"></span>
				<a href="', $scripturl, '?action=helpadmin;help=sp-categoriesDelete" onclick="return reqWin(this.href);" class="help"><img src="', $settings['images_url'], '/helptopics.gif" alt="', $txt['help'], '" class="icon" /></a>
				', $txt['sp-categoriesDelete'], '
			</h3>
			<div class="windowbg2">
				<span class="topslice"><span></span></span>
				<div class="sp_content_padding">
					<div class="sp_center">
					', sprintf($txt['sp-categoriesDeleteCount'], $context['category_info']['articles']), '<br />';

	if (!empty($context['list_categories']))
	{
		echo '
					', $txt['sp-categoriesDeleteOption1'], '
					</div>
					<dl class="sp_form">
						<dt>
							<label for="category_move">', $txt['sp-categoriesMove'], ':</label>
						</dt>
						<dd>
							<input type="checkbox" name="category_move" value="1" id="category_move" checked="checked" class="input_check" />
						</dd>
						<dt>
							<label for="category_move_to">', $txt['sp-categoriesMoveTo'], ':</label>
						</dt>
						<dd>
							<select id="category_move_to" name="category_move_to">';

		foreach($context['list_categories'] as $category)
		{
			if ($category['id'] != $context['category_info']['id'])
				echo '
								<option value="', $category['id'], '">', $category['name'], '</option>';
		}

							echo '
							</select>
						</dd>
					</dl>';
	}
	else
	{
		echo '
				', $txt['sp-categoriesDeleteOption2'], '
				</div>';
	}

	echo '
					<div class="sp_button_container">
						<input type="submit" name="delete_category" value="', $txt['sp-categoriesDelete'], '" onclick="return confirm(\'' . $txt['sp-categoriesDeleteConfirm'] . '\');" class="button_submit" />
					</div>
				</div>
				<span class="botslice"><span></span></span>
			</div>
			<input type="hidden" name="category_id" value="', $context['category_info']['id'], '" />
			<input type="hidden" name="', $context['session_var'], '" value="', $context['session_id'], '" />
		</form>
	</div>';
}

?>