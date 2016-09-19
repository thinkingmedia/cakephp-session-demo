<?php
/**
 * @type \App\View\AppView $this
 */
use Cake\Routing\Router;

?>
<div>
    <div>
        <h3>Session Data</h3>
        <?php
            debug(Router::getRequest()->session()->read());
        ?>
    </div>

    <div>
        <?= $this->Html->link('Start Session', ['action' => 'start']) ?>
    </div>
    <div>
        <?= $this->Html->link('End Session', ['action' => 'end']) ?>
    </div>
    <div>
        <?= $this->Html->link('Restore Session', ['action' => 'restore']) ?>
    </div>
    <div>
        <?= $this->Html->link('Refresh Page', ['action'=>'index']) ?>
    </div>
</div>
