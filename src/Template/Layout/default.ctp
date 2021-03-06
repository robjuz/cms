<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['bootstrap.min', 'global']) ?>
    <?= $this->Html->script(
        ['https://code.jquery.com/jquery-2.2.4.min.js?integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="crossorigin="anonymous"',
          'bootstrap.min',
          'tinymce/tinymce.min',
          'global']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>

    <div class="container">
        <?= $this->Flash->render() ?>
    </div>
    <div class="container clearfix">
        <div class="row">
            <div class="col-xs-12 col-sm-4">
            <nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Brand</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Sites
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="list-group">
            <?= $this->Html->link('List',['prefix' => 'admin', 'controller' => 'Sites', 'action' => 'index'], ['class' => 'list-group-item']) ?>
            <?= $this->Html->link('New',['prefix' => 'admin', 'controller' => 'Sites', 'action' => 'edit'], ['class' => 'list-group-item']) ?>
        </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Users
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="list-group">
           <?= $this->Html->link('List',['prefix' => 'admin', 'controller' => 'Users', 'action' => 'index'], ['class' => 'list-group-item']) ?>
           <?= $this->Html->link('New',['prefix' => 'admin', 'controller' => 'Users', 'action' => 'edit'], ['class' => 'list-group-item']) ?>
        </div>
    </div>
  </div>
</div>
  </div><!-- /.navbar-collapse -->
</nav>
            </div>
            <div class="col-xs-12 col-sm-8">
                <?= $this->fetch('content') ?>
            </div>
        </div>
    </div>
    <footer>
    </footer>
</body>
</html>
