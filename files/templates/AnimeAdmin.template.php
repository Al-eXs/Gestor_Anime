<?php
/************************************************************************************
 * AnimeAdmin.template.php															*
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

function template_tutorials()
{
	global $context, $modSettings, $txt, $settings, $scripturl;

		echo '
	<h3 class="catbg"><span class="left"></span>
		', $txt['an-tutorial_title'], '
	</h3>
	<div class="windowbg2">
		<span class="topslice"><span></span></span>
			<div class="sp_content_padding" id="sp_credits">
				', $txt['an-tutorialsMessage'], '</div>
		<span class="botslice"><span></span></span>
	</div>';				   
}

function template_team()
{
	global $context, $modSettings, $txt, $settings, $scripturl;

		echo '
	<h3 class="catbg"><span class="left"></span>
		', $txt['an-tutorial_title'], '
	</h3>
	<div class="windowbg2">
		<span class="topslice"><span></span></span>
			<div class="sp_content_padding" id="sp_credits">
				<form>
					Elige el grupo del Staff: 
					<select>
						<option value="-1">Seleccionar grupo</option>
						<option value="9">Staff</option>
						<option value="10">No Staff</option>
				    </select>
					<br/><br/>
					<input value="Enviar" />
				</form>
			</div>
		<span class="botslice"><span></span></span>
	</div>';				   
}

function template_information()
{
	global $context, $txt;

		//Information, Left
	echo '
	<div id="sp_admin_main">
		<div id="sp_live_info" class="sp_float_left">
	<h3 class="catbg"><span class="left"></span>
		', $txt['an-info_title'], '
	</h3>
	<div class="windowbg2">
		<span class="topslice"><span></span></span>
			<div class="sp_content_padding" id="sp_credits" style="height:auto" >';

	foreach ($context['an_credits'] as $section)
	{
		if (isset($section['pretext']))
			echo '
				<p>', $section['pretext'], '</p>';

		foreach ($section['groups'] as $group)
		{
			if (empty($group['members']))
				continue;

			echo '
				<p>';

			if (isset($group['title']))
				echo '
					<strong>', $group['title'], ':</strong> ';

			echo implode(', ', $group['members']), '
				</p>';
		}


		if (isset($section['posttext']))
			echo '
				<p>', $section['posttext'], '</p>';
	}

	echo '
				<hr />
								<p>', sprintf($txt['an-info_contribute'], 'http://www.batousay.com'), '</p>
			</div>
		<span class="botslice"><span></span></span>
	</div>
		</div>';

		//Version, right
echo '
<div id="sp_general_info" class="sp_float_right">
			<h3 class="catbg"><span class="left"></span>
				', $txt['an-info_general'], '
			</h3>
			<div class="windowbg2">
				<span class="topslice"><span></span></span>
				<div class="sp_content_padding">
					<strong>', $txt['an-info_versions'], ':</strong><br />
					', $txt['an-info_your_version'], ':
					<em id="spYourVersion" style="white-space: nowrap;">', $context['an_version'], '</em><br />
				</div>
				<span class="botslice"><span></span></span>
			</div>
		</div>
		</div>';
}

?>