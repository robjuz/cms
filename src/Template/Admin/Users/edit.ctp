<?= $this->Form->create($user) ?>
<fieldset>
    <legend><?= __('Add/Edit User') ?></legend>
    <?php
        echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
