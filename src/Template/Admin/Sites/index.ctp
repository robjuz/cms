<h3><?= __('Sites') ?></h3>
<table class="table">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('slug') ?></th>
            <th><?= $this->Paginator->sort('title') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th><?= $this->Paginator->sort('status') ?></th>
            <th><?= $this->Paginator->sort('created_by') ?></th>
            <th><?= $this->Paginator->sort('modified_by') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($sites as $site): ?>
        <tr>
            <td><?= $this->Number->format($site->id) ?></td>
            <td><?= h($site->slug) ?></td>
            <td><?= h($site->title) ?></td>
            <td><?= h($site->created) ?></td>
            <td><?= h($site->modified) ?></td>
            <td><?= $this->Number->format($site->status) ?></td>
            <td><?= $this->Number->format($site->created_by) ?></td>
            <td><?= $this->Number->format($site->modified_by) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $site->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $site->id], ['confirm' => __('Are you sure you want to delete # {0}?', $site->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="text-center">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
    </div>
