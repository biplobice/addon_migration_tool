<table class="migration-table table table-bordered table-striped">
    <thead>
    <tr>
        <th><?=t('Handle')?></th>
    </tr>
    </thead>
    <tbody>
    <? foreach($collection->getCategories() as $category) {
        $validator = $category->getPublisherValidator();
        ?>
        <tr <? if ($validator->skipItem()) { ?>class="migration-item-skipped"<? } ?>>
            <td><?=$category->getHandle()?></td>
        </tr>
    <? } ?>
    </tbody>
</table>
