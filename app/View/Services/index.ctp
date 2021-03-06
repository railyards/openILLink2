<?php
// ***************************************************************************
// ***************************************************************************
// ***************************************************************************
// OpenIllink is a web based library system designed to manage 
// ILL, document delivery and OpenURL links
// 
// Copyright (C) 2014, Cyril Sester
// 
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
// 
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
// 
// You should have received a copy of the GNU General Public License
// along with this program.  If not, see <http://www.gnu.org/licenses/>.
// 
// ***************************************************************************
// ***************************************************************************
// ***************************************************************************

	$this->set('title_for_layout', __('Gestion des services'));

	echo '<div class="manage_title">', __('Gestion des services'), '</div>';
	echo count($services), ' ', __('service(s) trouvé(s)');
	echo '<div class="tableHeader">';
		echo '<div class="grid3">', __('Nom'), '</div>';
		echo '<div class="grid3">', __('Attaché à'), '</div>';
		echo '<div class="grid2">', __('Département'), '</div>';
		echo '<div class="grid2">', __('Faculté'), '</div>';
		echo '<div class="grid1">', __('Valid. requise'), '</div>';
		echo '<div class="grid1">', __('Actions'), '</div>';
	echo '</div>';
	foreach ($services as $service)
	{
		echo '<div class="tableRow">';
			echo '<div class="grid3">', $service['Service']['name'], '</div>';
			echo '<div class="grid3">', $service['Library']['name'], '</div>';
			echo '<div class="grid2">', $service['Service']['department'], '</div>';
			echo '<div class="grid2">', $service['Service']['faculty'], '</div>';
			echo '<div class="grid1">', ($service['Service']['need_validation'] == 1? __('Oui') : __('Non')), '</div>';
			echo '<div class="grid1">', $this->Html->image('edit.png', array('url' => array('action' => 'edit', $service['Service']['id']))), " | ", $this->Form->postLink($this->Html->image('delete.png'), array('action' => 'delete', $service['Service']['id']), array('confirm' => __('Etes-vous sûr de vouloir supprimer le service "%s"?', h($service['Service']['name'])), 'escape' => false)), '</div>';
		echo '</div>';
	}

	echo '<div class="manage_footer">';
	echo $this->Html->link(__('Ajouter un nouveau service'), array('controller' => 'services', 'action' => 'create'), array('class' => 'btn'));
	echo '</div>';
?>