<?= $this->Form->create($site) ?>
<fieldset>
    <legend><?= __('Add/Edit Site') ?></legend>
    <?php
        echo $this->Form->input('slug');
        echo $this->Form->input('title');
        echo $this->Form->input('content',['required' => false]);
        echo $this->Form->input('status');
        echo $this->Form->input('created_by');
        echo $this->Form->input('modified_by');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
