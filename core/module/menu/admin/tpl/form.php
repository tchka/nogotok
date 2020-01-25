<? $error_fields = array(); ?>
<form action="" method="post" class="f_form" enctype="multipart/form-data">
	<input type="hidden" name="form_id" value="<?=$form_id?>" />
	<input type="hidden" name="id" value="<?=$id?>" />

	<input type="hidden" name="MAX_FILE_SIZE" value="5000000">

	<? if (count($errors) > 0): ?>
		<div class="error">
		<? foreach ($errors as $j => $i) : ?>
			<? $error_fields[] = $i['field']; ?>
			<?=$i['text']?><br />
		<? endforeach; ?>
		</div>
	<? endif; ?>	

	<table cellspacing="0" class="t_form">
		<tr>
			<th>Быстрые ссылки</th>
			<td class="input"><select id="menuquicklinks">
				<option value=""></option>
				<?
				function quickLinksOptions($arr, $href = '', $pre = '') {
					foreach ($arr as $j => $i) {
						print '<option value="'.$href.'/'.$i['name'].'" name="'.$i['title'].'">'.$pre.$i['title'].'</option>';
						if (is_array($i['child']) and count($i['child'])) {
							quickLinksOptions($i['child'], $href.'/'.$i['name'], $pre.'..');
						}
					}
				}
				quickLinksOptions($quicklinks);
				?>
			</select>

			<script>
				$("#menuquicklinks").change(function(){
					var el = $(this);
					$("input[name=title]").val($("option:selected", el).attr('name'));
					$("input[name=href]").val($("option:selected", el).val());
				});
			</script>

			</td>
		</tr>

		<?php foreach ($fields as $j => $i): ?>

			<?php if ($i->type == 'visual'): ?>
			<tr><th colspan="2"><?php print $i->title; ?></th></tr>
			<tr><td colspan="2" class="input"><?php print $i->render(); ?></td></tr>
			<?php elseif ($i->type == 'hidden') : ?>
				<?php print $i->render(); ?>
			<?php else: ?>
			<tr <? if (in_array($i->name, $error_fields)) print 'class="error"'; ?> >
				<th><?php print $i->title; ?></th>
				<td class="input"><?php print $i->render(); ?></td>
			</tr>
			<?php endif; ?>

		<?php endforeach; ?>
	</table>

	<div style="text-align: center; ">
		<input type="submit" value="Сохранить" class="button" />
		<input type="button" value="Отмена" class="button" onclick="history.go(-1);" />
	</div>

</form>